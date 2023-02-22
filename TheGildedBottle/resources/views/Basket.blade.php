@section('title','| Basket')
@include('layouts/head')
@include('layouts/nav')

<body>

    <h1>basket</h1>

    <div class="main-content">
        <h1>List of all products</h1>

        <div class="container">
            <div class="flex-container">
                @foreach ($bs_products as $us)
                <div class="card2">
                    <div>
                        <i class="uil uil-times-circle"><button id="remove_btn"></i></a></td>
                        <a href="Product_details/{{$us->id}}"> <img src="{{ $us->image }}" alt=""></a>
                    </div>
                    <div>
                        <h4>{{ $us->name }}</h4>
                        <p><strong>Price: </strong> £{{ $us->price }}</p>
                        <?php
                        if ((Auth::check() && Auth::user()->role == '1') || (Auth::check() && Auth::user()->role == '2')) {
                        ?>
                            <p><strong>Quantity: </strong> {{ $us->quantity }}</p><?php

                                                                                } ?>
                    </div>
                </div>
                @endforeach
                <form action="" method="POST">@csrf
                    <input id="buy_all" type="submit" value="Click" />
            </div>


</body>