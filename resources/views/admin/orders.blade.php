@extends('layouts.app')

@section('content')
<p class="order_text">Orders</p>
<div class="orders_container">
    @if ($orders->count() > 0)
    @foreach($orders as $order)
    <div class="order_item">
        <p>Order_id: {{ $order->id }}</p>
        <p>{{ $order->student_naam }}</p>
        <p>Product: {{ $order->product_name }}</p>
        <p>Quantity: {{ $order->qty }}</p>
    </div>
    @endforeach
    @else
    <p>Geen beselling beschikbaar</p>
    @endif
</div>
@endsection