@section('title', '| Products')
@include('layouts/head')
@include('layouts/nav')

<div class="container my-5">
    <h1 class="text-center mb-5">{{ $product->name }}</h1>
    <div class="row">
        <div class="col-md-6">
            <div id="product-image-container" class="product-image-container">
                <img src="{{ url($product->image) }}" alt="{{ $product->name }}" class="w-100">
            </div>
        </div>
        <div class="col-md-6">
            <p>{{ $product->description }}</p>
            <p class="h2">£{{ $product->price }}</p>
            @if ($product->stock >= 5)
                <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
            @elseif ($product->stock > 0)
                <div class="alert alert-warning" role="alert">
                    <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
                </div>
            @else
                <div class="alert alert-danger" role="alert">
                    <p class="card-text"><strong>Stock:</strong> {{ $product->stock }} Out of stock</p>
                </div>
            @endif
            <form action="{{$product->id}}" method="POST" class="my-5">
                @csrf
                <input type="hidden" name="name" value="{{$product->name}}">
                <input type="hidden" name="price" value="{{$product->price}}">
                <input type="hidden" name="image" value="{{$product->image}}">
                @if($product->stock >= 5)
                    <div class="form-group">
                        <label for="quantity" class="h4">Please Select Amount:</label>
                        <select class="form-control input_num" name="quantity" id="quantity">
                            @for($i = 1; $i <= 10; $i++)
                                <option {{ $i == 1 ? 'selected' : '' }}>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                            @endfor
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

<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('products.reviews.store', $product->id) }}" id="review-form">
                @csrf
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" name="comment" id="comment" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <div class="rating">
                    <span class="star" data-rating="1"><i class="fa fa-star-o"></i></span>
                    <span class="star" data-rating="2"><i class="fa fa-star-o"></i></span>
                    <span class="star" data-rating="3"><i class="fa fa-star-o"></i></span>
                    <span class="star" data-rating="4"><i class="fa fa-star-o"></i></span>
                    <span class="star" data-rating="5"><i class="fa fa-star-o"></i></span>
                        <input type="hidden" name="rating" id="rating">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

    </div>
</div>


<script>
    $(document).ready(function() {
        // Highlight stars on hover
        $('.rating .star').hover(function() {
            $(this).prevAll().addBack().addClass('star-hover');
        }, function() {
            $(this).prevAll().addBack().removeClass('star-hover');
        });

        // Set rating value on click
        $('.rating .star').click(function() {
            $(this).siblings().addBack().removeClass('star-hover');
            $(this).prevAll().addBack().addClass('star-selected');
            $(this).nextAll().removeClass('star-selected');
            $('#rating').val($(this).data('rating'));
        });

        // Submit form on button click
        $('#review-form button[type="submit"]').click(function() {
            $('#review-form').submit();
        });
    });
</script>

<script>
    const imageContainer = document.querySelector('.product-image-container');
    const image = imageContainer.querySelector('img');

    imageContainer.addEventListener('mousemove', (event) => {
        let magnifier = imageContainer.querySelector('.magnifier');
        if (!magnifier) {
            magnifier = document.createElement('div');
            magnifier.classList.add('magnifier');
            imageContainer.appendChild(magnifier);
        }

        const containerRect = imageContainer.getBoundingClientRect();
        const mouseX = event.clientX - containerRect.left;
        const mouseY = event.clientY - containerRect.top;
        const magnifierSize = magnifier.offsetWidth;
        const backgroundSize = magnifierSize * 3; // assuming 4x zoom
        const backgroundX = (mouseX / containerRect.width) * (backgroundSize - magnifierSize);
        const backgroundY = (mouseY / containerRect.height) * (backgroundSize - magnifierSize);
        magnifier.style.backgroundImage = `url(${image.src})`;
        magnifier.style.backgroundSize = `${backgroundSize}px`;
        magnifier.style.backgroundPosition = `-${backgroundX}px -${backgroundY}px`;
        magnifier.style.left = `${mouseX - magnifierSize / 2}px`;
        magnifier.style.top = `${mouseY - magnifierSize / 2}px`;
    });

    imageContainer.addEventListener('mouseleave', () => {
        const magnifier = imageContainer.querySelector('.magnifier');
        if (magnifier) {
            magnifier.remove();
        }
    });
</script>



@include('layouts/footer')