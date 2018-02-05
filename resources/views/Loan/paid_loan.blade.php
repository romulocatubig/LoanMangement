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
                              <td>Loan Amount</td>
                              <td>Date Loan</td>
                              <td>Name</td>
                              <td>Type Loan</td>
                              <td>Loan Period(months)</td>
                              <td>Interest</td>
                              <td>Status</td>
                              <td>Action</td>
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
                                    <a class="btn btn-primary" href="#">Approve</a>
                                    <a class="btn btn-warning" href="#">Cancel</a>
                                    <a class="btn btn-danger" href="#">Reject</a>
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

