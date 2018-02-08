@extends('layout.privatetemplate')

@section('body')
      <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div style="background-color:lightblue" class="panel-heading">Category Index</div>
                <div class="panel-body">
                  <a class="btn btn-primary" href="{{url('/Category/Create')}}">Create New Category</a>
                </div>  
                <div class="panel-body">
                 
                  <table class="table">
                        <tr>
                              <th>Type</th>
                              <th>Interest</th>
                              <th>Minimum</th>
                              <th>Maximum</th>
                              <th>Status</th>
                              <th>Action</th>
                        </tr>
                        @foreach($list_category as $categoryloans)
                        <tr>
                              <td>{{$categoryloans->loantype}}</td>
                              <td>{{$categoryloans->interest}}</td>
                              <td>{{number_format($categoryloans->minimum_loan,2)}}</td>
                              <td>{{number_format($categoryloans->maximum_loan,2)}}</td>
                              <td>{{$categoryloans->status}}</td>
                              <td>
                               <a class="btn btn-primary" href="{{url('/Category/Edit/'. $categoryloans->id)}}">edit</a>
                               @if($categoryloans->status != "Enable") 
                                    <a class="btn btn-primary" href="{{url('/Category/Update/'. $categoryloans->id)}}">
                                    enable</a>
                               @else
                                    <a class="btn btn-danger" href="{{url('/Category/Update/'. $categoryloans->id)}}">disable</a>
                               @endif
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