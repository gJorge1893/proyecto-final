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
                            <span class="card-title">{{ __('Detalles de: ' . $expense->item) }} Expense</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tables.show', ['table' => $expense->table_id]) }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Table Id:</strong>
                            {{ $expense->table_id }}
                        </div>
                        {{-- <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $expense->item . __('.') }}
                        </div> --}}
                        <div class="form-group mb-2 mb20">
                            <strong>Descripción:</strong>
                            {{ $expense->description . __('.') }}
                        </div>
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
        <div class="mt-4 d-flex justify-content-center">
            <form action="{{ route('expenses.destroy', $expense) }}" method="POST">
                <a class="btn btn-sm btn-success" href="{{ route('expenses.edit', $expense->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
            </form>
        </div>
    </section>
@endsection
