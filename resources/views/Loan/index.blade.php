@extends('layout.publictemplate')

@section('body')
    	<a href="{{url('/Loan/Create')}}">Create New Loan</a>
       <h3>Index Loan</h3>
       <table>
       @foreach($list_loan as $loans)
       <tr>
       		<td>| {{$loans->loan_amount}}</td>
       		<td> | {{$loans->date}}</td>
       		<td> | {{$loans->firstname}}</td>
       		<td> | {{$loans->loantype}}</td>
       		<td> | {{-- <a href="{{url('/Loan/Edit/'. $loans->id)}}">edit</a> / --}} <a href="{{url('/Schedule/Create/'. $loans->id)}}">payment</a></td>
       </tr>
       @endforeach
       </table>
@endsection
