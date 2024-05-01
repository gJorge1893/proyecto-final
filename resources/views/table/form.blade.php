<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <input type="hidden" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ Auth::user()->id }}" id="user_id" placeholder="User Id">
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="Name" class="form-control @error('Name') is-invalid @enderror" value="{{ old('Name', $table?->Name) }}" id="name" placeholder="Name">
            {!! $errors->first('Name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <input type="text" name="Description" class="form-control @error('Description') is-invalid @enderror" value="{{ old('Description', $table?->Description) }}" id="description" placeholder="Description">
            {!! $errors->first('Description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>