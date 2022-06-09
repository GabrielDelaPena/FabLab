@extends('layouts.app')

@section('content')
<div class="container_form_student">
    <div class="item_container">
        <p class="item_title">Product Info</p>
        <p>Naam: <span class="item_info">{{ $product->name }}</span></p>
        <p>Beschrijving: <span class="item_info">{{ $product->description }}</span></p>
        <p>Prijs: <span class="item_info">€ {{ $product->price }}</span></p>
    </div>
</div>
@endsection