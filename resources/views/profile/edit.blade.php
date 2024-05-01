@extends('layouts.app')

@section('template_title')
    Perfil
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mi perfil') }}</div>

                    <div class="">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    @if (Auth::user()->password)
                        <div class="">
                            @include('profile.partials.update-password-form')
                        </div>
                    @endif

                    <div>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
