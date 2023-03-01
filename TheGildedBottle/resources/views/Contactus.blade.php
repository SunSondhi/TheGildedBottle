@section('title','| Contact Us')
@include('layouts/head')
@include('layouts/nav')

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contact Us</h1>
    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <form action="{{ route('Contactus.send') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Your name">
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Your email">
            @if($errors->has('email'))
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" class="form-control @if($errors->has('message')) is-invalid @endif" placeholder="Your message"></textarea>
            @if($errors->has('message'))
            <div class="invalid-feedback">{{ $errors->first('message') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Send message</button>
    </form>
</div>
@endsection