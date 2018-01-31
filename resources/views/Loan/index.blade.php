
@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color: lightblue " class="panel-heading">Loan Index</div>

                <div class="panel-body">
                  <a class="btn btn-info" href="{{url('/Loan/Create')}}">Create New Loan</a>
                  <table class="table">
                        <tr>
                              <td>Loan Amount</td>
                              <td>Date Loan</td>
                              <td>Name</td>
                              <td>Type Loan</td>
                              <td>Action</td>
                        </tr>
                        @foreach($list_loan as $loans)
                        <tr>
                              <td>{{number_format($loans->loan_amount,2)}}</td>
                              <td>{{$loans->date}}</td>
                              <td>{{$loans->firstname}}</td>
                              <td>{{$loans->loantype}}</td>
                              <td>{{-- <a href="{{url('/Loan/Edit/'. $loans->id)}}">edit</a> / --}} 
                                    <a class="btn btn-primary" href="{{url('/Schedule/Create/'. $loans->id)}}">payment</a> 
                                    <a class="btn btn-info" href="{{url('/Schedule/'. $loans->id)}}">View Payment</a>
                              </td>
                        </tr>
                        @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

