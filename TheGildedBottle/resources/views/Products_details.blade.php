@section('title','| Products')
@include('layouts/head')
@include('layouts/nav')

<div class="container my-5">
    <h1 class="text-center mb-5">{{ $product->name }}</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ url($product->image) }}" alt="{{ $product->name }}" class="w-100">
        </div>
        <div class="col-md-6">
            <p>{{ $product->description }}</p>
            <p class="h2">£{{ $product->price }}</p>
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
            <form action="{{$product->id}}" method="POST" class="my-5">
                @csrf
                <input type="hidden" name="name" value="{{$product->name}}">
                <input type="hidden" name="price" value="{{$product->price}}">
                <input type="hidden" name="image" value="{{$product->image}}">

                @if($product->stock >= 5)
                <div class="form-group">
                    <label for="quantity" class="h4">Please Select Amount:</label>
                    <select class="form-control input_num" name="quantity" id="quantity">
                        <option selected>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-2">Add to Basket</button>
                @else
                <button type="submit" class="disabled btn btn-primary btn-sm mt-2">Add to Basket</button>
                @endif
            </form>
        </div>
    </div>
</div>
