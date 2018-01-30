@extends('layout.publictemplate')

@section('body')
    	  <a href="{{url('/Loan')}}">Back to Loan</a>
       <h3>Index Schedule</h3>
       <table>
            <td>Payment</td>
            <td>Principle</td>
            <td>Balance</td>
            <td>Date</td>
       @foreach($list_sched as $schedules)
       <tr>
       		<td>| {{$schedules->payment}} |</td>
       		<td>{{$schedules->principle}} |</td>
       		<td>{{$schedules->balance}} |</td>
       		<td>{{$schedules->payment_date}} |</td>
       		{{-- <td><a href="{{url('/User/Edit/'. $loans->id)}}">edit</a> / <a href="{{url('/User/Delete/'. $loans->id)}}">delete</a></td> --}}
       </tr>
       @endforeach
       </table>
@endsection
