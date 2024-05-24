@extends('layouts.app')

@section('template_title')
    {{ $expense->name ?? __('Show') . " " . __('Expense') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles de: ' . $expense->item) . __('.') }} </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tables.show', ['table' => $expense->table_id]) }}"><i class="bi bi-arrow-90deg-left"></i></a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        @if (strlen($expense->description) > 0)
                            <div class="form-group mb-2 mb20">
                                <strong>Descripción:</strong>
                                {{ $expense->description . __('.') }}
                            </div>
                        @endif
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha:</strong>
                            {{ $expense->date . __('.') }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cantidad:</strong>
                            {{ $expense->quantity . __('.') }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Precio (unidad):</strong>
                            {{ $expense->price . __(' €.') }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Precio (total):</strong>
                            {{ $expense->quantity * $expense->price . __(' €.') }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Establecimiento:</strong>
                            {{ $expense->establishment . __('.') }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Categoría:</strong>
                            {{ $expense->category . __('.') }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Tipo:</strong>
                            {{ $expense->type . __('.') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->id == $expense->table->user_id || $expense->table->shareds->where('user_id', Auth::user()->id)->where('permission_id', 2)->first())
            <div class="mt-4 d-flex justify-content-center">
                <form action="{{ route('expenses.destroy', $expense) }}" method="POST">
                    <a class="btn btn-sm btn-success" href="{{ route('expenses.edit', $expense->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                </form>
            </div>
        @endif
    </section>
@endsection
