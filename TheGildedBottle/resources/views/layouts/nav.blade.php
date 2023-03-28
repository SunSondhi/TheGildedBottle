@include('layouts/head')


<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
?>





<nav class="navbar navbar-expand-lg sticky-top">

    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('HomePage') }}"><img src="{{url('images\logo.png')}}" height="100px" /></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                        <a class="nav-link me-2" href="{{ route('admin.HomePage') }}">Home</a>
                    <?php } else { ?>
                        <a class="nav-link me-2" href="{{ route('HomePage') }}">Home</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                        <a class="nav-link me-2" href="{{ route('admin.Products') }}">Products</a>
                    <?php } else { ?>
                        <a class="nav-link me-2" href="{{ route('products') }}">Products</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                        <a class="nav-link me-2" href="{{ route('admin.Basket') }}">Basket</a>
                    <?php } else { ?>
                        <a class="nav-link me-2" href="{{ route('Basket') }}">Basket</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                    <?php } else { ?>
                        <a class="nav-link me-2" href="{{ route('Purchases') }}">Purchases</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                        <a class="nav-link me-2" href="{{ route('admin.Aboutus') }}">About Us</a>
                    <?php } else { ?>
                        <a class="nav-link me-2" href="{{ route('Aboutus') }}">About Us</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                        <a class="nav-link me-2" href="{{ route('admin.Contactus') }}">Contact Us</a>
                    <?php } else { ?>
                        <a class="nav-link me-2" href="{{ route('Contactus') }}">Contact Us</a>
                    <?php } ?>
                </li>
            </ul>
        </div>



        @if (Auth::check())
        <div class="nav-item d-flex justify-content-end align-items-center">
            <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                <a href="{{ route('admin.adminhome') }}" style="padding:8px;" class="nav-link me-2 ">Admin Home</a>
            <?php } else { ?>
                <a href="{{ route('home') }}" style="padding:8px;" class="nav-link me-2 ">{{ Auth::user()->name }}</a>
            <?php } ?>

            <a class="nav-link me-2 " style="padding:8px;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <?php if (Auth::check() && Auth::user()->membership_role == '3') { ?>
                <a href="{{ route('Congratulations') }}" style="color:black;background-color:gold;" class="btn btn-primary me-2"> your membership</a>
            <?php } else { ?>
                <a class="btn btn-primary me-2" style="color:black;background-color:gold;" href="{{ route('Membership') }}">
                    become a Gilded Member

                </a>

            <?php } ?>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        @else
        <div class="nav-item d-flex justify-content-end align-items-center">
            <a class="nav-link me-2 " style="padding:8px;" href="{{ route('login') }}">{{ __('Login') }}</a>
            <a class="nav-link me-2" style="padding:8px;" href="{{ route('register') }}">{{ __('Register') }}</a>
        </div>

        @endif
    </div>

</nav>