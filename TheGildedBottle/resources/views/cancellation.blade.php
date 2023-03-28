@section('title', '| Membership Cancellation')
@include('layouts/head')
@include('layouts/nav')

@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-4">We're Sorry to See You Go!</h2>
    <p>Your subscription has been cancelled successfully.</p>
    <p>We hope you've enjoyed the benefits of our exclusive club during your time with us. If you have any feedback or suggestions for how we can improve our membership plans, please let us know. We're always looking for ways to make our customers' experiences better.</p>
    <p>If you change your mind and want to rejoin our club, you can do so at any time by visiting our membership plan page.</p>
    <a href="{{ route('Membership') }}" class="btn btn-primary">Join Our Gilded Membership Plan</a>
</div>
@endsection