<div class="row padding-1 p-1">
        
        <input type="hidden" name="table_id" class="form-control @error('table_id') is-invalid @enderror" value="{{ old('table_id', $shared?->table_id ?? $id) }}" id="table_id" placeholder="Table Id">
        <div class="form-group mb-2 mb20 col-sm-12 col-md-6">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                    @if (Request::is('*create*'))
                        @foreach($users as $user)
                        @if(!$shared->where('table_id', $id)->where('user_id', $user->id)->first())
                            <option value="{{ $user->id }}" {{ old('user_id', $shared?->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endif
                        @endforeach
                    @else
                        @if($shared->where($shared->table_id)->where($shared->user_id)->first())
                            <option value="{{ $user->id }}" {{ old('user_id', $shared?->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endif
                    @endif
            </select>
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20 col-sm-12 col-md-6">
            <label for="permission_id" class="form-label">{{ __('Permission Id') }}</label>
            <select name="permission_id" class="form-control @error('permission_id') is-invalid @enderror" id="permission_id">
                @foreach($permissions as $permission)
                    <option value="{{ $permission->id }}" {{ old('permission_id', $shared?->permission_id) == $permission->id ? 'selected' : '' }}>
                        {{ $permission->name }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('permission_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    <div class="col-md-12 mt20 mt-2  d-flex justify-content-center gap-3">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
        <a class="btn btn-primary" href="{{ route('tables.show', $shared->table_id ?? $id) }}"> {{ __('Volver') }}</a>
        @if ($shared->id)
            <form action="{{ route('shared.destroy', $shared->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
            </form>
        @endif
    </div>
</div>