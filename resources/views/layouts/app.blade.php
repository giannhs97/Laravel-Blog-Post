<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF8">
        <meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
        <meta http-equiv = "X-UA-Compatible" content = "ie = edge">
        <title>MU Fans</title>

        <link rel = "stylesheet" href = "{{ asset ('css/app.css') }}">
    </head>

    <body class = 'bg-red-600'>
        <nav class = 'p-6 bg-white flex justify-between mb-6'>
            <ul class = 'flex items-center'>
                <li class = 'p-6'>
                    <a href = "/">Home</a>
                </li>
                <li class = 'p-6'>
                    <a href = "{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class = 'p-6'>
                    <a href = "{{ route('posts') }}">Post</a>
                </li>
            </ul>

            <ul class = 'flex items-center'>
                @auth
                    <li class = 'p-6'>
                        <a href = "">{{ auth() -> user() -> username}}</a>
                    </li> 
                
                    <li>
                        <form action = "{{ route('logout') }}" method = "post" class = "p-3 inline">
                            @csrf
                            <button type = "submit">Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class = 'p-6'>
                        <a href = "{{ route('login') }}">Login</a>
                    </li>
                    <li class = 'p-6'>
                        <a href = "{{ route('register') }}">Register</a>
                    </li>
                @endguest
            
            
            
            </ul>
        </nav>
        @yield('content')
    </body>

</html>
