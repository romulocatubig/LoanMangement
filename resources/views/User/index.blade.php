@extends('layout.publictemplate')

@section('body')
    	<a href="{{url('/User/Create')}}">Create New User</a>
       <h3>Index User</h3>
       <table>
       @foreach($list_user as $users)
       <tr>
       		<td>{{$users->firstname}}</td>
       		<td>{{$users->lastname}}</td>
       		<td>{{$users->middlename}}</td>
       		<td>{{$users->Address}}</td>
       		<td><a href="{{url('/User/Edit/'. $users->id)}}">edit</a> / <a href="{{url('/User/Delete/'. $users->id)}}">delete</a></td>
       </tr>
       @endforeach
       </table>
@endsection
