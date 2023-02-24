@include('layouts/head')




<div class="nav-container navbar sticky-top">

    <!-- <div id='left'>
        <a href="{{route('HomePage')}}" id="logo-txt" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-black text-decoration-none">

            The Gilded Bottle
        </a>
    </div> -->


    <?php

    use GuzzleHttp\Middleware;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    ?>

    <!-- @if (Auth::user() && Auth::user()->role == 'admin')
        'THIS IS WHAT I WANT ONLY ADMIN USERS TO SEE!'
        @endif -->


    <div id="left">
        <ul id="list-nav" class="nav col-12 col-lg-auto my-2 justify-content-center my-md-10">
            <li>
                <?php
                if (Auth::check() && Auth::user()->role == '1') {
                ?>
                    <a href="{{ route('admin.HomePage') }}" class="highlight-button btn btn-large button xs-margin-bottom-five">Home</a>
                <?php
                } else {
                ?>
                    <a href="{{ route('HomePage') }}" class="highlight-button btn btn-large button xs-margin-bottom-five">Home</a>
                <?php
                }
                ?>
            </li>
            <li>
                <?php
                if (Auth::check() && Auth::user()->role == '1') {
                ?>
                    <a href="{{ route('admin.Products') }}" class="highlight-button btn btn-large button xs-margin-bottom-five">Products</a>

                <?php
                } else {
                ?>
                    <a href="{{ route('Products') }}" class="highlight-button btn btn-large button xs-margin-bottom-five">Products</a>

                <?php
                }
                ?>
            </li>
            <li>
                <?php
                if (Auth::check() && Auth::user()->role == '1') {
                ?>
                    <a href="{{ route('admin.Basket') }}" class="highlight-button btn btn-large button xs-margin-bottom-five">Basket</a>

                <?php
                } else {
                ?>
                    <a href="{{ route('Basket') }}" class="highlight-button btn btn-large button xs-margin-bottom-five">Basket</a>

                <?php
                }
                ?>
            </li>
            <li>
                <?php
                if (Auth::check() && Auth::user()->role == '1') {
                ?>
                    <a href="{{ route('admin.Basket') }}" class="highlight-button btn btn-large button xs-margin-bottom-five">Basket</a>

                <?php
                } else {
                ?>
                    <a href="{{ route('Purchases') }}" class="highlight-button btn btn-large button xs-margin-bottom-five">Purchases</a>

                <?php
                }
                ?>
            </li>
            <li>
                <?php
                if (Auth::check() && Auth::user()->role == '1') {
                ?>
                    <a href="{{ route('admin.Aboutus') }}" class="highlight-button btn btn-large button xs-margin-bottom-five">About Us</a>

                <?php
                } else {
                ?>
                    <a href="{{ route('Aboutus') }}" class="highlight-button btn btn-large button xs-margin-bottom-five">About Us</a>

                <?php
                }
                ?>
            </li>
            <li>
                <?php
                if (Auth::check() && Auth::user()->role == '1') {
                ?>
                    <a href="{{ route('admin.Contactus') }}" class="highlight-button btn btn-large button xs-margin-bottom-five">Contact Us</a>

                <?php
                } else {
                ?>
                    <a href="{{ route('Contactus') }}" class="highlight-button btn btn-large button xs-margin-bottom-five">Contact Us</a>

                <?php
                }
                ?>
            </li>
        </ul>
    </div>
    <div id="center">
        <!-- <img src="{{url('images/logo.png')}}" /> -->
    </div>

    <div id="right">
        <?php
        if (Auth::check() && Auth::user()->role == '1') {
        ?>
            <a class="highlight-button btn btn-large button xs-margin-bottom-five" href="{{ route('admin.adminhome') }}">Home</a>

        <?php
        } else {
        ?>
            <a class="highlight-button btn btn-large button xs-margin-bottom-five" href="{{ route('login') }}">Login</a>
            <a class="highlight-button btn btn-large button xs-margin-bottom-five" href="{{ route('register') }}">Sign-up</a>

        <?php
        }
        ?>
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))

        @endif

        @if (Route::has('register'))

        @endif
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest

    </div>
</div>


<!-- <form class="search" action="">
    <input class="input" type="search" placeholder="Search here..." required>
    <button class="button" type="submit">Search</button>
</form> -->