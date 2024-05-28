@extends('layouts.app')

@section('title')
    {{ __('Actualizar ') . $table->Name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">{{ __('Actualizar ') . $table->Name }} </span>
                        <a class="btn btn-primary btn-sm button-effect" href="{{ Auth::user()->id == $table->user_id ? route('tables.index') : route('shared.index') }}"><i class="bi bi-arrow-90deg-left"></i></a>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('tables.update', $table->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('table.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
