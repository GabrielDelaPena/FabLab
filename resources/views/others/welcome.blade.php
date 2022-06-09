@extends('layouts.app')

@section('content')
<div class="container_contact">
    <h1>Welkom student</h1>
    <p>Fablab is een webshop waarmee studenten van erasmus hoge school
        Brussel materialen kunnen huren/kopen voor hun projecten.</p>
    <p>Om een project te maken, heeft een student veel materiaal nodig.
        Fablab heeft al het materiaal dat je nodig hebt om je project te maken.
        Van elektronische apparaten tot computer apparaten en veel meer...</p>
    <p>Met behulp van de studentenkaart, kan een student material huren
        /kopen. De studentenkaart kan ook opgeladen worden om meer
        materialen te huren/kopen.
        Voor de betaling raden we paypal aan.</p>
    <p>Wij hopen dat deze website voor veel studenten nuttig zal zijn en neem contact met ons op voor meer vragen.</p>
    <button class="btn_checkout"><a href="{{ route('producten.index') }}" class="checkout_text">Catalogus</a></button>
    
</div>
@endsection