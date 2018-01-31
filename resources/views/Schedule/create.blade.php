@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color:lightblue" class="panel-heading">Payment</div>

                <div class="panel-body">
                <form class="form-horizontal" method="post" action="{{url('/Schedule/Create/')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="id " class="col-md-4 control-label">First Name</label>
                      <div class="col-md-6">
                        @foreach($list_loans as $loans)
                          <input class="form-control" type="text" name="loan_id" value="{{$loans->id}}">
                        @endforeach
                      </div>
                </div>
                <div class="form-group">
                    <label for="id " class="col-md-4 control-label">Name</label>
                      <div class="col-md-6">
                       <input class="form-control" type="number" name="payment" placeholder="Payment">
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

