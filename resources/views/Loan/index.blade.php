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
                @if(Auth::user()->position == "Admin")
                <div class="dropdown">
                 <a class="btn btn-primary" href="{{url('/Loan/Edit/' .$loans->id)}}">Edit</a>
                 <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><span class="caret"></span></a>
                 <ul class="dropdown-menu">
                  @if($loans->status!="Cancelled")
                  <a class="btn btn-primary col-md-12" href="{{url('/Loan/Approved/' .$loans->id)}}">Approve</a>
                  <a class="btn btn-warning col-md-12" href="{{url('/Loan/Cancelled/' .$loans->id)}}">Cancel</a>
                  @else
                  <a class="btn btn-primary col-md-12" href="{{url('/Loan/Uncancelled/' .$loans->id)}}">uncancelled</a>
                  @endif
                  <a class="btn btn-danger col-md-12"  data-toggle="modal" data-target="#myModal-{{$loans->id}}">Rejected</a>
                </ul>
                <div id="myModal-{{$loans->id}}" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Rejected!!!</h4>
                      </div>
                      <div class="modal-body">
                        Are you sure rejected this loan?
                      </div>
                      <div class="modal-footer">
                        <a class="btn btn-danger" href="{{url('/Loan/Rejected/' .$loans->id)}}">Yes</a>
                        <a type="button" class="close btn btn-default" data-dismiss="modal">No</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
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


