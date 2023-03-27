@section('title', '| Products')
@include('layouts/head')
@include('layouts/nav')

<<<<<<< Updated upstream
<div class="main-content">

    <h1>List of all products</h1>

    <h3 class="mb-4">Product Category</h3>
    <div class="d-flex flex-wrap">
        <form action="{{ route('products.filter.category', ['productCat' => 'Rum']) }}" method="get" class="mr-3 mb-3">
            <button type="submit" class="btn btn-primary">Rum</button>
        </form>
        <form action="{{ route('products.filter.category', ['productCat' => 'Whiskey']) }}" method="get" class="mr-3 mb-3">
            <button type="submit" class="btn btn-primary">Whiskey</button>
        </form>
        <form action="{{ route('products.filter.category', ['productCat' => 'Vodka']) }}" method="get" class="mr-3 mb-3">
            <button type="submit" class="btn btn-primary">Vodka</button>
        </form>
        <form action="{{ route('products.filter.category', ['productCat' => 'Gin']) }}" method="get" class="mr-3 mb-3">
            <button type="submit" class="btn btn-primary">Gin</button>
        </form>
        <form action="{{ route('products.filter.category', ['productCat' => 'Beer']) }}" method="get" class="mr-3 mb-3">
            <button type="submit" class="btn btn-primary">Beer</button>
        </form>
        <form action="{{ route('products.filter.category', ['productCat' => 'Wines']) }}" method="get" class="mr-3 mb-3">
            <button type="submit" class="btn btn-primary">Wines</button>
        </form>
        <form action="{{ route('products.filter.category', ['productCat' => 'Brandy']) }}" method="get" class="mr-3 mb-3">
            <button type="submit" class="btn btn-primary">Brandy</button>
        </form>
    </div>
    <div class="filter-form mt-4">
        <form action="{{ route('products.filter.price') }}" method="get" class="form-inline">
            <div class="form-group mr-3">
                <label for="min_price" class="mr-2">Minimum price:</label>
                <input type="number" class="form-control" name="min_price" id="min_price">
            </div>
            <div class="form-group mr-3">
                <label for="max_price" class="mr-2">Maximum price:</label>
                <input type="number" class="form-control" name="max_price" id="max_price">
=======
<style>
    input[id="search_entry"]::placeholder {
  color: black;
}
</style>
<div class="container" style="background-color:#F5F5F5;">
    <div class="row">
        <div class="col-md-4">
            <div class="sidebar">
                <div class="container">
                    <h5>Search by Product Category</h5>
                    <div class="row">
                        <form action="{{ route('products.filter.category', ['productCat' => 'Rum']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark" style="color:gold; background-color:grey">Rum</button>
                        </form>
                        <form action="{{ route('products.filter.category', ['productCat' => 'Whiskey']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark" style="color:gold; background-color:grey">Whiskey</button>
                        </form>
                        <form action="{{ route('products.filter.category', ['productCat' => 'Vodka']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark" style="color:gold; background-color:grey">Vodka</button>
                        </form>
                        <form action="{{ route('products.filter.category', ['productCat' => 'Gin']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark" style="color:gold; background-color:grey">Gin</button>
                        </form>
                        <form action="{{ route('products.filter.category', ['productCat' => 'Beer']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark" style="color:gold; background-color:grey">Beer</button>
                        </form>
                        <form action="{{ route('products.filter.category', ['productCat' => 'Wines']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark" style="color:gold; background-color:grey">Wines</button>
                        </form>
                        <form action="{{ route('products.filter.category', ['productCat' => 'Brandy']) }}" method="get">
                            <button type="submit" class="btn btn-outline-dark" style="color:gold; background-color:grey" >Brandy</button>
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
                                <button type="submit" class="btn btn-secondary" style="color:gold; background-color:grey; border: black;">Go</button>
                            </div>
                        </form>
                    </div>

                    <form method="get">
                        <h5>Search By Name</h5>
                    <form method="get" action="{{route('products')}}">
                        <input type="text" class="form-control" name="search_entry" id="search_entry" placeholder="Search..." style="color:white">
                        <button type="submit" class="btn btn-success"style="color:gold; background-color:grey; border: black;">search</button>
                    </form>
                </div>
            </div>


        </div>
        <div class="col">
            <div class="row">
                @if (count($products) > 0)
                @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card-deck">
                        <a href="{{url('Product_details')}}/{{($product->id)}}">
                            <img src="{{ url($product->image) }}" alt="{{ $product->name }}" class="card-img-top" style="width: auto;height:300px;"></a>
                        <div class="card-body">
                            <h4 class="card-title" style="color:black;">{{ $product->name }}</h4>
                            <p class="card-text" style="color:black;"><strong>Price: </strong> £{{ $product->price }}</p>
                            <?php
                            if ($product->stock >= 5) { ?>
                                <p class="card-text" style="color:black;"><strong>Stock: </strong> {{ $product->stock }}</p>
                            <?php
                            } elseif ($product->stock < 5 && $product->stock > 0) { ?>
                                <div class="alert alert-warning" role="alert">
                                    <p class="card-text" style="color:black;">style="color:black;"<strong>Stock: </strong> {{ $product->stock }} </p>
                                </div>
                            <?php
                            } else { ?>
                                <div class="alert alert-danger" role="alert">
                                    <p class="card-text"style="color:black;" ><strong>Stock: </strong> {{ $product->stock }} Out of stock</p>
                                </div>
                            <?php
                            }
                            ?>

                            <form action="{{ route('add_to_basket', ['id' => $product->id]) }}" method="POST">
                                <input type="hidden" name="name" value="{{$product->name}}">
                                <input type="hidden" name="price" value="{{$product->price}}">
                                <input type="hidden" name="image" value="{{$product->image}}">
                                <input type="hidden" name="quantity" value=1>
                                @if($product->stock >= 5)
                                <button type="submit" class="btn btn-primary btn-sm mt-2"style="color: black; background-color: gold; border: 2px solid black;">Add to Basket</button>
                                @else
                                <button type="submit" class="disabled btn btn-primary btn-sm mt-2"style="color: black; background-color: gold; border: 2px solid black;">Add to Basket</button>
                                @endif
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="alert alert-warning" role="alert" style="width: 500px;">
                    <h4>No products found.</h4>
                </div>

                @endif
>>>>>>> Stashed changes
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>


</div>
<form method="get">
    <input type="text" class="form-control" name="search_entry" id="search_entry" placeholder="Search...">
    <button>search</button>
</form>
<div class="container">
    <div class="row">
        @if (count($products) > 0)
        @foreach ($products as $product)
        <div class="col-md-4">
            <div class="card-deck">
                <a href="{{url('Product_details')}}/{{($product->id)}}">
                    <img src="{{ url($product->image) }}" alt="{{ $product->name }}" class="card-img-top" style="width: auto;height:300px;"></a>
                <div class="card-body">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <p class="card-text"><strong>Price: </strong> £{{ $product->price }}</p>
                    <?php
                    if ($product->stock >= 5) { ?>
                        <p class="card-text"><strong>Stock: </strong> {{ $product->stock }}</p>
                    <?php
                    } elseif ($product->stock < 5 && $product->stock > 0) { ?>
                        <div class="alert alert-warning" role="alert">
                            <p class="card-text"><strong>Stock: </strong> {{ $product->stock }} </p>
                        </div>
                    <?php
                    } else { ?>
                        <div class="alert alert-danger" role="alert">
                            <p class="card-text"><strong>Stock: </strong> {{ $product->stock }} Out of stock</p>
                        </div>
                    <?php
                    }
                    ?>

                    <form action="{{ route('add_to_basket', ['id' => $product->id]) }}" method="POST">
                        <input type="hidden" name="name" value="{{$product->name}}">
                        <input type="hidden" name="price" value="{{$product->price}}">
                        <input type="hidden" name="image" value="{{$product->image}}">
                        <input type="hidden" name="quantity" value=1>
                        @if($product->stock >= 5)
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Add to Basket</button>
                        @else
                        <button type="submit" class="disabled btn btn-primary btn-sm mt-2">Add to Basket</button>
                        @endif
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <p>No products found.</p>
        @endif
    </div>
</div>


@include('layouts/footer')