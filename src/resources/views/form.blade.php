@extends('app')
@section('content')
    @if ($errors->has('error'))
        <div class="error">{{ $errors->first('error') }}</div>
    @endif
    <form action="{{ route('form.quotes') }}" method="POST" class="col-3" id="stock-form">
        @csrf
        <div class="form-group">
            <label for="company_symbol">Company Symbol:</label>
            <input type="text" name="company_symbol" class="form-control" id="company_symbol" value="{{ old('company_symbol') }}">
            @if ($errors->has('company_symbol'))
                <div class="error">{{ $errors->first('company_symbol') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="text" name="start_date" class="form-control" id="start_date" value="{{ old('start_date') }}">
            @if ($errors->has('start_date'))
                <div class="error">{{ $errors->first('start_date') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="text" name="end_date" class="form-control" id="end_date" value="{{ old('end_date') }}">
            @if ($errors->has('end_date'))
                <div class="error">{{ $errors->first('end_date') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="{{ asset('/js/form.js') }}"></script>
@endsection
