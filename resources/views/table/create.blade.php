@extends('layouts.app')

@section('title')
    {{ __('Nueva tabla') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">{{ __('Nueva tabla') }}</span>
                        <a class="btn btn-primary btn-sm" href="{{ route('tables.index') }}"><i class="bi bi-arrow-90deg-left"></i></a>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('tables.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}" id="user_id" placeholder="User Id">

                            @include('table.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
