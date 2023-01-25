@include('layouts/head')

<div class="nav-container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="#" id="logo-txt" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <!-- add the logo here-->
           The Gilded Bottle
        </a>

        <?php

        use GuzzleHttp\Middleware;
        use Illuminate\Support\Facades\Route;
        use Illuminate\Support\Facades\Auth;
        ?>

        <!-- @if (Auth::user() && Auth::user()->role == 'admin')
        'THIS IS WHAT I WANT ONLY ADMIN USERS TO SEE!'
        @endif -->


        <ul id="list-nav" class="nav col-12 col-lg-auto my-2 justify-content-center my-md-10">
            <li>
                <?php
                if (Auth::check() && Auth::user()->role == '1') {
                ?>
                    <a href="{{ route('admin.HomePage') }}" class="nav-link">Home</a>
                <?php
                } else {
                ?>
                    <a href="{{ route('HomePage') }}" class="nav-link">Home</a>
                <?php
                }
                ?>
            </li>
            <li>
                <?php
                if (Auth::check() && Auth::user()->role == '1') {
                ?>
                    <a href="{{ route('admin.Products') }}" class="nav-link">Products</a>

                <?php
                } else {
                ?>
                    <a href="{{ route('Products') }}" class="nav-link">Products</a>

                <?php
                }
                ?>
            </li>
            <li>
                <?php
                if (Auth::check() && Auth::user()->role == '1') {
                ?>
                    <a href="{{ route('admin.Basket') }}" class="nav-link">Basket</a>

                <?php
                } else {
                ?>
                    <a href="{{ route('Basket') }}" class="nav-link">Basket</a>

                <?php
                }
                ?>
            </li>
            <li>
                <?php
                if (Auth::check() && Auth::user()->role == '1') {
                ?>
                    <a href="{{ route('admin.Aboutus') }}" class="nav-link">About Us</a>

                <?php
                } else {
                ?>
                    <a href="{{ route('Aboutus') }}" class="nav-link">About Us</a>

                <?php
                }
                ?>
            </li>
            <li>
                <?php
                if (Auth::check() && Auth::user()->role == '1') {
                ?>
                    <a href="{{ route('admin.Contactus') }}" class="nav-link">Contact Us</a>

                <?php
                } else {
                ?>
                    <a href="{{ route('Contactus') }}" class="nav-link">Contact Us</a>

                <?php
                }
                ?>
            </li>
        </ul>
    </div>
</div>

<div class="bottom-navbar">
    <div class="container">
        <div class="row">
            <form class="search" action="">
                <input class="input" type="search" placeholder="Search here..." required>
                <button class="button" type="submit">Search</button>
            </form>
            <div class="text-end">
                <?php
                if (Auth::check() && Auth::user()->role == '1') {
                ?>
                    <a href="{{ route('admin.adminhome') }}"><button type="button" class="button">Home</button></a>

                <?php
                } else {
                ?>
                    <a href="{{ route('login') }}"><button type="button" class="button">Login</button></a>
                    <a href="{{ route('register') }}"><button type="button" class="button">Sign-up</button></a>

                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>
<div class="bottom-bottom-navbar">
    <a href="{{ route('Products') }}">X</a>
    <a href="{{ route('Products') }}">X</a>
    <a href="{{ route('Products') }}">X</a>
    <a href="{{ route('Products') }}">X</a>
</div>