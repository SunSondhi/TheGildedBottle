@section('title', '| Membership Plan')
@include('layouts/head')
@include('layouts/nav')

@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-4">Join Our Gilded Membership Plan Today!</h2>
    <p>As a Gilded member of our exclusive club, you'll enjoy numerous benefits that regular customers don't have access to. Our membership plan offers a variety of perks that will enhance your shopping experience and save you money in the process.</p>
    <ul>
        <li>Receive a 15% Gilded discount on all purchases</li>
        <li>Get access to limited-edition products before they're released to the general public</li>
        <li>Attend exclusive events and tastings</li>
        <li>Enjoy free shipping on all orders over $100</li>
        <li>Receive a personalized gift on your birthday</li>
    </ul>
    <p>Membership costs just $50 per year and is open to anyone over the age of 21. To join, simply fill out the form below and submit it. Once we receive your application, we'll process it and send you a confirmation email.</p>

    <div class="container">
    <h2 class="mb-4">Choose Your Membership Plan Today!</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card gold" style="background-color:gold;">
                <div class="card-header">
                    <h3>Gold Plan</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <li>15% Gilded discount on all purchases</li>
                        <li>Early access to limited-edition products</li>
                        <li>Invitations to exclusive events and tastings</li>
                        <li>Free shipping on orders over $100</li>
                        <li>Personalized birthday gift</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <h4>$50/year</h4>
                    <form action="{{ route('subscribe')}}" method="POST">@csrf
                                    <button type="submit" class="btn btn-primary">join now</button>
                            </form>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card silver" style="background-color:silver;">
                <div class="card-header">
                    <h3>Silver Plan</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <li>15% Gilded discount on all purchases</li>
                        <li>Early access to limited-edition products</li>
                        <li>Invitations to exclusive events and tastings</li>
                        <li>Free shipping on orders over $200</li>
                        <li>Personalized birthday gift</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <h4>$25/year</h4>
                    <form action="{{ route('subscribe')}}" method="POST">@csrf
                                    <button type="submit" class="btn btn-primary">join now</button>
                            </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card platinum" style="background-color:diamond;">
                <div class="card-header">
                    <h3>Platinum Plan</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <li>15% discount on all purchases</li>
                        <li>Early access to limited-edition products</li>
                        <li>Invitations to exclusive events and tastings</li>
                        <li>Free shipping on all orders</li>
                        <li>Personalized birthday gift</li>
                    </ul>
                </div>
                <form action="{{ route('subscribe')}}" method="POST">@csrf
                                    <button type="submit" class="btn btn-primary">join now</button>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>
    <p>Choose the plan that best fits your needs and budget. As a member of our exclusive club, you'll enjoy numerous benefits that regular customers don't have access to. Our membership plans offer a variety of perks that will enhance your shopping experience and save you money in the process.</p>
</div>
<br><br>

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1>About Us</h1>


@endsection