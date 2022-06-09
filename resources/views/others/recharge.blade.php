@extends('layouts.app')

@section('content')
<div class="login_form">
    <p class="text">Kaart opladen</p>
    @if(session()->has('waarOnerNull'))
    <p class="error">{{ session('waarOnerNull') }}</p>
    @endif
    <form action="{{ route('recharge.store') }}" method="post">
        @csrf
        <div>
            <input type="text" placeholder="Uuid" name="id" id="uuid" class="input" value="{{ old('uuid') }}">
        </div>

        <div>
            <input type="number" placeholder="Waarde" name="waarde" id="amount" class="input">
        </div>
        <button type="submit" class="btn_login">Betalen</button>
    </form>
    @if(session()->has('success'))
    <p class="success_opladen">{{ session('success') }}</p>
    @endif
</div>
@endsection