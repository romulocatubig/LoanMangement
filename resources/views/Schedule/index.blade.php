@extends('layout.loantemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div style="background-color: lightblue " class="panel-heading">Payment Index</div>

                <div class="panel-body">
                 <a class="btn btn-info" href="{{url('/Loan/Start')}}">Back to Loan</a>
                  @foreach($list_loans as $schedules)
                   <a class="btn btn-info" href="{{url('/Loan/Amortization/' .$schedules->id)}}">Amortization</a>
                  <?php $amort = ($schedules->loan_amount+($schedules->loan_amount*($schedules->interest/100)))/$schedules->loan_period; ?>
                      <a class="btn btn-primary"  data-toggle="modal" data-target="#myModal-{{$schedules->id}}">Pay</a>
                      <div id="myModal-{{$schedules->id}}" class="modal fade" role="dialog">
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
                                 
                                  <div class="col-md-9">
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                   <label for="id " class="col-md-3 control-label">Choose</label>
                                  <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="form-control" name="status" id="stat" onchange="jsFunction()">
                                            <option value="{{(number_format($amort,2,'.',''))}}">Monthly</option>
                                          <option value="{{(number_format($amort*2,2,'.',''))}}">Bi-Montly</option>
                                        </select>
                                        <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">Scheme</button>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="id " class="col-md-3 control-label">Payment</label>
                                  <div class="col-md-9">
                                    <div class="input-group">
                                      <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">₱</button>
                                      </span>
                                        <input type="hidden" name="loan_id" value="{{$schedules->id}}">
                                        <input class="form-control" type="text" name="payment" id="pay" value="{{(number_format($amort,2,'.',''))}}" placeholder="Payment">
                                      <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">.00</button>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <input type="submit" name="btnsubmit" value="pay" class="btn btn-primary col-md-12">
                              </div>
                            </form>
                          </div>
                        </div>
                        </div>
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
                 @if(Session::has('message'))
                    <p class="alert alert-info text-right">{{ Session::get('message') }} {{ Session::get('alert') }}</p>
                @endif
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
                              <td>₱ {{number_format(($schedules->payment)+($schedules->balance),2)}}</td>
                              <td>₱ {{number_format(($schedules->payment),2)}}</td>
                              <td>₱ {{number_format(($schedules->principle),2)}}</td>
                              <td>₱ {{number_format(($schedules->payment - $schedules->principle), 2)}}</td>
                              <td>₱ {{number_format(($schedules->balance), 2)}}</td>
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
