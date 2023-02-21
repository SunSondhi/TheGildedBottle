@section('title','| Products')
@include('layouts/head')
@include('layouts/nav')




<?php

use Illuminate\Support\Facades\Auth;


?>


<div class="main-content">
    <h1>List of all products</h1>

    <div class="container">
        <div class="flex-container">
            <form action="{{$product->id}}" method="POST">@csrf
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <input type="hidden" name="image" value="{{$product->image}}">
                    <h3>Please Select Amount:</h3>
                    <select class="input_num" name ="quantity">
                        <option selected>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                    </select>
                    <input type="submit">
                </form>

                    
                </div>
            </div>
            
        </div>
    </div>

                    


</div>