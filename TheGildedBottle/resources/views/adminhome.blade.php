@extends('layouts.app')
@include('layouts/head')
@include('layouts/nav')

@section('content')




<div>
    <h1>Welcome Admin {{ Auth::user()->name }}</h1>
</div>


<div class="main-content">
    <div class="sections" id="main-contentsectionhome">
        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </svg>
        <h1>Your Info</h1>
        <label>Name:</label><br>
        <br><input class="input-effect" type="text" id="id" name="name" value="{{ Auth::user()->name }}" readonly></input><br>
        <br><label>Email:</label><br>
        <br><input class="input-effect" type="text" id="id" name="name" value="{{ Auth::user()->email }}" readonly></input><br>
    </div>

    <div class="sections">
        <div>
            <h1>List of all users</h1>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $us)
                    <tr>
                        <td> {{$us->name}} </td>
                        <td> {{$us->email }} </td>
                        <td> {{$us->role }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <div class="sections" id="main-contentsectionhome">
        <h3>Add new Product</h3>
    </div>

    <div class="sections" id="main-contentsectionhome">
        <h3>Change Authorizations Roles</h3>
    </div>
    <div class="sections" id="main-contentsectionhome">
        <h3>Modify Stock</h3>
    </div>
</div>



@endsection