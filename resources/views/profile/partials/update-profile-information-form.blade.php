<section class="p-4">
    <header>
        <h2 class="h3">
            {{ __('Información del perfil') }}
        </h2>

        <p class="text-sm text-muted">
            {{ __("Actualiza la información de perfil y la dirección de correo electrónico de tu cuenta.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input id="name" type="text" name="name" class="form-control col-sm-6 @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
        </div>

        @if (Auth::user()->password)
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username">
                {!! $errors->first('email', '<span class="invalid-feedback">:message</span>') !!}

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-muted">
                            {{ __('Tu dirección de correo electrónico no está verificada.') }}

                            <button form="send-verification" class="underline text-sm text-muted hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Haz clic aquí para reenviar el correo electrónico de verificación.') }}
                            </button>
                        </p>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-success">
                                {{ __('Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.') }}
                            </p>
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        @endif

        <div class="d-flex align-items-center gap-4 mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>

            @if (session('status') === 'profile-updated')
            <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 3000)"
            class="text-success"
            >{{ __('Datos actualizados correctamente.') }}</p>
            @endif
        </div>
    </form>
</section>
