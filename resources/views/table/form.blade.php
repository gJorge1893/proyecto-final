<div class="row padding-1 p-1">
        <div class="form-group mb-2 mb20 col-sm-12 col-md-6">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="Name" class="form-control @error('Name') is-invalid @enderror" value="{{ old('Name', $table?->Name) }}" id="name" placeholder="Nombre" autofocus>
            {!! $errors->first('Name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20  col-sm-12 col-md-6">
            <label for="description" class="form-label">{{ __('Descripción') }}</label>
            <input type="text" name="Description" class="form-control @error('Description') is-invalid @enderror" value="{{ old('Description', $table?->Description) }}" id="description" placeholder="Descripción">
            {!! $errors->first('Description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    <div class="d-flex justify-content-center col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>