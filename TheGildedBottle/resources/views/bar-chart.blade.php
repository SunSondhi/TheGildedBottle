@include('layouts/head')
@include('layouts/nav')
@include('layouts/adminsidenav')


<!DOCTYPE html>
<html>

<head>
    <title>How to Create Dynamic Bar Chart in Laravel 10 using ChartJS</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
    #canvas {
        width: 250px;
        height: 250px;
    }

    #canvas23 {
        width: 250px;
        height: 250px;
    }

    #canvas3 {
        width: 250px;
        height: 250px;
    }

    .card {
        margin: 2%;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Most Sales</h3>
                        <canvas id="canvas"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Purchases Progress</h3>
                        <canvas id="canvas23"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Purchase Trend</h3>
                        <canvas id="canvas3"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p>Total visitors: {{ $visitors }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('bar-chart-data') }}",
            method: "GET",
            success: function(data) {
                console.log(data);
                var labels = [];
                var values = [];
                for (var i in data) {
                    labels.push(data[i].name);
                    values.push(data[i].total);
                }
                var ctx = document.getElementById('canvas').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Sales',
                            data: values,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>



<script>
    $(document).ready(function() {
        var ctx = document.getElementById("canvas23").getContext("2d");

        $.ajax({
            url: "{{ route('bar-chart-data2') }}",
            method: "GET",
            success: function(data) {
                console.log(data);
                var chartdata = {
                    labels: data.labels,
                    datasets: data.datasets
                };

                var barGraph = new Chart(ctx, {
                    type: 'bar',
                    data: chartdata
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $(document).ready(function() {


            $.ajax({
                url: "{{ route('scatter-plot-data') }}",
                method: "GET",
                success: function(data) {
                    console.log(data);
                    var chartdata = {
                        datasets: [{
                            label: 'Purchasing Trend',
                            data: data,
                            borderColor: 'rgba(200, 200, 200, 0.75)',
                            backgroundColor: 'rgba(200, 200, 200, 0.5)',
                            pointRadius: 5,
                            pointHoverRadius: 10,
                            pointHitRadius: 30
                        }]
                    };
                    var ctx = document.getElementById("canvas3").getContext("2d");
                    var scatterChart = new Chart(ctx, {
                        type: 'scatter',
                        data: chartdata,
                        options: {
                            scales: {
                                xAxes: [{
                                    type: 'time',
                                    time: {
                                        displayFormats: {
                                            quarter: 'MMM YYYY'
                                        }
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Date of Purchase'
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Total Amount Spent'
                                    }
                                }]
                            }
                        }
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    });
</script>


@include('layouts/footer')