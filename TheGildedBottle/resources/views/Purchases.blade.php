@section('title','| Products')
@include('layouts/head')
@include('layouts/nav')

<div class="container py-5">
    <h1 class="mb-5">Purchase History</h1>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @forelse ($purchases as $purchase)
        <div class="col">
            <div class="card h-200">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ url($product->image) }}" alt="{{ $purchase->name }}" class="img-fluid me-2">
                        <div class="product-details">
                            <h3 class="mb-0">{{ $purchase->name }}</h3>
                            <p class="price mb-1">£{{ $purchase->price }}</p>
                            <p class="quantity mb-0"><strong>Quantity: </strong>{{ $purchase->quantity }}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col">
            <div class="card h-100">
                <div class="card-body text-center">
                    <p class="lead mb-0">No purchases found.</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>