<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Contracts\PkgStoreContract;
use App\Contracts\RapidAPIContract;
use App\Events\SendStockDataEmail;
use App\Http\Requests\StockMarketRequest;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

class StockMarketControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('form.index'));
        $response->assertStatus(200);
    }

    public function testQuotesWithValidData()
    {
        Event::fake();
        Mail::fake();

        $this->mock(PkgStoreContract::class)
            ->shouldReceive('getResponse')
            ->andReturnSelf()
            ->shouldReceive('getCompanyName')
            ->andReturn('Apple Inc.');

        $this->mock(RapidAPIContract::class)
            ->shouldReceive('getHistoricalQuotes')
            ->andReturn(['prices' => []]);

        $response = $this->post('/quotes', [
            'company_symbol' => 'GOOG',
            'start_date' => '2023-01-01',
            'end_date' => '2023-01-05',
            'email' => 'test@example.com',
        ]);

        $response->assertStatus(200);
        Event::assertDispatched(SendStockDataEmail::class);
    }

    public function testQuotesWithInvalidData()
    {
        $this->mock(RapidAPIContract::class)
            ->shouldReceive('getHistoricalQuotes')
            ->andThrow(new \Exception('Exception message'));

        $request = StockMarketRequest::create('/quotes', 'POST', [
            'company_symbol' => 'GOOG',
            'start_date' => '2023-01-01',
            'end_date' => '2023-01-05',
            'email' => 'test@example.com',
        ]);

        $response = $this->post('/quotes', $request->all());

        $response->assertJson(['error' => 'Exception message']);
    }

    public function testQuotesWithNoCompanyName()
    {
        $this->mock(PkgStoreContract::class)
            ->shouldReceive('getResponse')
            ->andReturnSelf()
            ->shouldReceive('getCompanyName')
            ->andReturnNull();

        $this->mock(RapidAPIContract::class)
            ->shouldReceive('getHistoricalQuotes')
            ->andReturn(['prices' => []]);

        $request = StockMarketRequest::create('/quotes', 'POST', [
            'company_symbol' => 'INVALID_SYMBOL',
            'start_date' => '2023-01-01',
            'end_date' => '2023-01-05',
            'email' => 'test@example.com',
        ]);

        $response = $this->post('/quotes', $request->all());

        $response->assertStatus(200);
        $response->assertViewHas('quotes', []);
    }
}
