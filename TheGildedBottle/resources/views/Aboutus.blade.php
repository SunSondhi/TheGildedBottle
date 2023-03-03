@section('title','| About Us')
@include('layouts/head')
@include('layouts/nav')


@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Meet the team</h2>
    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <img src="{{url('images/darthvader.jpg')}}" class="card-img-top" alt="Team Member 1">
                <div class="card-body">
                    <h5 class="card-title">Sunny Sondhi</h5>
                    <p class="card-text">Group Leader (elected by other team members)</p>
                    <p>Roles:</p>
                    <li>Lead Programmer for back end and front end of the Website</li>
                    <li>Worked on the Java Application aswell</li>
                    <li>Co-ordinator</li>
                    <li>Helper</li>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="{{url('images/icon.png')}}" class="card-img-top" alt="Team Member 2">
                <div class="card-body">
                    <h5 class="card-title">Josh Needham</h5>
                    <p class="card-text">Co-leader</p>
                    <p>Roles:</p>
                    <li>Lead Programmer Java Application</li>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="{{url('images/icon.png')}}" class="card-img-top" alt="Team Member 3">
                <div class="card-body">
                    <h5 class="card-title">Khush Chouahan</h5>
                    <p class="card-text">Co-leader</p>
                    <p>Roles:</p>
                    <li>Helper Programmer Java Application</li>
                    <li>Helper Programmer Web Application</li>
                    <li>Resources Finder</li>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="{{url('images/icon.png')}}" class="card-img-top" alt="Team Member 3">
                <div class="card-body">
                    <h5 class="card-title">Joel</h5>
                    <p class="card-text">Co-leader</p>
                    <p>Roles:</p>
                    <li>Back end Developer</li>
                    <li>Helper Programmer Web Application</li>
                    <li>Resources Finder</li>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="{{url('images/icon.png')}}" class="card-img-top" alt="Team Member 3">
                <div class="card-body">
                    <h5 class="card-title">Kevin</h5>
                    <p class="card-text">Worker</p>
                    <p>Roles:</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="{{url('images/icon.png')}}" class="card-img-top" alt="Team Member 3">
                <div class="card-body">
                    <h5 class="card-title">Philip</h5>
                    <p class="card-text">Worker</p>
                    <p>Roles:</p>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1>About Us</h1>
            <p>We are a company that specializes in selling high-quality liquor products. Our mission is to provide the best customer experience by offering a wide range of products, competitive prices, and exceptional service. We pride ourselves on our knowledgeable staff who are always ready to help you find the perfect product for your needs.</p>
            <p>Our team is passionate about the liquor industry and is always up-to-date with the latest trends and innovations. We believe in constantly improving our offerings to ensure that our customers have access to the best products in the market. We source our products from reputable suppliers to ensure that they meet our high standards of quality.</p>
            <p>At our company, we value our customers and are committed to building long-lasting relationships. We believe that the key to success is providing exceptional customer service, and we strive to exceed your expectations every time you shop with us.</p>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-6">
            <h2>Our Story</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id ipsum nec magna lacinia commodo. Integer sed justo sem. Sed euismod feugiat enim, quis placerat nisi iaculis quis. Aliquam erat volutpat. Sed sed volutpat arcu. </p>
            <p>Suspendisse consectetur tellus eget bibendum suscipit. Nullam eget tellus eu neque ullamcorper facilisis ut vel sapien. Vestibulum finibus sem ac quam aliquet laoreet. </p>
        </div>
        <div class="col-md-6">
            <img src="{{url('images/spacebottle.png')}}" style="height:auto; width:500px;" class="img-fluid" alt="Our Story">
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-6">
            <img src="{{url('images/dancin.png')}}" class=" img-fluid" alt="Our Mission">
        </div>
        <div class="col-md-6">
            <h2>Our Mission</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id ipsum nec magna lacinia commodo. Integer sed justo sem. Sed euismod feugiat enim, quis placerat nisi iaculis quis. Aliquam erat volutpat. Sed sed volutpat arcu. </p>
            <p>Suspendisse consectetur tellus eget bibendum suscipit. Nullam eget tellus eu neque ullamcorper facilisis ut vel sapien. Vestibulum finibus sem ac quam aliquet laoreet. </p>
        </div>

    </div>



</div>


@endsection