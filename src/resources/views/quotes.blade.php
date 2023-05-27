@extends('app')
@section('content')
    <h1>Historical Quotes for {{ $company_symbol }}</h1>

    <table>
        <thead>
        <tr>
            <th>Date</th>
            <th>Open</th>
            <th>High</th>
            <th>Low</th>
            <th>Close</th>
            <th>Volume</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quotes as $quote)
            <tr>
                <td>{{ $quote['date'] ?? '' }}</td>
                <td>{{ $quote['open'] ?? '' }}</td>
                <td>{{ $quote['high'] ?? '' }}</td>
                <td>{{ $quote['low'] ?? '' }}</td>
                <td>{{ $quote['close'] ?? '' }}</td>
                <td>{{ $quote['volume'] ?? '' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="chart-container" style="position: relative; height:40vh; width:80vw">
        <canvas id="chart"></canvas>
    </div>
    <script id="quotes-data" type="application/json" data-quotes="{{ json_encode($quotes) }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{ asset('js/quotes.js') }}"></script>
@endsection
