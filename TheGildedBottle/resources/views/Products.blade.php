@section('title','| Products')
@include('layouts/head')
@include('layouts/nav')



   

    <?php

    use Illuminate\Support\Facades\Auth;
    
    if (Auth::check() && Auth::user()->role == '1') { 
        print '<p>you can see THIS because you are an admin</p>'; // this is when user is an admin
    } elseif (Auth::check() && Auth::user()->role == '2') {
        print '<p>you are seeing this beacause you are an employee</p>'; //this is beacuse this is an employee user
    }else{
        print '<p>you cannot see this beacause you are not Admin or AND employee but a customer</p>'; //this is a normal user 
    }
    ?>