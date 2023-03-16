<head>
    <title>TapNGo | Register</title>
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
                                <a class="nav-link" href="{{ url('/profile') }}">Dashboard</a>
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

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" :value="old('password')" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />

                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" required
                    :value="old('address')" />
            </div>

            <!-- Phone Number -->
            <div class="mt-4">
                <x-input-label for="phone_number" :value="__('Phone Number')" />

                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" required
                    :value="old('phone_number')" />
            </div>

            <!-- Role -->
            <div class="mt-4 mb-4">
                <x-input-label for="role_level" :value="__('Role')" />

                <!-- <x-text-input id="role_level" class="block mt-1 w-full"
                                type="number"
                                name="role_level" required />-->
                <select class="form-select mt-1 block w-full" id="role_level" name="role_level" required>
                    <option value="1" selected>Customer</option>
                    <option value="2">Rider</option>
                    <option value="8">Admin</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-5 pt-6 pb-6">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
    @include('base.footer')
    @include('base.script')
</x-guest-layout>
