@extends('layout.loantemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div style="background-color: lightblue " class="panel-heading">Pending Loan</div>

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
                              <td>Amortazition</td>
                              <td>Action</td>
                        </tr>
                        @foreach($list_loan as $loans)
                        <tr>
                          @if($loans->status=="Pending" or $loans->status=="Cancelled")
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
                              <td>
                                 @if($loans->status!="Cancelled")
                                    <a class="btn btn-primary" href="{{url('/Loan/Approved/' .$loans->id)}}">Approve</a>
                                    <a class="btn btn-warning" href="{{url('/Loan/Cancelled/' .$loans->id)}}">Cancel</a>
                                    <a class="btn btn-danger" href="{{url('/Loan/Rejected/' .$loans->id)}}">Reject</a>
                                  @else
                                    <a class="btn btn-warning" href="{{url('/Loan/Uncancelled/' .$loans->id)}}">uncancelled</a>
                                    <a class="btn btn-danger" href="{{url('/Loan/Rejected/' .$loans->id)}}">Reject</a>
                                  @endif
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


