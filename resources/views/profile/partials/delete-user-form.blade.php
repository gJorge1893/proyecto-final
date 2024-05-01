<section class="p-4">
    <header>
        <h2 class="h3">
            {{ __('Borrar cuenta') }}
        </h2>

        <p class="text-sm text-muted">
            {{ __('Una vez que elimines tu cuenta, todos tus recursos y datos se eliminarán de forma permanente. Antes de eliminar tu cuenta, descarga cualquier dato o información que desees conservar.') }}
        </p>
    </header>

    <button class="btn btn-danger"
        data-bs-toggle="modal"
        data-bs-target="#confirm-user-deletion"
    >{{ __('Borrar cuenta') }}</button>

    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="confirm-user-deletion-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-4">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="h5" id="confirm-user-deletion-label">
                        {{ __('¿Estás seguro de que quieres eliminar tu cuenta?') }}
                    </h2>

                    <p class="text-sm text-muted">
                        {{ __('Estaremos encantados de tenerte de vuelta en un futuro.') }}
                    </p>

                    <div class="mt-6 mb-2">
                        <label for="password" class="visually-hidden">{{ __('Password') }}</label>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="form-control"
                            placeholder="{{ __('Contraseña') }}"
                        />

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ __('Cancelar') }}
                        </button>

                        <button type="submit" class="btn btn-danger ms-3">
                            {{ __('Confirmar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</section>
