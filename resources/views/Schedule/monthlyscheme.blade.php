@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color: lightblue " class="panel-heading">Monthly Scheme</div>

                <div class="panel-body">
                  <div class="form-group">
                     <form class="form-horizontal" method="post" action="{{url('/Scheme')}}">
                     {{csrf_field()}}
                    <label for="id " class="col-md-2 control-label">Name</label>
                      <div class="col-md-3">
                        <select class="form-control" name="user_id">
                        @foreach($list_users as $users)
                          <option value="{{$users->id}}">{{$users->firstname}}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="col-md-3">
                        <input class="form-control" type="text" name="date" placeholder="Year">
                      </div>
                      <div class="col-md-3">
                        <input type="submit" class="btn btn-primary" value="Search">
                      </div>
                    </div>
                    <table class="table">
                        <tr>
                            <th>Month</th>
                            <th>Payment</th>
                            <th>Principle</th>
                            <th>Interest</th>
                        </tr>
                        @for($dt =1; $dt<=12; $dt++)
                        <?php $payment = 0; ?>
                        <?php $principle = 0; ?>
                            @foreach($list_payment as $schedules)
                                @if($dt==date('m', strtotime($schedules->payment_date)) && date('m', strtotime($schedules->payment_date)==2018))
                                    <?php $payment += $schedules->payment; ?>
                                    <?php $principle += $schedules->principle; ?>
                                @endif
                            @endforeach
                        <tr>
                              <td>{{$dt}}</td>
                              <td>P {{number_format(($payment),2)}}</td>
                              <td>P {{number_format(($principle), 2)}}</td>
                              <td>P {{number_format(($payment - $principle), 2)}}</td>
                        </tr>
                        @endfor
                    </table>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
