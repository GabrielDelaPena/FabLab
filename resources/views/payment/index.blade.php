@extends('layouts.app')

@section('content')
<div class="container_payment">
    <p class="text">Betaling</p>
    <div class="list_order">
        @if ($orders->count() > 0)
        @foreach ($orders as $order)
        <div class="order">
            <div class="name_uuid">
                <p class="name">{{ $order->name }}</p>
            </div>
            <p>€ {{ $order->price }}</p>
            <p>{{ $order->qty }}</p>
        </div>
        @endforeach
        @else
        <p>Kart is leeg</p>
        @endif
    </div>
    <form action="{{ route('payment.store') }}" method="post" class="form_payment">
        @csrf
        @if(session()->has('balanceError'))
        <p class="error">{{ session('balanceError') }}</p>
        @endif
        <p>Total te betalen: <span class="total_price">€ {{ $total_price }}</span></p>
        <div>
            <input type="text" placeholder="Uuid" name="id" id="uuid" class="input" value="{{ old('uuid') }}">
        </div>
        <div class="payment_btns">
            <button type="submit" class="btn_login">Betalen</button>
            <button class="btn_login"><a href="{{ route('payment.cancel') }}" class="cancel_text">Annuleren</a></button>
        </div>
    </form>
</div>
@endsection