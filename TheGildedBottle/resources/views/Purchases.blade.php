@section('title', '| Purchase History')
@include('layouts/head')
@include('layouts/nav')

<div class="container py-5">
    <h1 class="text-center mb-5" style="font-family: Georgia, 'Times New Roman', Times, serif;">Your Purchase History</h1>


<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'Mode1')">In Process</button>
    <button class="tablinks" onclick="openTab(event, 'Mode2')">Cancelled</button>
    <button class="tablinks" onclick="openTab(event, 'Mode3')">Completed</button>
</div>

<!-- Tab content -->
<div id="Mode1" class="tabcontent">
    <div class="table-responsive" style="height: 500px;">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Price</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-center">Process</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                    @if ($purchase->in_progress == 0)
                        <tr>
                            <td class="align-middle text-center"><img src="{{ url($purchase->image) }}" alt="{{ $purchase->name }}" style="max-width: 150px; max-height: 150px;"></td>
                            <td class="align-middle">{{ $purchase->name }}</td>
                            <td class="align-middle text-center">£{{ $purchase->price }}</td>
                            <td class="align-middle text-center">{{ $purchase->quantity }}</td>
                            <td class="align-middle text-center">
                                <div class="alert alert-warning" role="alert">
                                    <h3>Item is in process</h3>
                                    <p>Please wait for an operator to complete the purchase.</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="Mode2" class="tabcontent">
    <div class="table-responsive" style="height: 500px;">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Price</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-center">Process</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                    @if ($purchase->in_progress == 2)
                        <tr>
                            <td class="align-middle text-center"><img src="{{ url($purchase->image) }}" alt="{{ $purchase->name }}" style="max-width: 150px; max-height: 150px;"></td>
                            <td class="align-middle">{{ $purchase->name }}</td>
                            <td class="align-middle text-center">£{{ $purchase->price }}</td>
                            <td class="align-middle text-center">{{ $purchase->quantity }}</td>
                            <td class
                            @if (($purchase->in_progress) == 2)
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
    <div class="table-responsive" style="height: 500px;">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Process</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $purchase)
                    @if (($purchase->in_progress) == 1)
                    <tr>
                        <td><img src="{{ url($purchase->image) }}" alt="{{ $purchase->name }}" style="width:auto; height:200px;"></td>
                        <td class="align-middle text-center"><img src="{{ url($purchase->image) }}" alt="{{ $purchase->name }}" style="max-width: 150px; max-height: 150px;"></td>
                            <td class="align-middle">{{ $purchase->name }}</td>
                            <td class="align-middle text-center">£{{ $purchase->price }}</td>
                            <td class="align-middle text-center">{{ $purchase->quantity }}</td>
                            <td class>
                        <td>@if (($purchase->in_progress) == 1)
                            <div class="alert alert-success" role="alert">
                                <h3>Item is Processed and ready to be distpatched</h3>
                                <p>Item is ready to be dispatched</p>
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
</div>

@include('layouts/footer')

<script>
    function openTab(evt, modeName) {
        
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class "tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class "tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab and add an "active" class to the button that opened the tab
        document.getElementById(modeName).style.display = "block";
        evt.currentTarget.className += " active";


    }
</script>