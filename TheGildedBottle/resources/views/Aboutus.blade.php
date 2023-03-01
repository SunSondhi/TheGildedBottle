@section('title','| About Us')
@include('layouts/head')
@include('layouts/nav')


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1>About Us</h1>
            <p>We are a company that specializes in selling high-quality liquor products. Our mission is to provide the best customer experience by offering a wide range of products, competitive prices, and exceptional service. We pride ourselves on our knowledgeable staff who are always ready to help you find the perfect product for your needs.</p>
            <p>Our team is passionate about the liquor industry and is always up-to-date with the latest trends and innovations. We believe in constantly improving our offerings to ensure that our customers have access to the best products in the market. We source our products from reputable suppliers to ensure that they meet our high standards of quality.</p>
            <p>At our company, we value our customers and are committed to building long-lasting relationships. We believe that the key to success is providing exceptional customer service, and we strive to exceed your expectations every time you shop with us.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Our Story</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id ipsum nec magna lacinia commodo. Integer sed justo sem. Sed euismod feugiat enim, quis placerat nisi iaculis quis. Aliquam erat volutpat. Sed sed volutpat arcu. </p>
            <p>Suspendisse consectetur tellus eget bibendum suscipit. Nullam eget tellus eu neque ullamcorper facilisis ut vel sapien. Vestibulum finibus sem ac quam aliquet laoreet. </p>
        </div>
        <div class="col-md-6">
            <img src="https://via.placeholder.com/500x300" class="img-fluid" alt="Our Story">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <img src="https://via.placeholder.com/500x300" class="img-fluid" alt="Our Team">
        </div>
        <div class="col-md-6">
            <h2>Our Team</h2>
            <p>Team group Members 28</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h2>Our Mission</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id ipsum nec magna lacinia commodo. Integer sed justo sem. Sed euismod feugiat enim, quis placerat nisi iaculis quis. Aliquam erat volutpat. Sed sed volutpat arcu. </p>
            <p>Suspendisse consectetur tellus eget bibendum suscipit. Nullam eget tellus eu neque ullamcorper facilisis ut vel sapien. Vestibulum finibus sem ac quam aliquet laoreet. </p>
        </div>
        <div class="col-md-6">
            <img src="https://via.placeholder.com/500x300" class="img-fluid" alt="Our Mission">
        </div>
    </div>
    <h2 class="mb-4">Our Team</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/img/team-member-1.jpg" class="card-img-top" alt="Team Member 1">
                <div class="card-body">
                    <h5 class="card-title">John Doe</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/img/team-member-2.jpg" class="card-img-top" alt="Team Member 2">
                <div class="card-body">
                    <h5 class="card-title">Jane Smith</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/img/team-member-3.jpg" class="card-img-top" alt="Team Member 3">
                <div class="card-body">
                    <h5 class="card-title">Mike Johnson</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection