@extends('app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">


            <div id="chartContainer" style="height: 380px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



        </div>
    </div>

@endsection

<script>
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "Users with the most posts in the last week"
            },
            axisY: {
                title: "Number of posts",
                valueFormatString: "0",

            },
            axisX: {
                title: "Username"
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 1,


                        }
                    }]
                },

            },
            data: [{
                type: "line",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>