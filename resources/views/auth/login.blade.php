@extends('layouts.app')

@section('template_title')
    login
@endsection
@section('content')
    <section :status="session('status')">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="card-body p-5 text-center">
                                <h3 class="mb-5">Iniciar sesión</h3>
                                <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="typeEmailX-2">{{ __('Email') }}</label>
                                <input name="email" type="email" id="typeEmailX-2" class="form-control form-control-lg" value="{{ old('email') }}" autofocus />
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
      
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="typePasswordX-2">{{ __('Contraseña') }}</label>
                                <input name="password" type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                        </form>
  
                        <hr class="my-4">

                        <a data-mdb-button-init data-mdb-ripple-init href="/google-auth/redirect" class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;">
                            <i class="fab fa-google me-2"></i>{{ __('Iniciar sesión con  google') }}
                        </a>
                    </div>
                    <!-- Create account -->
                    <div class="form-check d-flex justify-content-start mb-4 justify-content-center">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('¿No tienes cuenta?') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection