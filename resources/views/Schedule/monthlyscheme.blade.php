@extends('layout.privatetemplate')

@section('body')
<div class="container">
<div class="col-md-1 navbar-right">
    <input type="submit" name="" value="Search" class="btn btn-primary">
</div>
<div class="col-md-2 navbar-right">
    <input type="number" name="year" class="form-control" onchange="jsFunction()">
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div style="background-color: lightblue " class="panel-heading">Monthly(Payment Member) </div>
                <div class="panel-body">
                   {{--  <div class="form-group">
                    <form class="form-horizontal" method="post" action="{{url('/Scheme')}}">
                    {{csrf_field()}}
                      <label for="id " class="col-md-2 control-label">Name</label>
                      <div class="col-md-3">
                          <select class="form-control" name="user_id">
                            @foreach($list_users as $users)
                              <option value="{{$users->id}}">{{$users->firstname}}</option>
                            @endforeach
                          /select>
                      </div>
                      <div class="col-md-3">
                          <input class="form-control" type="text" name="date" placeholder="Year">
                      </div>
                      <div class="col-md-3">
                          <input type="submit" class="btn btn-primary" value="Search">
                      </div>
                    </div> --}}
                    <table class="table table-hover">
                        <tr>
                          <th></th>
                          @for($dt =1; $dt<=12; $dt++)
                            <?php $dateObj   = DateTime::createFromFormat('!m', $dt);?>
                            <?php $monthName = $dateObj->format('F');?>
                            <th>{{$monthName}}</th>
                          @endfor
                        </tr>
                        @foreach($category as $c)
                          <tr>
                            <th>{{$c->loantype}}</th>
                            @for($dt =1; $dt<=12; $dt++)
                            <?php $val=0; ?>
                                @foreach($list_payment as $payment)
                                    @if($dt==date('m', strtotime($payment->payment_date))&& $c->id==$payment->category_id)
                                        <?php $val+=$payment->payment; ?>
                                    @endif
                                @endforeach
                                <th>
                                    ₱ {{number_format(($val), 2)}}
                                </th>
                            @endfor
                          </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div style="background-color: lightblue " class="panel-heading">Monthly(Cash out / loan)</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <th></th>
                        @for($dt =1; $dt<=12; $dt++)
                            <?php $dateObj   = DateTime::createFromFormat('!m', $dt);?>
                            <?php $monthName = $dateObj->format('F');?>
                            <th>{{$monthName}}</th>
                        @endfor
                    </tr>
                    @foreach($category as $c)
                    <tr>
                        <th>{{$c->loantype}}</th>
                        @for($dt =1; $dt<=12; $dt++)
                        <?php $temp=0; ?>
                        @foreach($loans as $loan)
                            @if($dt==date('m', strtotime($loan->date)) && $c->id==$loan->category_id)
                                <?php $temp+=$loan->loan_amount; ?>
                            @endif
                        @endforeach
                        <th>
                            ₱ {{number_format(($temp), 2)}}
                        </th>
                        @endfor
                    </tr>
                    @endforeach
                </table>
          </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
  function jsFunction(){
   var textbox = document.getElementById('year');
   if(dropdown1.textChange == 0){
     textbox.value = dropdown1.value;
   } else if(dropdown1.selectedIndex == 1) {
     textbox.value = dropdown1.value;
   }
   }
</script>
