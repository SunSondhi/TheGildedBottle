@extends('layouts.app')

@section('title', '| Products')

@section('content')
@include('layouts.nav')

<div class="container-fluid product-page">
    <div class="row">
        <div class="col-md-4">
            <div class="sidebar">
                <div class="container">
                    <h5>Search by Product Category</h5>
                    <div class="row">
                        <form action="{{ route('products.filter.category', ['productCat' => 'Rum']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark">Rum</button>
                        </form>
                        <form action="{{ route('products.filter.category', ['productCat' => 'Whiskey']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark">Whiskey</button>
                        </form>
                        <form action="{{ route('products.filter.category', ['productCat' => 'Vodka']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark">Vodka</button>
                        </form>
                        <form action="{{ route('products.filter.category', ['productCat' => 'Gin']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark">Gin</button>
                        </form>
                        <form action="{{ route('products.filter.category', ['productCat' => 'Beer']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark">Beer</button>
                        </form>
                        <form action="{{ route('products.filter.category', ['productCat' => 'Wines']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark">Wines</button>
                        </form>
                        <form action="{{ route('products.filter.category', ['productCat' => 'Brandy']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark">Brandy</button>
                        </form>
                    </div>

                    <div class="filter-form mt-4">
                        <h5>Search by Price range</h5>
                        <form action="{{ route('products.filter.price') }}" method="get" class="form-inline">
                            <div class="form-group mr-3">
                                <label for="min_price" class="mr-2">Minimum price:</label>
                                <input type="number" class="form-control" name="min_price" id="min_price">
                            </div>
                            <div class="form-group mr-3">
                                <label for="max_price" class="mr-2">Maximum price:</label>
                                <input type="number" class="form-control" name="max_price" id="max_price">
                            </div>
                            <div class="form-group mr-3">
                                <button type="submit" class="btn btn-secondary">Go</button>
                            </div>
                        </form>
                    </div>

                    <form method="get">
                        <h5>Search By Name</h5>
                        <form method="get" action="{{route('products')}}">
                            <input type="text" class="form-control" name="search_entry" id="search_entry" placeholder="Search...">
                            <button type="submit" class="btn btn-success">search</button>
                        </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="row" style="margin-top:2%; margin-left:-20%; margin-right:2%;">
                @if (count($products) > 0)
                @foreach ($products as $product)
                <div class="col-md-4 mb-3">
                    <a href="{{url('Product_details')}}/{{($product->id)}}" style="text-decoration:none;color:black;">
                        <div class="card" style="border: 1px solid #ccc; border-radius: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);">
                            <img src="{{ url($product->image) }}" alt="{{ $product->name }}" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px 10px 0 0;">
                            <div class="card-body" style="padding: 1rem;">
                                <h4 class="card-title" style="font-size: 1.2rem; font-weight: bold; margin-bottom: 0;">{{ $product->name }}</h4>

                                <?php
                                if ($product->stock >= 5) { ?>
                                    <p class="card-text" style="font-size: 0.9rem; margin-bottom: 0;">Stock: {{ $product->stock }}</p>
                                <?php
                                } elseif ($product->stock < 5 && $product->stock > 0) { ?>
                                    <div class="alert alert-warning" role="alert" style="padding: 0.5rem 1rem; font-size: 0.9rem; margin-bottom: 0;">
                                        <p class="card-text" style="margin-bottom: 0;">Stock: {{ $product->stock }} </p>
                                    </div>
                                <?php
                                } else { ?>
                                    <div class="alert alert-danger" role="alert" style="padding: 0.5rem 1rem; font-size: 0.9rem; margin-bottom: 0;">
                                        <p class="card-text" style="margin-bottom: 0;">Out of stock</p>
                                    </div>
                                <?php } ?>
                                <p class="card-text" style="font-size: 1.5rem; margin-bottom: 0;">Price: £{{ $product->price }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                @else
                <div class="col-md-12">
                    <p>No products found</p>
                </div>
                @endif
            </div>
        </div>