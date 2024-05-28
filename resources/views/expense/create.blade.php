@extends('layouts.app')

@section('title')
    {{ __('Nuevo registro') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <span class="card-title">{{ __('Crear nuevo gasto') }}</span>
                        </div>
                        <div>
                            <a class="btn btn-primary btn-sm button-effect" href="{{ route('tables.show', $id) }}"><i class="bi bi-arrow-90deg-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('expenses.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('expense.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
