@extends('layout.privatetemplate')

@section('body')
    	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color:lightblue" class="panel-heading">User Index</div>

                <div class="panel-body">
                  <a class="btn btn-info" href="{{url('/User/Create')}}">Create New User</a>
                  <table class="table">
                        <tr>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Middle Name</th>
                              <th>Address</th>
                              <th>Action</th>
                              <th>Salary</th>
                        </tr>
                  @foreach($list_user as $users)
                        <tr>
                              <td>{{$users->firstname}}</td>
                              <td>{{$users->lastname}}</td>
                              <td>{{$users->middlename}}</td>
                              <td>{{$users->Address}}</td>
                              <td>{{$users->salary}}</td>
                              <td><a class="btn btn-primary" href="{{url('/User/Edit/'. $users->id)}}">edit</a> <a class="btn btn-danger" href="{{url('/User/Delete/'. $users->id)}}">delete</a></td>
                        </tr>
                  @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
