@section('title', '| Contact Us')

@include('layouts/head')
@include('layouts/nav')

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="font-size: 2.5rem; margin-bottom: 2rem;">Contact Us</h1>
    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <form action="{{ route('Contactus.send') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" style="font-size: 1.2rem;">Name</label>
            <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Your name" style="font-size: 1.2rem;">
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="email" style="font-size: 1.2rem;">Email</label>
            <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Your email" style="font-size: 1.2rem;">
            @if($errors->has('email'))
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="message" style="font-size: 1.2rem;">Message</label>
            <textarea id="message" name="message" class="form-control @if($errors->has('message')) is-invalid @endif" placeholder="Your message" style="font-size: 1.2rem;"></textarea>
            @if($errors->has('message'))
            <div class="invalid-feedback">{{ $errors->first('message') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary" style="color:black; font-size: 1.2rem; background-color: gold; border: none; margin-top: 1rem; padding: 1rem 2rem;">Send message</button>
    </form>
</div>

@endsection