<head>
    {{-- Author: Fong Zhi Jun --}}
    <title>TapNGo | Menu</title>
    @include('base.head')
</head>

<header class="header_section bg-dark text-white">
    <div class="container ">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span>
                    Tap<span class="text-warning">N</span>Go
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('home') }}">Home </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                    </li>
                </ul>

                @if (Route::has('login'))
                    <ul class="nav navbar-nav navbar-right">
                        @auth
                            <li class="nav-item  ">
                                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('login') }}">LOG IN</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('register') }}">REGISTER</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                @endif
            </div>
        </nav>
    </div>
</header>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
    @include('base.footer')
    @include('base.script')
</x-app-layout>
