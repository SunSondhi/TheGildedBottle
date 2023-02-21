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
    <h1>List of all products</h1>





    <div class="row">
        <div style="margin:auto;">
            <h3>Product Category</h3>
        </div>
        <div class="flex-container">
            @foreach ($products as $us)
            <div class="card2">
                <div>
                <a href="Product_details/{{$us->id}}"> <img src="{{ $us->image }}" alt=""></a>
                </div>
                <div>
                    <h4>{{ $us->name }}</h4>
                    <p>{{ $us->description }}</p>
                    <p><strong>Price: </strong> £{{ $us->price }}</p>
                    <?php
                    if ((Auth::check() && Auth::user()->role == '1') || (Auth::check() && Auth::user()->role == '2')) {
                    ?>
                        <p><strong>Quantity: </strong> {{ $us->quantity }}</p><?php

                                                                            } ?>
                </div>
            <div class="filter-btn">
                <form action="{{ route('products.filter.category', ['productCat' => 'Rum']) }}" method="get">
                    <button type="submit" class="btn btn-primary">Rum</button>
                </form>
                <form action=" {{ route('products.filter.category', ['productCat' => 'Whiskey']) }}" method="get">
                    <button type="submit" class="btn btn-primary">Whiskey</button>
                </form>
                <form action="{{ route('products.filter.category', ['productCat' => 'Vodka']) }}" method="get">
                    <button type="submit" class="btn btn-primary">Vodka</button>
                </form>
                <form action="{{ route('products.filter.category', ['productCat' => 'Gin']) }}" method="get">
                    <button type="submit" class="btn btn-primary">Gin</button>
                </form>
                <form action="{{ route('products.filter.price', ['price' => '$priceMin - $priceMax']) }}" method="get">
                    <button type="submit" class="btn btn-primary">$50 - $100</button>
                </form>
            </div>
        </div>
    </div>






    <div class="row">
        <div class="col">
            <div class="flex-container">
                @foreach ($products as $us)
                <div class="card">
                    <h4>{{ $us->name }}</h4>
                    <img id="product-card-image" src="{{ $us->image }}">
                    <p><strong>Price: </strong> £{{ $us->price }}</p>
                    <?php
                    if ((Auth::check() && Auth::user()->role == '1') || (Auth::check() && Auth::user()->role == '2')) {
                    ?>
                        <p><strong>Stock: </strong> {{ $us->quantity }}</p>
                    <?php
                    }
                    ?>
                    <button>Buy</button>
                    <button>Add basket</button>
                </div>

                @endforeach
            </div>
        </div>
    </div>











</div>