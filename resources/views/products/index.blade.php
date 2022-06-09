@extends('layouts.app')

@section('content')
<p class="alle_artikelen">Alle artikelen</p>
<!-- @if (session('message'))
<p>{{ session('message') }}</p>
@endif -->
<div class="container_product_1">
    @if (count($products) > 0)
    @foreach($products as $product)
    <div class="product_1">
        <img src="{{ asset('images/carimbo-de-borracha-do-tba-86702705.jpg') }}" alt="" width="200px" height="120px">
        <div class="product_info_1">
            <a href="{{ route('producten.show', ['producten' => $product->id]) }}" class="product_name_1">{{ $product->name }}</a>
            <p>€ {{ $product->price }}</p>
        </div>


        @guest
        <form action="{{ route('cart.store') }}" class="container_kopen_1" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="number" class="quantity_1" placeholder="Amount" name="quantity">
            <button type="submit" class="btn_kopen_1">Kopen</button>
        </form>
        @endguest
    </div>
    @endforeach

    @else
    <p>Geen producten in stock.</p>
    @endif
</div>
<div class="container_checkout">
    @auth
    <button class="btn_checkout"><a href="{{ route('admin.index') }}" class="aanpassen_text">Admin Pagina</a></button>
    @endauth

    @guest
    <button class="btn_checkout"><a href="{{ route('payment') }}" class="checkout_text">Checkout</a></button>
    @if (session()->has('orderSucces'))
    <p class="success">{{ session('orderSucces') }}</p>
    @endif
    <p class="label_total">Total items: <span class="total_item">{{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }}</span></p>
    @endguest
</div>
@endsection