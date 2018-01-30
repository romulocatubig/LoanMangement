 @extends('layout.publictemplate')

@section('body')
      <h3>Schedule Payment Create</h3>
        <form class="form-horizontal" method="post" action="{{url('/Schedule/Create/')}}">
        {{csrf_field()}}
        <input type="number" name="payment" placeholder="Payment">
        {{-- <input type="number" name="bal" placeholder="balance">
        <input type="number" name="prin" placeholder="Principle"> --}}
    	  @foreach($list_loans as $loans)
      		<input type="text" name="loan_id" value="{{$loans->id}}">
    	  @endforeach
 		<input type="submit" name="btnsubmit" value="submit">
        <a href="{{url('/Loan')}}">Cancel</a>
  </form>
@endsection
