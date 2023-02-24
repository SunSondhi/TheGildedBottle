@section('title', '| Products')
@include('layouts/head')
@include('layouts/nav')

<div class="main-content">
    <?php

    use Illuminate\Support\Facades\Auth;

    if (Auth::check() && Auth::user()->role == '1') {
        echo '<p>You can see THIS because you are an admin</p>';
    } elseif (Auth::check() && Auth::user()->role == '2') {
        echo '<p>You are seeing this because you are an employee</p>';
    } else {
        echo '<p>You cannot see this because you are not an admin or an employee, but a customer</p>';
    }
    ?>

    <h1>List of all products</h1>

    <h3>Product Category</h3>
    <div class="filter-btn">
        <form action="{{ route('products.filter.category', ['productCat' => 'Rum']) }}" method="get">
            <button type="submit" class="btn btn-primary">Rum</button>
        </form>
        <form action="{{ route('products.filter.category', ['productCat' => 'Whiskey']) }}" method="get">
            <button type="submit" class="btn btn-primary">Whiskey</button>
        </form>
        <form action="{{ route('products.filter.category', ['productCat' => 'Vodka']) }}" method="get">
            <button type="submit" class="btn btn-primary">Vodka</button>
        </form>
        <form action="{{ route('products.filter.category', ['productCat' => 'Gin']) }}" method="get">
            <button type="submit" class="btn btn-primary">Gin</button>
        </form>
        <form action="{{ route('products.filter.price') }}" method="get">
            <label for="min_price">Minimum price:</label>
            <input type=" number" name="min_price" id="min_price">
            <label for="max_price">Maximum price:</label>
            <input type="number" name="max_price" id="max_price">
            <button type="submit">Filter</button>
        </form>
    </div>


    <div class="row">
        <div class="col">
            <div class="flex-container">
                @if (count($products) > 0)
                @foreach ($products as $product)
                <div class="card">
                    <div class="card-image">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}">
                    </div>
                    <div class="card-info">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p class="card-description">{{ $product->description }}</p>
                        <p class="card-price"><strong>Price: </strong> £{{ $product->price }}</p>
                        @if (Auth::check() && in_array(Auth::user()->role, ['1', '2']))
                        <p class="card-quantity"><strong>Quantity: </strong> {{ $product->quantity }}</p>
                        @endif
                        <button class="card-button">Add to cart</button>
                    </div>
                </div>
                @endforeach
                @else
                <p>No products found.</p>
                @endif
            </div>
        </div>
    </div>

</div>
