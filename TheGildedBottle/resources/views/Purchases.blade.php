@section('title','| Products')
@include('layouts/head')
@include('layouts/nav')





<?php

use Illuminate\Support\Facades\Auth;

if (Auth::check() && Auth::user()->role == '1') {
    print '<p>you can see THIS because you are an admin</p>'; // this is when user is an admin
} elseif (Auth::check() && Auth::user()->role == '2') {
    print '<p>you are seeing this beacause you are an employee</p>'; //this is beacuse this is an employee user
} else {
    print '<p>you cannot see this beacause you are not Admin or AND employee but a customer</p>'; //this is a normal user 
}
?>


<div class="main-content">
    <h1>List of your purchase history</h1>





    <div class="row">
        <div style="margin:auto;">
            <h3>Purchases history</h3>
        </div>
        <div class="flex-container">
            @foreach ($products as $us)
            <div class="card2">
                <div>
                <img src="{{ $us->image }}" alt="">
                </div>
                <div>
                 <h4>{{ $us->name }}</h4> </a>
        
                    <p><strong>Price: </strong> £{{ $us->price }}</p>
                    <?php
                    if ((Auth::check() && Auth::user()->role == '1') || (Auth::check() && Auth::user()->role == '2')) {
                    ?>
                        <p><strong>Quantity: </strong> {{ $us->quantity }}</p><?php

                                                                            } ?>
                                                                            @endforeach
                            
                </div>
            <div class="filter-btn">
             
            </div>
        </div>
    </div>






