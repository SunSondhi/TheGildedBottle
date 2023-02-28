@include('layouts/nav')
@section('title','| Basket')
@include('layouts/head')


<body>

    <div class="main-content">
        <h1>Basket</h1>
        <div class="container">
            <div class="flex-container">
                @if (count($bs_products) > 0)
                @csrf
                @foreach ($bs_products as $us)
                <div class="card2">
                    <div>
                        <i class="uil uil-times-circle"><button id="remove_btn"></i></a></td>
                        <a href="Product_details/{{$us->id}}"> <img src="{{ $us->image }}" alt=""></a>
                    </div>
                    <div>
                        <h4>{{ $us->name }}</h4>
                        <p><strong>Price: </strong> £{{ $us->price }}</p>
                        <p><strong>Quantity:</strong>{{ $us->quantity }}</p>                                                 
                    </div>
                </div>
                @endforeach
                <form action="" method="POST">
                    @csrf
                    <input id="buy_all" type="submit" value="Purchase item" />
                </form>
                @else
                <p>There are currently no products in your basket</p>
                <a href="{{route('Products')}}">Discover more here</a>
                @endif
            </div>
        </div>
    </div>
</body>