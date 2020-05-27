@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <canvas id="chartContainer"></canvas>
                </div>
            </div>
        </div>
     </div>     
</div>
@endsection

@section('extra-js')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<script>
var chartData = {
  labels: ["S", "M", "T", "W", "T", "F", "S"],
  datasets: [{
    data: [589, 445, 483, 503, 689, 692, 634],
  },
  {
    data: [639, 465, 493, 478, 589, 632, 674],
  }]
};

var chLine = document.getElementById("chLine");
if (chLine) {
  new Chart(chLine, {
  type: 'line',
  data: chartData,
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: false
        }
      }]
    },
    legend: {
      display: false
    }
  }
  });
}
</script>
@endsection