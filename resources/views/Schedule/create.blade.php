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
                    <label for="id " class="col-md-4 control-label">Name</label>
                      <div class="col-md-6">
                        @foreach($list_loans as $loans)
                          <input class="form-control" type="hidden" name="loan_id" value="{{$loans->id}}">
                          <label class="form-control">{{$loans->firstname}} {{$loans->middlename}} {{$loans->lastname}}</label>
                        @endforeach
                      </div>
                </div>
                <div class="form-group">
                    <label for="id " class="col-md-4 control-label">Payment</label>
                      <div class="col-md-6">
                       <input class="form-control" type="text" name="payment" placeholder="Payment">
                      </div>
                </div>
                    <input type="submit" name="btnsubmit" value="pay" class="btn btn-primary">
                    <a class="btn btn-warning" href="{{url('/Loan')}}">Cancel</a>
                </form>
                @if(Session::has('message'))
                    <p class="alert alert-info text-right">{{ Session::get('message') }} {{ Session::get('alert') }}</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

