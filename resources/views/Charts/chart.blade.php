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
        animationEnabled: true,
        title:{
            text: "Category Loan Charts"              
        },
        legend:{
        cursor: "pointer",
        fontSize: 16,
        itemclick: toggleDataSeries
        },
        toolTip:{
        shared: true
        },
        data: [
        @foreach($list_cat as $cat)              
        {
            // Change type to "doughnut", "line", "splineArea", etc.
                type: "spline",
                name: "{{$cat->loantype}}",
                showInLegend: true,
                dataPoints: [
                @for($x = 1; $x<=12; $x++)
                    <?php $count = 0; ?>
                    @foreach($list_loan as $loan)   
                        @if(date('m', strtotime($loan->created_at)) == $x && $cat->id == $loan->category_id)
                            <?php $count += $loan->loan_amount; ?>
                        @endif
                    @endforeach
                    <?php $asa = date('F', strtotime($x)); ?>
                    <?php $dateObj   = DateTime::createFromFormat('!m', $x);?>
                    <?php $monthName = $dateObj->format('F');?>
                    { label: {{$x}},  y: {{$count}}  },
                @endfor
                ]
        },
         @endforeach
        ]
    });
   chart.render();

function toggleDataSeries(e){
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    }
    else{
        e.dataSeries.visible = true;
    }
    chart.render();
}
}
</script>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
@endsection
{{-- {{date('m', strtotime($cat->created_at))}} --}}