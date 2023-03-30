@include('layouts/head')
@include('layouts/nav')

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="alert alert-success text-center" role="alert">
        <h2>Thank you for subscribing to our Gilded Membership Plan!</h2>
        <p>You are now a Gilded member of our exclusive club and have access to numerous benefits that regular customers don't have.</p>
    </div>
    <h2 class="mb-4">Explore Our Gilded Benefits</h2>
    <p>As a member of our exclusive club, you'll enjoy numerous benefits that regular customers don't have access to. Our membership plan offers a variety of perks that will enhance your shopping experience and save you money in the process.</p>
    <ul>
        <li>Receive a 15% Gilded discount on all purchases</li>
        <li>Get access to limited-edition products before they're released to the general public</li>
        <li>Attend exclusive events and tastings</li>
        <li>Enjoy free shipping on all orders over $100</li>
        <li>Receive a personalized gift on your birthday</li>
    </ul>
    <p>You made a great decision by choosing our membership plan that costs just $50 per year and is open to anyone over the age of 21. If you have any questions or concerns, please don't hesitate to reach out to our customer service team.</p>
</div>
<form action="{{ route('cancellation')}}" method="POST">@csrf
                                    <button type="submit" class="btn btn-primary">cancel subscription</button>
                            </form>

@endsection