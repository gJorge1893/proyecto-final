@extends('layouts.app')

@section('title')
    {{ $table->Name }}
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
                            @if (Auth::user()->id == $table->user_id || $table->shareds->first()->permission_id == 2) 
                                <a href="{{ route('expenses.create', ['id' => $table->id]) }}"><i class="bi bi-plus-square-fill icon-size margin-right-4px"></i></a>
                            @endif
                            @if (Auth::user()->id == $table->user_id)
                                <a href="{{ route('shared.create', ['id' => $table->id]) }}"><i class="bi bi-share-fill icon-size"></i></a>
                            @endif
                        </div>
                        <div class="float-right">
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

                        <div class="form-group mb-4 mb20">
                            <strong>Compartida con:</strong>
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
                        <a class="btn btn-sm btn-success" href="{{ route('tables.edit', $table->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar tabla') }}</a>
                    @endif
                    @if (Auth::user()->id == $table->user_id)
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar tabla') }}</button>
                    @endif
                </form>
            </div>
        </div>
    </section>
@endsection
