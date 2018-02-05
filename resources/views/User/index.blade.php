@extends('layout.privatetemplate')

@section('body')
    	<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                              <th>Position</th>
                              <th>Username</th>
                              {{-- <th>Password</th> --}}
                              <th>Status</th>
                        </tr>
                  @foreach($list_user as $users)
                        <tr>
                              <td>{{$users->firstname}}</td>
                              <td>{{$users->lastname}}</td>
                              <td>{{$users->middlename}}</td>
                              <td>{{$users->address}}</td>
                              <td>{{$users->position}}</td>
                              <td>{{$users->username}}</td>
                             {{--  <td>{{$users->password}}</td> --}}
                              <td>{{$users->status}}</td>
                              <td>
                                @if($users->status=="Active")
                                    <a class="btn btn-primary" href="{{url('/User/Edit/'. $users->id)}}">edit</a> 
                                    <a class="btn btn-danger" href="{{url('/User/Update/'. $users->id)}}">Deactivate</a>
                                @else
                                    <a class="btn btn-primary" href="{{url('/User/Update/'. $users->id)}}">Activate</a>
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
