<div class="row padding-1 p-1">        
        <input type="hidden" name="table_id" class="form-control @error('table_id') is-invalid @enderror" value="{{ old('table_id', $expense?->table_id ?? $id) }}" id="table_id" placeholder="Table Id">
        <div class="form-group mb-2 mb20 col-sm-12 col-md-6">
            <label for="item" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="item" class="form-control @error('item') is-invalid @enderror" value="{{ old('item', $expense?->item) }}" id="item" placeholder="Nombre" autofocus>
            {!! $errors->first('item', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20 col-sm-12 col-md-6">
            <label for="description" class="form-label">{{ __('Descripción') }}</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $expense?->description) }}" id="description" placeholder="Descripción">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <hr class="mt-4" />
        <div class="form-group mb-2 mb20 col-sm-12 col-md-4">
            <label for="date" class="form-label">{{ __('Fecha') }}</label>
            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $expense?->date ?? now()->format('Y-m-d')) }}" id="date" placeholder="Fecha">
            {!! $errors->first('date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20 col-sm-12 col-md-4">
            <label for="quantity" class="form-label color">{{ __('Cantidad') }}</label>
            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $expense?->quantity) }}" id="quantity" placeholder="1">
            {!! $errors->first('quantity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20 col-sm-12 col-md-4">
            <label for="price" class="form-label">{{ __('Precio (unidad)') }}</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $expense?->price) }}" id="price" placeholder="17.90">
            {!! $errors->first('price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <hr class="mt-4" />
        <div class="form-group mb-2 mb20 col-sm-12 col-md-4">            
            <label for="establishment" class="form-label">{{ __('Establecimiento') }}</label>
            <input type="text" name="establishment" class="form-control @error('establishment') is-invalid @enderror" value="{{ old('establishment', $expense?->establishment) }}" id="establishment" placeholder="Establecimiento">
            {!! $errors->first('establishment', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20 col-sm-12 col-md-4">
            <label for="category" class="form-label">{{ __('Categoría') }}</label>
            <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $expense?->category) }}" id="category" placeholder="Comida">
            {!! $errors->first('category', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20 col-sm-12 col-md-4">
            <label for="type" class="form-label">{{ __('Tipo') }}</label>
            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                <option value="Gasto" {{ old('type', $expense?->type) == 'Gasto' ? 'selected' : '' }}>Gasto</option>
                <option value="Ingreso" {{ old('type', $expense?->type) == 'Ingreso' ? 'selected' : '' }}>Ingreso</option>
            </select>
            {!! $errors->first('type', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    <div class="d-flex justify-content-center col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary button-effect">{{ __('Enviar') }}</button>
    </div>
</div>