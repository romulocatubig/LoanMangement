@extends('layout.loantemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div style="background-color: lightblue " class="panel-heading">Started Loan</div>

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
                              <td>Amortization</td>
                              <td>Action</td>
                        </tr>
                        @foreach($list_loan as $loans)
                        <tr>
                          @if($loans->status=="Started")
                              <td>{{number_format($loans->loan_amount,2)}}</td>
                              <td>{{$loans->date}}</td>
                              <td>{{$loans->firstname}}</td>
                              <td>{{$loans->loantype}}</td>
                              <td>{{$loans->loan_period}}</td>
                              <td>{{$loans->interest}} %</td>
                              <td>{{$loans->status}}</td>
                              <td>
                                <a class="btn btn-info" href="{{url('/Loan/Amortization/' .$loans->id)}}">Amortization</a>
                              </td>
                              <?php $amort = ($loans->loan_amount+($loans->loan_amount*($loans->interest/100)))/$loans->loan_period; ?>
                              <td>
                               {{--  <a class="btn btn-primary"  data-toggle="modal" data-target="#myModal-{{$loans->id}}">Pay</a>
                                <div id="myModal-{{$loans->id}}" class="modal fade" role="dialog">
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Payment</h4>
                                      </div>
                                      <form class="form-horizontal" method="post" action="{{url('/Schedule/Create/')}}">
                                      {{csrf_field()}}
                                      <div class="modal-body">
                                      <div class="form-group">
                                      <label for="id " class="col-md-4 control-label">Choose</label>
                                      <div class="col-md-8">
                                          <select class="form-control" name="status" id="stat" onchange="jsFunction()">
                                              <option value="{{(number_format($amort,2,'.',''))}}">Monthly</option>
                                              <option value="{{(number_format($amort*2,2,'.',''))}}">Bi-Montly</option>
                                          </select>
                                      </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="id " class="col-md-4 control-label">Payment</label>
                                          <div class="col-md-8">
                                              <input type="hidden" name="loan_id" value="{{$loans->id}}">
                                              <input class="form-control" type="text" name="payment" id="pay" value="{{(number_format($amort,2,'.',''))}}" placeholder="Payment">
                                          </div>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                        <input type="submit" name="btnsubmit" value="pay" class="btn btn-primary">
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                </div> --}}
                                <a class="btn btn-info" href="{{url('/Schedule/'.$loans->id)}}">View Payment</a>
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
<script type="text/javascript">
  function jsFunction(){
   var dropdown1 = document.getElementById('stat');
   var textbox = document.getElementById('pay');
   if(dropdown1.selectedIndex == 0){
     textbox.value = dropdown1.value;
   } else if(dropdown1.selectedIndex == 1) {
     textbox.value = dropdown1.value;
   }
   }
</script>




