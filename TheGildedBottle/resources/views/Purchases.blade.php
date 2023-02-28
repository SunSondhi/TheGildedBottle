@section('title','| Products')
@include('layouts/head')
@include('layouts/nav')





<div class="main-content">
    <h1>List of your purchase history</h1>





    <div class="row">
        <div style="margin:auto;">

        </div>
        <div class="flex-container">
            @if (count($products) > 0)
            @csrf
            @foreach ($products as $us)
            <div class="card2">
                <div>
                    <img src="{{ $us->image }}" alt="">
                </div>
                <div>
                    <h4>{{ $us->name }}</h4> </a>
                    <p><strong>Price: </strong> £{{ $us->price }}</p>
                    <p><strong>Quantity: </strong> {{ $us->quantity }}</p>
                </div>
            </div>
            @endforeach
            @else
            <p>No products found.</p>
            @endif
        </div>
    </div>
</div>