@extends('layout.loantemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Amortization Schedule</div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>
                               Date
                            </th>
                            <th>
                                Amount
                            </th>
                        </tr>
                        <?php $total=0; ?>
                        @foreach($amortization as $a)
                         <?php $y = date('Y', strtotime($a->date)); $m = date('m', strtotime($a->date)); $d = date('d', strtotime($a->date))-1;?>
                         <?php $amort = ($a->loan_amount+($a->loan_amount*($a->interest/100)))/$a->loan_period; ?>
                            @for($month =1; $month<= $a->loan_period; $month++)
                            <?php $m++; ?>
                                @if($m==13)
                                    <?php $m=1; $y+=1; ?>
                                @endif
                                <?php $dateObj   = DateTime::createFromFormat('!m', $m);?>
                                <?php $monthName = $dateObj->format('F');?>
                                <tr>
                                <td>
                                    {{$monthName}} {{$d}} {{$y}}
                                </td>
                                <td>
                                     <?php $total+=$amort; ?>
                                    P {{number_format($amort,2)}} 
                                </td>
                                 </tr>
                            @endfor
                        @endforeach
                       <tr>
                           <th></th>
                           <th><strong>P {{number_format($total,2)}}</strong></th>
                       </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
