@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Expense
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">{{ __('Editar datos de ') . $expense->item }} </span>
                        <a class="btn btn-primary btn-sm" href="{{ route('tables.show', $expense->table_id) }}"><i class="bi bi-arrow-90deg-left"></i></a>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('expenses.update', $expense->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('expense.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
