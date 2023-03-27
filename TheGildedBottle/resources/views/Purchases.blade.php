@section('title','| Products')
@include('layouts/head')
@include('layouts/nav')

<div class="container py-5">
    <h1 class="mb-5">Purchase History</h1>

<<<<<<< Updated upstream
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @forelse ($purchases as $purchase)
        @if (($purchase->in_progress) == 0)
        <div class="col">
            <div class="card h-200">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ url($purchase->image) }}" alt="{{ $purchase->name }}" class="img-fluid me-2" style="height:250px;width:auto;">
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="product-details">
                            <h3 class="mb-0">{{ $purchase->name }}</h3>
                            <p class="price mb-1">£{{ $purchase->price }}</p>
                            <p class="quantity mb-0"><strong>Quantity: </strong>{{ $purchase->quantity }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @empty
        <div class="col">
            <div class="card h-100">
                <div class="card-body text-center">
                    <p class="lead mb-0">No purchases found.</p>
                </div>
            </div>
        </div>
        @endforelse
=======



    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Mode1')">In Process</button>
        <button class="tablinks" onclick="openTab(event, 'Mode2')">Cancelled</button>
        <button class="tablinks" onclick="openTab(event, 'Mode3')">Purchase Completed</button>
    </div>

    <!-- Tab content -->
    <div id="Mode1" class="tabcontent">
        <div style="height: 500px; overflow-y: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="color:gold;">Image</th>
                        <th scope="col"style="color:gold;">Name</th>
                        <th scope="col"style="color:gold;">Price</th>
                        <th scope="col"style="color:gold;">Quantity</th>
                        <th scope="col"style="color:gold;">Process</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $purchase)
                    @if (($purchase->in_progress) == 0)
                    <tr>
                        <td style="color:gold;"><img src="{{ url($purchase->image) }}" alt="{{ $purchase->name }}" style="width:auto; height:200px;"></td>
                        <td style="color:gold;">{{ $purchase->name }}</td>
                        <td style="color:gold;">£{{ $purchase->price }}</td>
                        <td style="color:gold;">{{ $purchase->quantity }}</td>
                        <td>@if (($purchase->in_progress) == 0)
                            <div class="alert alert-warning" role="alert">
                                <h3>Item is in process</h3>
                                <p>Please wait for an operator to complete the purchase.</p>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div id="Mode2" class="tabcontent">
        <div style="height: 500px; overflow-y: auto;">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col" style="color:gold;">Image</th>
                        <th scope="col"style="color:gold;">Name</th>
                        <th scope="col"style="color:gold;">Price</th>
                        <th scope="col"style="color:gold;">Quantity</th>
                        <th scope="col"style="color:gold;">Process</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $purchase)
                    @if (($purchase->in_progress) == 2)
                    <tr>
                        <td><img src="{{ url($purchase->image) }}" alt="{{ $purchase->name }}" style="width:auto; height:200px;"></td>
                        <td>{{ $purchase->name }}</td>
                        <td>£{{ $purchase->price }}</td>
                        <td>{{ $purchase->quantity }}</td>
                        <td>@if (($purchase->in_progress) == 2)
                            <div class="alert alert-danger" role="alert">
                                <h3>Item is Cancelled</h3>
                                <p>Item has been cancelled by an operator.<br>Please Contact the managament for further action.</p>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="Mode3" class="tabcontent">
    <div style="height: 500px; overflow-y: auto;">
        <table class="table">
            <thead>
                <tr>
                <th scope="col" style="color:gold;">Image</th>
                    <th scope="col"style="color:gold;">Name</th>
                    <th scope="col"style="color:gold;">Price</th>
                    <th scope="col"style="color:gold;">Quantity</th>
                    <th scope="col"style="color:gold;">Process</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                @if (($purchase->in_progress) == 1)
                <tr>
                    <td style="color:gold;"><img src="{{ url($purchase->image) }}" alt="{{ $purchase->name }}" style="width:auto; height:200px;"></td>
                    <td style="color:gold;">{{ $purchase->name }}</td>
                    <td style="color:gold;">£{{ $purchase->price }}</td>
                    <td style="color:gold;">{{ $purchase->quantity }}</td>
                        <div class="alert alert-success" role="alert">
                            <h3>Item is Processed and ready to be dispatched</h3>
                            <p>Item is ready to be dispatched</p>
                        </div>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

>>>>>>> Stashed changes
    </div>
</div>
</div>

@include('layouts/footer')