@extends('layout.privatetemplate')

@section('body')
<div class="container">
  <div class="col-md-3 navbar-right">
    <form class="form-horizontal" method="post" action="{{url('/Scheme')}}">
    {{csrf_field()}}
    <div class="input-group">
      <input type="text" class="form-control" name="year" placeholder="Search for year...">
      <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">Go!</button>
      </span>
    </div>
  </form>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div style="background-color: lightblue " class="panel-heading">Monthly(Payment Member) </div>
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
