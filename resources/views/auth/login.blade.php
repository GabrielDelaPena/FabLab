@extends('layouts.app')

@section('content')
<div class="login_form">
    <p class="text">Login as Administrator</p>
    @if (session()->has('status'))
    <p class="error">{{ session('status') }}</p>
    @endif
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div>
            <input type="text" placeholder="Email" name="email" id="email" class="input" value="{{ old('email') }}">
        </div>

        <div>
            <input type="password" placeholder="Password" name="password" id="password" class="input">
        </div>

        <div class="check_box">
            <input type="checkbox" name="remember">
            <p>Remember me</p>
        </div>
        <button type="submit" class="btn_login">Login</button>
        <div class="forget_pass">
            <p>Forget password?</p>
            <a href="#">Click here</a>
        </div>
    </form>
</div>
@endsection