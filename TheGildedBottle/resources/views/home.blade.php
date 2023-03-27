@extends('layouts.app')
@include('layouts/head')
@include('layouts/nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color:black;">{{ __('Dashboard') }}</div>

                <div class="card-body"  style="color:black;">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert"  style="color:black;">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection