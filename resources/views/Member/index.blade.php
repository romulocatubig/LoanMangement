@extends('layout.privatetemplate')

@section('body')
    	<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div style="background-color:lightblue" class="panel-heading">Member Index</div>

                <div class="panel-body">
                  <a class="btn btn-info" href="{{url('/Member/Create')}}">Create New Member</a>
                  <table class="table">
                        <tr>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Middle Name</th>
                              <th>Address</th>
                              <th>Contact</th>
                              <th>Salary</th>
                              <th>Status</th>
                              <th>Action</th>
                        </tr>
                  @foreach($list_member as $members)
                        <tr>
                              <td>{{$members->firstname}}</td>
                              <td>{{$members->lastname}}</td>
                              <td>{{$members->middlename}}</td>
                              <td>{{$members->address}}</td>
                              <td>{{$members->contact}}</td>
                              <td>{{$members->salary}}</td>
                              <td>{{$members->status}}</td>
                              <td>
                                  @if($members->status != "Active") 
                                    <a class="btn btn-primary" href="{{url('/Member/Update/'. $members->id)}}">activate</a>
                                  @else
                                   <a class="btn btn-primary" href="{{url('/Member/Edit/'. $members->id)}}">edit</a>
                                    <a class="btn btn-danger" href="{{url('/Member/Update/'. $members->id)}}">deactivate</a>
                                    <a class="btn btn-primary"  href="{{url('/Loan/Create/'. $members->id)}}">loan</a>
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
