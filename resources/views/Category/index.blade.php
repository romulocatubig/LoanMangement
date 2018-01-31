@extends('layout.privatetemplate')

@section('body')
      <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color:lightblue" class="panel-heading">User Index</div>

                <div class="panel-body">
                  <a class="btn btn-info" href="{{url('/Category/Create')}}">Create New Category</a>
                  <table class="table">
                        <tr>
                              <th>Type</th>
                              <th>Interest</th>
                              <th>Minimum</th>
                              <th>Maximum</th>
                              <th>Action</th>
                        </tr>
                        @foreach($list_category as $categoryloans)
                        <tr>
                              <td>{{$categoryloans->loantype}}</td>
                              <td>{{$categoryloans->interest}}</td>
                              <td>{{$categoryloans->minimum_loan}}</td>
                              <td>{{$categoryloans->maximum_loan}}</td>
                              <td><a class="btn btn-primary" href="{{url('/Category/Edit/'. $categoryloans->id)}}">edit</a></td>
                        </tr>
                        @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection