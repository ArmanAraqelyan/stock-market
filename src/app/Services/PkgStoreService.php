<?php

namespace App\Services;

use App\Contracts\PkgStoreContract;
use Illuminate\Support\Facades\Http;

class PkgStoreService implements PkgStoreContract
{
    private array $response = [];
    public function getResponse(): self
    {
        $this->response = (Http::get(config('api.pkg.url')))->json();
        return $this;
    }

    public function getCompanyName(string $companySymbol): ?string
    {
        return array_column($this->response, "Company Name", "Symbol")[$companySymbol] ?? null;
    }
}
