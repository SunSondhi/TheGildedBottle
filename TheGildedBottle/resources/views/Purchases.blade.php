@section('title','| Products')
@include('layouts/head')
@include('layouts/nav')

<div class="container py-5">
    <h1 class="mb-5">Purchase History</h1>




    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Mode1')">In Process</button>
        <button class="tablinks" onclick="openTab(event, 'Mode2')">Cancelled</button>
        <button class="tablinks" onclick="openTab(event, 'Mode3')">Purchase Completed</button>
    </div>

    <!-- Tab content -->
    <div id="Mode1" class="tabcontent">
        <div style="height: 500px; overflow-y: auto;">
            <table class="table">
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
                    @if (($purchase->in_progress) == 0)
                    <tr>
                        <td><img src="{{ url($purchase->image) }}" alt="{{ $purchase->name }}" style="width:auto; height:200px;"></td>
                        <td>{{ $purchase->name }}</td>
                        <td>£{{ $purchase->price }}</td>
                        <td>{{ $purchase->quantity }}</td>
                        <td>@if (($purchase->in_progress) == 0)
                            <div class="alert alert-warning" role="alert">
                                <h3>Item is in process</h3>
                                <p>Please wait for an operator to complete the purchase.</p>
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

    <div id="Mode2" class="tabcontent">
        <div style="height: 500px; overflow-y: auto;">
            <table class="table">
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
                    @if (($purchase->in_progress) == 2)
                    <tr>
                        <td><img src="{{ url($purchase->image) }}" alt="{{ $purchase->name }}" style="width:auto; height:200px;"></td>
                        <td>{{ $purchase->name }}</td>
                        <td>£{{ $purchase->price }}</td>
                        <td>{{ $purchase->quantity }}</td>
                        <td>
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
        <div style="height: 500px; overflow-y: auto;">
            <table class="table">
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
                        <td>{{ $purchase->name }}</td>
                        <td>£{{ $purchase->price }}</td>
                        <td>{{ $purchase->quantity }}</td>
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