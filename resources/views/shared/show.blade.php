@extends('layouts.app')

@section('template_title')
    {{ $shared->name ?? __('Show') . " " . __('Shared') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Shared</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('shareds.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Table Id:</strong>
                                    {{ $shared->table_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $shared->user_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Permission Id:</strong>
                                    {{ $shared->permission_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
