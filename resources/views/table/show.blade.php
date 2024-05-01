@extends('layouts.app')

@section('template_title')
    {{ $table->name ?? __('Show') . " " . __('Table') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ $table->Name }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('expenses.create', ['id' => $table->id]) }}"> {{ __('Añadir') }}</a>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tables.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb20">
                            <strong>Descripción:</strong>
                            {{ $table->Description . __('.') }}
                        </div>

                        <div class="form-group mb-4 mb20">
                            <strong>Compartida con:</strong>
                            {{ $table->Description }}
                        </div>
                        
                        @include('expense.index', ['expenses' => $expenses])

                    </div>
                </div>
            </div>
            <div class="mt-4  d-flex justify-content-center">
                <form action="{{ route('tables.destroy', $table->id) }}" method="POST">
                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('tables.show', $table->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a> --}}
                    <a class="btn btn-sm btn-success" href="{{ route('tables.edit', $table->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar tabla') }}</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar tabla') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
