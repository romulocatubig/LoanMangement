{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chart Demo</div>

                <div class="panel-body">
                    {!! $chart->html() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
@endsection --}}
@extends('layout.privatetemplate')

@section('body')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">

window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        title:{
            text: "Payment Charts"              
        },
        data: [              
        {
            // Change type to "doughnut", "line", "splineArea", etc.
            type: "column",
            dataPoints: [
              @foreach($list_sched as $schedules)
                { label: {{$schedules->loan_id}},  y: {{$schedules->payment}}  },
              @endforeach
                // { label: "orange", y: 15  },
                // { label: "banana", y: 25  },
                // { label: "mango",  y: 30  },
                // { label: "grape",  y: 28  }
            ]
        }
        ]
    });
    chart.render();
}
</script>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
@endsection
