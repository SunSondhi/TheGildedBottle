@include('layouts/head')


<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
?>

<style>

.container {
    background-color: #1C1C1C;
    color: #F7D53D;
    padding: 30px;
    border-radius: 5px;
}

.form-control {
    background-color: #2F2F2F;
    color: #F7D53D;
    border: none;
    border-radius: 5px;
}

.btn-primary {
    background-color: #F7D53D;
    color: #1C1C1C;
    border: none;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #1C1C1C;
    color: #F7D53D;
}

</style>



<nav class="navbar navbar-expand-lg navbar-dark sticky-top">

    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('HomePage') }}"style="color:gold;">The Gilded Bottle</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                        <a class="nav-link me-2" style="color:gold;"href="{{ route('admin.HomePage') }}">Home</a>
                    <?php } else { ?>
                        <a class="nav-link me-2" style="color:gold;"href="{{ route('HomePage') }}">Home</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                        <a class="nav-link me-2" style="color:gold;"href="{{ route('admin.Products') }}">Products</a>
                    <?php } else { ?>
<<<<<<< Updated upstream
                        <a class="nav-link me-2" href="{{ route('Products') }}">Products</a>
=======
                        <a class="nav-link me-2" style="color:gold;"href="{{ route('products') }}">Products</a>
>>>>>>> Stashed changes
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                        <a class="nav-link me-2" style="color:gold;"href="{{ route('admin.Basket') }}">Basket</a>
                    <?php } else { ?>
                        <a class="nav-link me-2" style="color:gold;"href="{{ route('Basket') }}">Basket</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                    <?php } else { ?>
                        <a class="nav-link me-2" style="color:gold;"href="{{ route('Purchases') }}">Purchases</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                        <a class="nav-link me-2" style="color:gold;"href="{{ route('admin.Aboutus') }}">About Us</a>
                    <?php } else { ?>
                        <a class="nav-link me-2" style="color:gold;"href="{{ route('Aboutus') }}">About Us</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                        <a class="nav-link me-2" style="color:gold;"href="{{ route('admin.Contactus') }}">Contact Us</a>
                    <?php } else { ?>
                        <a class="nav-link me-2" style="color:gold;"href="{{ route('Contactus') }}" >Contact Us</a>
                    <?php } ?>
                </li>
            </ul>
        </div>

        <div class="d-flex justify-content-end align-items-center">
            <?php if (Auth::check() && Auth::user()->role == '1') { ?>
                <a href="{{ route('admin.adminhome') }}" class="btn btn-primary me-2">Admin Home</a>
            <?php } else { ?>
                <a href="{{ route('home') }}" style="color: black; background-color: gold;border: 2px solid black;" class="btn btn-primary me-2">Home</a>
            <?php } ?>
        </div>

        @if (Auth::check())
        <div>
            <a class="btn btn-primary me-2" href="{{ route('logout') }}" style="color: black; background-color: gold; border: 2px solid black;"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"style="color: black; background-color: gold; border: 2px solid black;">
                @csrf
            </form>
        </div>
        @else
        <a  class="btn btn-primary me-2"  href="{{ route('login') }}"style="color: black; background-color: gold; border: 2px solid black;">{{ __('Login') }}</a>
        <a class="btn btn-primary me-2" href="{{ route('register') }}" style="color: black; background-color: gold; border: 2px solid black;">{{ __('Register') }}</a>
        @endif
    </div>

</nav>
