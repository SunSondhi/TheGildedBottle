@section('title', '| Products')
@include('layouts/head')
@include('layouts/nav')


<div class="container" style="background-color:#F5F5F5;">
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
                        <input type="text" class="form-control" name="search_entry" id="search_entry" placeholder="Search...">
                        <button type="submit" class="btn btn-success">search</button>
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
                <div class="alert alert-warning" role="alert" style="width: 500px;">
                    <h4>No products found.</h4>
                </div>

                @endif
            </div>
        </div>
    </div>




</div>

@include('layouts/footer')