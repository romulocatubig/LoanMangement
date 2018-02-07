@extends('layout.loantemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div  style="background-color: lightblue " class="panel-heading">Amortization Schedule</div>

                <div class="panel-body">
                    <div class="col-md-12">
                  @foreach($amortization as $schedules)
                        <div class="form-group">
                            <label for="id " class="col-md-3 control-label text-right">Name of Client :</label>
                            <div class="col-md-8">
                               <label  class="col-md-8 control-label">{{$schedules->firstname}} {{$schedules->middlename}} {{$schedules->lastname}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-3 control-label text-right">Loan Type :</label>
                            <div class="col-md-8">
                               <label  class="col-md-8 control-label">{{$schedules->loantype}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-3 control-label text-right">Loan Amount :</label>
                            <div class="col-md-8">
                              <label class="col-md-8 control-label">₱ {{number_format(($schedules->loan_amount), 2)}}</label>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="id " class="col-md-3 control-label text-right">Total Amount :</label>
                            <div class="col-md-8">
                              <label class="col-md-8 control-label">₱ {{number_format(($schedules->loan_amount)+($schedules->loan_amount * ($schedules->interest / 100)), 2)}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-3 control-label text-right">Loan Period in Months :</label>
                            <div class="col-md-8">
                              <label class="col-md-8 control-label">{{($schedules->loan_period)}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-3 control-label text-right">Interest rate :</label>
                            <div class="col-md-8">
                              <label class="col-md-8 control-label">{{$schedules->interest}} %</label>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="id " class="col-md-3 control-label text-right">Monthly Payment :</label>
                            <div class="col-md-8">
                               <label  class="col-md-8 control-label">₱ {{number_format(($schedules->loan_amount + ($schedules->loan_amount * ($schedules->interest / 100)))/($schedules->loan_period), 2, '.', '')}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-3 control-label text-right">Start Date Loan :</label>
                            <div class="col-md-8">
                              <label class="col-md-8 control-label">{{date('F d Y', strtotime($schedules->date))}}</label>
                            </div>
                        </div> 
                    @endforeach
                </div>
                <div class="col-md-4">
                    <table class="table table-hover">
                        <tr>
                            <th>
                               Date Amortazation
                            </th>
                            <th>
                                Amortazation Amount
                            </th>
                        </tr>
                        <?php $total=0; ?>
                        @foreach($amortization as $a)
                         <?php $y = date('Y', strtotime($a->date));$year = date('Y', strtotime($a->date)); $m = date('m', strtotime($a->date)); $d = date('d', strtotime($a->date))-1;?>
                            <?php $amort = ($a->loan_amount+($a->loan_amount*($a->interest/100)))/$a->loan_period; ?>
                            @for($month =1; $month<= $a->loan_period; $month++)
                                <?php $m++; ?>
                                @if($m==13)
                                    <?php $m=1; $y++; ?>
                                @endif 
                                <?php $dateObj   = DateTime::createFromFormat('!m', $m);?>
                                <?php $monthName = $dateObj->format('F');?>
                                    <tr>
                                        <td>
                                            {{$monthName}} {{$d}} {{$y}}
                                        </td>
                                        <td>
                                            <?php $total+=$amort; ?>
                                            ₱ {{number_format($amort,2)}} 
                                        </td>
                                    </tr>
                            @endfor
                        @endforeach
                        <tr class="footer" style="background-color: #111111;color:white">
                            <th>Total</th>
                            <th><strong>₱ {{number_format($total,2)}}</strong></th>
                        </tr>
                    </table>
                </div>
                <div class="col-md-8">
                    <table class="table table-hover">
                        <tr>
                            <th>Date Payment </th>
                            <th>Payment Amount </th>
                            <th>Principle</th>
                            <th>Interest</th>
                            <th>Ending Balance</th>
                        </tr>
                         <?php $total_payment=0; ?>
                        @foreach($payment as $p)
                        <?php $total_payment+=$p->payment; ?>
                        <tr>
                            <td>{{date('F d Y', strtotime($p->payment_date))}}</td>
                            <td>₱ {{number_format($p->payment,2)}}</td>
                            <td>₱ {{number_format(($p->principle),2)}}</td>
                            <td>₱ {{number_format(($p->payment - $p->principle), 2)}}</td>
                            <td>₱ {{number_format(($p->balance), 2)}}</td>
                        </tr>
                        @endforeach
                        <tr  class="footer" style="background-color: #111111;color:white">
                            <th>Total</th>
                            <th>₱ {{number_format($total_payment,2)}}</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

