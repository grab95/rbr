@extends('app')
@section('content')
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Users with the most posts in the last week"
                },
                axisY: {
                    title: "Number of posts"
                },
                axisX: {
                    title: "Username"
                },
                data: [{
                    type: "line",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>

    <div class="container">
        <div class="row justify-content-center">



                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


                <div class="card-body justify-content-center">
                    <div>
                        <div class="alert alert-success alert-block" id="success-info" style="display: none">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>
                                <p id="info">
                                </p>
                            </strong>
                        </div>

                    </div>


                </div>
            </div>
        </div>






@endsection