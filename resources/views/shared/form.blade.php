<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="table_id" class="form-label">{{ __('Table Id') }}</label>
            <input type="text" name="table_id" class="form-control @error('table_id') is-invalid @enderror" value="{{ old('table_id', $shared?->table_id) }}" id="table_id" placeholder="Table Id">
            {!! $errors->first('table_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $shared?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="permission_id" class="form-label">{{ __('Permission Id') }}</label>
            <input type="text" name="permission_id" class="form-control @error('permission_id') is-invalid @enderror" value="{{ old('permission_id', $shared?->permission_id) }}" id="permission_id" placeholder="Permission Id">
            {!! $errors->first('permission_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>