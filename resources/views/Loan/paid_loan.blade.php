@extends('layout.loantemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div style="background-color: lightblue " class="panel-heading">Paid Loan</div>

                <div class="panel-body">
                  <table class="table">
                        <tr>
                              <th>Loan Amount</th>
                              <th>Date Loan</th>
                              <th>Name</th>
                              <th>Type Loan</th>
                              <th>Loan Period(months)</th>
                              <th>Interest</th>
                              <th>Status</th>
                              <th>Amortization</th>
                        </tr>
                        @foreach($list_loan as $loans)
                        <tr>
                          @if($loans->status=="Paid")
                              <td>{{number_format($loans->loan_amount,2)}}</td>
                              <td>{{$loans->date}}</td>
                              <td>{{$loans->firstname}}</td>
                              <td>{{$loans->loantype}}</td>
                              <td>{{$loans->loan_period}}</td>
                              <td>{{$loans->interest}} %</td>
                              <td>{{$loans->status}}</td>
                              <td>
                                 <a class="btn btn-info" href="{{url('/Loan/Amortization/' .$loans->id)}}">Show</a>
                              </td>
                           @endif
                        </tr>
                        @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

