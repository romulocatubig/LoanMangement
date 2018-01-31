@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color:lightblue" class="panel-heading">Loan Create</div>

                <div class="panel-body">
                <form class="form-horizontal" method="post" action="{{url('/Loan/Create/')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="id " class="col-md-4 control-label">Amount</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="amount" placeholder="Loan Amount">
                      </div>
                </div>
                <div class="form-group">
                    <label for="id " class="col-md-4 control-label">Name</label>
                      <div class="col-md-6">
                        <select class="form-control" name="user_id">
                        @foreach($users as $users)
                          <option value="{{$users->id}}">{{$users->firstname}}</option>
                        @endforeach
                        </select>
                      </div>
                </div>
 		            <div class="form-group">
                    <label for="id " class="col-md-4 control-label">Loan Type</label>
                      <div class="col-md-6">
                      <select class="form-control" name="cat_id">
                       @foreach($categories as $categoryloans)
                        <option value="{{$categoryloans->id}}">{{$categoryloans->loantype}}</option>
                      @endforeach
                      </select>
                      </div>
                </div>
  		
 		                <input type="submit" name="btnsubmit" value="submit" class="btn btn-primary">
                    <a class="btn btn-warning" href="{{url('/Loan')}}">Cancel</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
