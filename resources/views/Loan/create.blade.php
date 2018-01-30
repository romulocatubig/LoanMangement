 @extends('layout.publictemplate')

@section('body')
      <h3>Loan Create</h3>
        <form class="form-horizontal" method="post" action="{{url('/Loan/Create/')}}">
        {{csrf_field()}}
        <input type="number" name="amount" placeholder="Loan Amount">
 		<select class="form-control" name="user_id">
    	@foreach($users as $users)
      		<option value="{{$users->id}}">{{$users->firstname}}</option>
    	@endforeach
 		</select>
  		<select class="form-control" name="cat_id">
   		 @foreach($categories as $categoryloans)
      		<option value="{{$categoryloans->id}}">{{$categoryloans->loantype}}</option>
    	@endforeach
 		</select>
 		<input type="submit" name="btnsubmit" value="submit">
        <a href="{{url('/Loan')}}">Cancel</a>
  </form>
@endsection
