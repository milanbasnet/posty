<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel auth</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex items-center">
            <li>
                <a href="" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{route('dashboard')}}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{route('posts')}}" class="p-3">Posts</a>
            </li>
        </ul>
        <ul class="flex items-center">
            {{-- @if (auth()-> check())  * instead of doing if statement we can use auth derictives --}}
            @auth
                <li>
                <a href="#" class="p-3">{{auth()->user()->name}}</a>
            </li>
            <li>
                <a href="{{route('logout')}}" class="p-3">Logout</a>
            </li> 
            {{-- @else --}} @endauth
            @guest {{-- guest derictives for login and register  --}}
            <li>
                <a href="{{route('login')}}" class="p-3">Login</a>
            </li>
            <li>
                <a href="{{route('register')}}" class="p-3">Register</a>
            </li>
            @endguest
            
           
        </ul>
    </nav>

    <div class="container mt-6 px-6">
    @yield('content') 
    </div>
</body>
</html>