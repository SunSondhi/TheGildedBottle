@section('title','| About Us')
@include('layouts/head')
@include('layouts/nav')

<body>

    <h1>Add products</h1>

    <div class="sections" id="add-section">
        <form action="{{route('admin.addnewproduct')}}" method="POST">
            @csrf
            <label>Name:</label><br>
            <input class="input-effect" type="text" name="name"> <br> <br>

            <label>price:</label><br>
            <input class="input-effect" type="number" name="price"> <br> <br>

            <label>Product category</label>
            <input class="input-effect" type="text" name="productCat">

            <label>image:</label> <br>
            <input class="input-effect" type="file" name="image"> <br> <br>

            <label>quantity:</label> <br>
            <input class="input-effect" type="number" name="quantity"> <br> <br>
            <label>type:</label> <br>
            <input class="input-effect" type="text" name="type"> <br> <br>

            <label>description</label> <br>
            <textarea class="input-effect" type="text" name="description"> </textarea> <br> <br>

            <label>flavour:</label> <br>
            <input class="input-effect" type="text" name="flavour"> <br> <br>
            <label>percentage:</label> <br>
            <input class="input-effect" type="number" name="percentage"> <br> <br>
            <button type="submit">Add</button>
        </form>
    </div>

</body>