@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Expense
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Crear nuevo gasto') }}</span>
                        </div>
                        <div class="float-right">
                            {{-- <a class="btn btn-primary btn-sm" href="{{ route('tables.show', ['table' => $expense->table_id]) }}"> {{ __('Volver') }}</a> --}}
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
