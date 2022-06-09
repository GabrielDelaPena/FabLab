<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fab_Lab</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>

<body>
    <nav>
        <div>
            <a href="{{ route('home') }}">Fab_Lab</a>
        </div>
        <ul>
            <li>
                <a href="{{ route('producten.index') }}">Catalogus</a>
            </li>
            <li>
                <a href="{{ route('contact') }}">Contact</a>
            </li>
            @auth
            <li>
                <a href="{{ route('orders') }}">Orders</a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="a_login">Logout</a>
            </li>
            @endauth

            @guest
            <li>
                <a href="{{ route('recharge.index') }}">Opladen</a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="a_login">Login</a>
            </li>
            @endguest
        </ul>
    </nav>
    <div class="content">
        @yield('content')
    </div>
</body>

</html>