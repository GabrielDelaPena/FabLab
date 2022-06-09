@extends('layouts.app')

@section('content')
<div class="login_form">
    <p class="text">Student niet gevonden</p>
    <a class="error_btn" href="{{ route('recharge.index') }}">Terug naar opladen</a>
</div>
@endsection