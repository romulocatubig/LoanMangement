@extends('layout.privatetemplate')

@section('body')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">

window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
         animationEnabled: true,
        title:{
            text: "User Loan Charts"              
        },
        data: [              
        {
            // Change type to "doughnut", "line", "splineArea", etc.
            type: "column",
            dataPoints: [
              @foreach($list_user as $user)
               <?php $count = 0; ?>
                    @foreach($list_loan as $loan)
                        @if($loan->member_id == $user->id)
                            <?php $count += $loan->loan_amount; ?>
                        @endif
                    @endforeach
                     { label:"{{$user->firstname}}" ,  y: {{$count}}  },
              @endforeach
            ]
        }
        ]
    });
    chart.render();
}
</script>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
@endsection