@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color: lightblue " class="panel-heading">Payment Index</div>

                <div class="panel-body">
                 <a class="btn btn-info" href="{{url('/Loan')}}">Back to Loan</a>
                
                    @foreach($list_loans as $schedules)
                   
                    <a class="btn btn-primary" href="{{url('/Schedule/Create/'. $schedules->id)}}">Pay</a> 
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
                              <label class="col-md-8 control-label">{{number_format(($schedules->loan_amount), 2)}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-3 control-label text-right">Interest rate :</label>
                            <div class="col-md-8">
                              <label class="col-md-8 control-label">{{$schedules->interest}} %</label>
                            </div>
                        </div><div class="form-group">
                            <label for="id " class="col-md-3 control-label text-right">Start Date Loan :</label>
                            <div class="col-md-8">
                              <label class="col-md-8 control-label">{{date('F d Y', strtotime($schedules->created_at))}}</label>
                            </div>
                        </div> 
                    @endforeach
                
                 <table class="table">
                        <tr>
                              <th>Beginning Balance</th>
                              <th>Payment</th>
                              <th>Principle</th>
                              <th>Interest</th>
                              <th>Ending Balance</th>
                              <th>Payment Date</th>
                        </tr>
                        @foreach($list_sched as $schedules)
                        <tr>
                              <td>P {{number_format(($schedules->principle + $schedules->balance),2)}}</td>
                              <td>P {{number_format(($schedules->payment),2)}}</td>
                              <td>P {{number_format(($schedules->principle),2)}}</td>
                              <td>P {{number_format(($schedules->payment - $schedules->principle), 2)}}</td>
                              <td>P {{number_format(($schedules->balance), 2)}}</td>
                              <td>{{date('F d Y', strtotime($schedules->payment_date))}}</td>
                              {{-- <td><a href="{{url('/User/Edit/'. $loans->id)}}">edit</a> / <a href="{{url('/User/Delete/'. $loans->id)}}">delete</a></td> --}}
                        </tr>
                         @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


