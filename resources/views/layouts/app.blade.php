<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aayush</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-yellow-200">
    <nav class = "p-6 bg-black flex justify-between mb-6">
        <ul class="flex items-center text-white">
            <li>
                <a href="{{ route('home') }}" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            @auth
            @if(auth()->user()->usertype == 'admin')
            <li>
                <a href="{{ route('admin') }}" class="p-3">Admin Panel</a>
            </li>
            @elseif (auth()->user()->usertype == 'employee')
            <p class= "p-3">Employee</p>
            @endif
            @endauth
            
          
        </ul>
       
        <ul class="flex items-center text-white">
            {{-- @if (auth()->user()) --}}
            @auth
                <li>
                    <a href="{{route('home')}}" class="p-3">{{auth()->user()->name}}</a>
                </li>
                <form action="{{ route('logout') }}" method="post" class="inline p-3">
                    @csrf
                    <li>
                        <button type="submit">Logout</button>
                    </li>
                </form>
               
            @endauth

            @guest
            <li>
                <a href="{{ route('login') }}" class="p-3">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="p-3">Register</a>
            </li>
            @endguest
               
            {{-- @endif --}}
         
            
            
        </ul>
    </nav>
   @yield('content') 
 
</body>
</html>