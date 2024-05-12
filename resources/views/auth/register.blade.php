@extends('layouts.app')

@section('title')
    {{ __('Registrarse') }}
@endsection

@section('content')
    <section :status="session('status')">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="card-body p-5 text-center">
                                <h3 class="mb-5">Formulario de registro</h3>
                                <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="name">{{ __('Nombre') }}</label>
                                <input name="name" type="name" id="register-name" class="form-control form-control-lg" value="{{ old('name') }}" autofocus />
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                <div class="form-outline">
                                    <label class="form-label mt-2" for="email">{{ __('Email') }}</label>
                                    <input name="email" type="email" id="register-email" class="form-control form-control-lg" value="{{ old('email') }}" />
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
      
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">{{ __('Contraseña') }}</label>
                                <input name="password" type="password" id="registerPassword" class="form-control form-control-lg" />
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif

                                <label class="form-label mt-2" for="password_confirmation">{{ __('Confirmar contraseña') }}</label>
                                <input name="password_confirmation" type="password" id="register-password-confirmation" class="form-control form-control-lg" />
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                            
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit">Registrarse</button>
                        </form>
  
                        <hr class="my-4">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('¿Ya tienes cuenta?') }}</a>

                    </div>
                </div>
            </div>
        </div>
  </section>
@endsection

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
