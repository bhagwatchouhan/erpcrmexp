@extends('layouts.app')
@section( 'metaTitle', 'Dashboard' )
@section( 'metaDescription', 'Shows the user Dashboard.' )
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to ERP CRM') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
