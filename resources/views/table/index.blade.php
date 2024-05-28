@extends('layouts.app')

@section('title')
    {{ __('Mis tablas') }}
@endsection

@section('content')
    <div class="container-fluid">
        @if (session('error'))
            <div class="alert alert-danger m-4">
                <p>{{ session('error') }}</p>
            </div>
            
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">

                            <span id="card_title">
                                {{ __('Mis tablas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tables.create') }}" data-placement="left">
                                    <i class="bi bi-plus-square-fill icon-size"></i>
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body bg-white">
                        <div class="row">

                            @foreach ($tables as $table)
                                <div class="col-sm-12 col-md-4 mt-2">
                                    <div class="card d-flex">
                                        <div class="card-body card-table">
                                            <div class="d-flex justify-content-center">
                                                <h5 class="card-title">{{ $table->Name }}</h5>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <p class="card-text">{{ $table->Description }}</p>
                                            </div>
                                            <hr />
                                            <div class="d-flex justify-content-center">
                                                <form action="{{ route('tables.destroy', $table->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary button-effect" href="{{ route('tables.show', $table->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success button-effect" href="{{ route('tables.edit', $table->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm button-effect"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    {{ $tables->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
