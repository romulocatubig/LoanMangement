@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color: lightblue " class="panel-heading">Payment Index</div>

                <div class="panel-body">
                 <a class="btn btn-info" href="{{url('/Loan')}}">Back to Loan</a>
                 <table class="table">
                        <tr>
                              <td>Payment</td>
                              <td>Principle</td>
                              <td>Balance</td>
                              <td>Date</td>
                        </tr>
                        @foreach($list_sched as $schedules)
                        <tr>
                              <td>{{$schedules->payment}}</td>
                              <td>{{$schedules->principle}}</td>
                              <td>{{$schedules->balance}}</td>
                              <td>{{$schedules->payment_date}}</td>
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


