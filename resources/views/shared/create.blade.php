@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Shared
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">{{ __('Compartir con') }}</span>
                        <a class="btn btn-primary btn-sm button-effect" href="{{ route('tables.show', $id) }}"><i class="bi bi-arrow-90deg-left"></i></a>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('shared.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('shared.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
