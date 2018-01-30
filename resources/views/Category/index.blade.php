@extends('layout.publictemplate')

@section('body')
    	<a href="{{url('/Category/Create')}}">Create New Category</a>
       <h3>Index Category</h3>
       <table>
       @foreach($list_category as $categoryloans)
       <tr>
       		<td>{{$categoryloans->loantype}}</td>
       		<td>{{$categoryloans->interest}}</td>
       		<td>{{$categoryloans->minimum_loan}}</td>
       		<td>{{$categoryloans->maximum_loan}}</td>
       		<td><a href="{{url('/Category/Edit/'. $categoryloans->id)}}">edit</a></td>
       </tr>
       @endforeach
       </table>
@endsection
