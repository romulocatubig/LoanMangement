@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div style="background-color: lightblue " class="panel-heading">
                    <a class="btn btn-info" href="{{url('/Member')}}">Back</a>
                    <strong>{{$member->firstname}} {{$member->middlename}} {{$member->lastname}}</strong>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                     <tr>
                      <th>Loan Amount</th>
                      <th>Date Loan</th>
                      <th>Type Loan</th>
                      <th>Loan Period(months)</th>
                      <th>Interest</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                  @foreach($loans as $l)
                  <tr>
                     <td>{{number_format($l->loan_amount,2)}}</td>
                     <td>{{$l->date}}</td>
                     <td>{{$l->loantype}}</td>
                     <td>{{$l->loan_period}}</td>
                     <td>{{$l->interest}} %</td>
                     <td>{{$l->status}}</td>
                     <td><a class="btn btn-info" href="{{url('/Loan/Amortization/' .$l->id)}}">Show</a></td>
                 </tr>
                 @endforeach
             </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
