@extends('layouts.app')

@section('title')
    {{ __('Compartidas conmigo') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Compartidas conmigo') }}
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="row">
                            @foreach ($shareds as $shared)
                                <div class="col-sm-12 col-md-4 mt-2">
                                    <div class="card d-flex">
                                        <div class="card-body card-table">
                                            <div class="d-flex justify-content-center">
                                                <h5 class="card-title">{{ $shared->table->Name }}</h5>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <p class="card-text">{{ $shared->table->Description }}</p>
                                            </div>
                                            <hr />
                                            <div class="d-flex justify-content-center">
                                                <a class="btn btn-sm btn-primary margin-right-4px" href="{{ route('tables.show', $shared->table_id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                @if ($shared->permission_id == 2)
                                                    <a class="btn btn-sm btn-success" href="{{ route('tables.edit', $shared->table_id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {!! $shareds->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
