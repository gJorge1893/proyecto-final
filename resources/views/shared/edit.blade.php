@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Shared
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">{{ __('Modificar permisos') }} </span>
                        <a class="btn btn-primary btn-sm button-effect" href="{{ route('tables.show', $shared->table_id) }}"><i class="bi bi-arrow-90deg-left"></i></a>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('shared.update', $shared->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('shared.form')

                        </form>
                        <div class="d-flex justify-content-center">
                            <form action="{{ route('shared.destroy', $shared->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-4 button-effect"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
