@extends('layouts.app')

@section('title')
    {{ $table->Name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <span class="card-title">{{ $table->Name }}</span>
                        </div>
                        <div class="d-flex gap-4">
                            @if (Auth::user()->id == $table->user_id || $table->shareds->first()->permission_id == 2) 
                                <a href="{{ route('expenses.create', ['id' => $table->id]) }}"><i class="bi bi-plus-square-fill icon-size"></i></a>
                            @endif

                            @if (Auth::user()->id == $table->user_id)
                                <a href="{{ route('shared.create', ['id' => $table->id]) }}"><i class="bi bi-share-fill icon-size"></i></a>
                            @endif

                            <div class="dropdown">
                                <i class="bi bi-funnel-fill icon-size primary-color dropdown-toggle"  data-bs-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    
                                    <a class="dropdown-item select-effect" href="{{ route('tables.show', ['table' => $table->id]) }}">{{ __('Todos') }}</a>
                                    <a class="dropdown-item select-effect" href="{{ route('tables.show', ['table' => $table->id, 'type' => 'gasto']) }}">{{ __('Gastos') }}</a>
                                    <a class="dropdown-item select-effect" href="{{ route('tables.show', ['table' => $table->id, 'type' => 'ingreso']) }}">{{ __('Ingresos') }}</a>
                                    <a class="dropdown-item select-effect" href="{{ route('tables.show', ['table' => $table->id, 'price' => 'desc']) }}">{{ __('Precio (mayor a menor)') }}</a>
                                    <a class="dropdown-item select-effect" href="{{ route('tables.show', ['table' => $table->id, 'price' => 'asc']) }}">{{ __('Precio (menor a mayor)') }}</a>
                                </div>
                            </div>

                            <a href="{{ route('tables.pdf', ['id' => $table->id, 'type' => request()->get('type'), 'price' => request()->get('price')]) }}"><i class="bi bi-file-earmark-arrow-down-fill icon-size primary-color"></i></a>

                        </div>
                        <div>
                            <a class="btn btn-primary btn-sm" href="{{ Auth::user()->id == $table->user_id ? route('tables.index') : route('shared.index') }}"><i class="bi bi-arrow-90deg-left"></i></a>
                        </div>
                    </div>
                    
                    <div class="card-body bg-white">
                        @if (strlen($table->description) > 0)
                            <div class="form-group mb20">
                                <strong>Descripción:</strong>
                                {{ $table->Description . __('.') }}
                            </div>
                            
                        @endif

                        @if (Auth::user()->id != $table->user_id)
                            <strong>{{ __('Tabla creada por:') }}</strong>
                            {{ $table->user->name . '.' }}
                        @endif

                        <div class="form-group mb-4 mb20">
                            <strong>{{ __('Compartida con:') }}</strong>
                            @foreach($table->shareds as $shared)
                                @if(Auth::user()->id == $table->user_id)
                                    <a href="{{ route('shared.edit', $shared->id) }}">{{ $shared->user->name }}</a>{{ $loop->last ? '.' : ',' }}
                                @else
                                    {{ $shared->user->name }}{{ $loop->last ? '.' : ',' }}
                                @endif
                            @endforeach
                        </div>

                        @include('expense.index', ['expenses' => $expenses])

                    </div>
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-center">
                <form action="{{ route('tables.destroy', $table->id) }}" method="POST">
                    @if (Auth::user()->id == $table->user_id || $table->shareds->where('user_id', Auth::user()->id)->where('permission_id', 2)->first())
                        <a class="btn btn-sm btn-success button-effect" href="{{ route('tables.edit', $table->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar tabla') }}</a>
                    @endif
                    @if (Auth::user()->id == $table->user_id)
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm button-effect" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar tabla') }}</button>
                    @endif
                </form>
            </div>
        </div>
    </section>
@endsection
