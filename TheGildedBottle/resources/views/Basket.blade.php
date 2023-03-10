@include('layouts/nav')
@section('title','| Basket')
@include('layouts/head')

<div class="container py-5">
    <h1 class="mb-5">Basket</h1>
    @if(count($bs_products) > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bs_products as $us)
                    <tr>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#removeModal{{ $us->id }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ url($us->image) }}" alt="{{ $us->name }}" class="me-3" width="80">
                                <div>
                                    <h5 class="fw-bold mb-0">{{ $us->name }}</h5>
                                </div>
                            </div>
                        </td>
                        <td>£{{ $us->price }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn btn-sm btn-secondary border" onclick="updateQuantity('<?php echo $us->id; ?>', -1);">-</button>
                                <span class="mx-2">{{ $us->quantity }}</span>
                                <button type="button" class="btn btn-sm btn-secondary border" onclick="updateQuantity('<?php echo $us->id; ?>', 1)">+</button>
                            </div>
                        </td>
                        <td>£{{ $us->price * $us->quantity }}</td>
                    </tr>
                    <!-- Remove Modal -->
                    <div class="modal fade" id="removeModal{{ $us->id }}" tabindex="-1" aria-labelledby="removeModalLabel{{ $us->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="removeModalLabel{{ $us->id }}">Remove Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to remove {{ $us->name }} from your basket?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('remove_btn', ['id' => $us->id]) }}" method="POST">@csrf
                                        <button type="submit" class="btn btn-primary">remove</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
        <form action="{{ url('basket') }}" method="POST">
        @csrf
            <button type="submit" class="btn btn-primary">Purchase</button>
        </div>
    </form>
    @else
    <div class="alert alert-info" role="alert">
        There are currently no products in your basket. <a href="{{ route('Products') }}">Discover more here</a>.
    </div>
    @endif
</div>

<script>
    function updateQuantity(productId, change) {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                window.location.reload();
            }
        };
        xhr.open('POST', '{{ route('updateAmount', ['id' =>' +productId +']) }}' + change, true);
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.send();
    }
</script>

@include('layouts/footer')