<section class="p-4">
    <header>
        <h2 class="h3">
            {{ __('Actualizar contraseña') }}
        </h2>

        <p class="text-sm text-muted">
            {{ __('Asegúrate de elegir una contraseña larga y segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password">{{ __('Contraseña actual') }}</label>
            <input type="password" id="update_password_current_password" name="current_password" class="form-control col-sm-6 @error('name') is-invalid @enderror" required>
            {!! $errors->first('current_password', '<span class="invalid-feedback">:message</span>') !!}
            {{-- <x-input-label for="update_password_current_password" :value="__('Contraseña actual')" /> --}}
            {{-- <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" /> --}}
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password">{{ __('Contraseña nueva') }}</label>
            <input type="password" id="update_password_password" name="password" class="form-control col-sm-6 @error('name') is-invalid @enderror" required>
            {!! $errors->first('password', '<span class="invalid-feedback">:message</span>') !!}
        </div>

        <div>
            <label for="update_password_password_confirmation">{{ __('Confirmar contraseña') }}</label>
            <input type="password" id="update_password_password_confirmation" name="password_confirmation" class="form-control col-sm-6 @error('name') is-invalid @enderror" required>
            {!! $errors->first('password_confirmation', '<span class="invalid-feedback">:message</span>') !!}
        </div>

        <div class="d-flex align-items-center gap-4 mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-success"
                >{{ __('Contraseña actualizada correctamente.') }}</p>
            @endif
        </div>
    </form>
</section>
