<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/haywanatshare3na.css') }}">
    <title>OurWelcome</title>
</head>
<body class="">
<nav id="navbar" class="p-4 bg-indigo-900 flex justify-between w-full fixed">
        <ul class="flex items-center text-2xl">
            <li>
                <a href="{{route('ourhome')}}" class="p-5">
                    <img class="inline w-10" src="images/dog.jpg" >
                </a>
            </li>
            <li>
                <a href="{{route('oursearch')}}" class="p-5 bg-gradient-to-r text-white hover:from-green-400 hover:to-blue-500">Browse Pets</a>
            </li>
            @auth
            <li>
                <a href="{{route('ouruseraccessories')}}" class="p-5 bg-gradient-to-r text-white hover:from-green-400 hover:to-blue-500">Cash out</a>
            </li>
            <li>
                <a href="{{route('ouruseranimals')}}" class="p-5 bg-gradient-to-r text-white hover:from-green-400 hover:to-blue-500">my adopted animals</a>
            </li>
            <li>
                <a href="{{route('ouranimals')}}" class="p-5 bg-gradient-to-r  hover:from-green-400 text-white hover:to-blue-500">Add a pet</a>
            </li>
            <li>
                <a href="{{route('ouraccessories')}}" class="p-5 bg-gradient-to-r  hover:from-green-400 text-white hover:to-blue-500">Accessories</a>
            </li>
            @endauth
            <li>
                <a href="{{route('ouraboutus')}}" class="p-5 bg-gradient-to-r  hover:from-green-400 text-white hover:to-blue-500">About us</a>
            </li>
            @auth
            @if(auth()->user()->admin)
                <li>
                <a href="{{route('ouradminaccessories')}}" class="p-5 bg-gradient-to-r  hover:from-green-400 text-white hover:to-blue-500">Upload Accessories</a>
                </li>
            
            @endif
            
            @endauth
        </ul>

        <ul class="flex items-center text-2xl">

            @auth
            <li>
                <a href="" class="p-5 bg-gradient-to-r text-white hover:from-green-400 hover:to-blue-500">{{auth()->user()->name}}</a>
            </li>
            <li>
                <form action="{{route('ourlogout')}}" class="inline p-5 bg-gradient-to-r text-white hover:from-green-400 hover:to-blue-500" method="post">
                    @csrf
                    <button type="submit">logout</button>
                </form>

            </li>
            @endauth

            @guest
            <li>
                <a href="{{route('ourlogin')}}" class="p-5 bg-gradient-to-r text-white hover:from-green-400 hover:to-blue-500">login</a>
            </li>
            <li>
                <a href="{{route('ourregister')}}" method="get"  class="p-5 bg-gradient-to-r text-white hover:from-green-400 hover:to-blue-500">register</a>
            </li>
            @endguest



        </ul>
    </nav>
    <div >
    @yield('content')
    </div>
    
</body>
</html>