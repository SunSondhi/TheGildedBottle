@extends('layouts.app')
@include('layouts/head')
@include('layouts/nav')
@include('layouts/adminsidenav')
@section('title','| Add Products')
@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card border-0 shadow">
                <div class="card-header bg-gradient-danger">
                    <h3 class="card-title text-white">Add Product</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.addnewproduct') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="productCat">Product Category</label>
                            <input id="productCat" type="text" class="form-control @error('productCat') is-invalid @enderror" name="productCat" value="{{ old('productCat') }}" required>
                            @error('productCat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Product Image</label>
                            <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" required>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required>
                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control @error('type') is-invalid @enderror" name="description" value="{{ old('description') }}" required></textarea>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="flavour" class="text-black">Flavour</label>
                            <input type="text" class="form-control" id="flavour" name="flavour" required>
                        </div>

                        <div class="form-group">
                            <label for="percentage" class="text-black">Percentage</label>
                            <input type="number" class="form-control" id="percentage" name="percentage" required>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-lg btn-warning">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>