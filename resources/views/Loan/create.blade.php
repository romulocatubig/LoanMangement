@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color:lightblue" class="panel-heading">Loan Create</div>

                <div class="panel-body">
                
                <form class="form-horizontal" method="post" action="{{url('/Loan/Create/'.$id)}}">
                {{csrf_field()}}
                <div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Change Interest</a>
                <div class="form-group dropdown-menu">
                    <label for="id " class="col-md-4 control-label">Interest</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="interest">
                      </div>
                </div>
                </div>
                 <div class="form-group">
                    <label for="id " class="col-md-4 control-label">Per month Loan</label>
                      <div class="col-md-6">
                        <div class="input-group">
                         <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Minimum : ₱ {{number_format($members->salary * .10,2)}}</button>
                          </span>
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Maximum :₱ {{number_format($members->salary * .20,2)}}</button>
                          </span>
                        </div>
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
                <div class="form-group">
                    <label for="id " class="col-md-4 control-label">Amount</label>
                      <div class="col-md-6">
                        <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">₱</button>
                          </span>
                        <input type="number" class="form-control" name="amount" placeholder="Loan Amount">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">.00</button>
                          </span>
                        </div>
                      </div>
                </div>
                <div class="form-group">
                    <label for="id " class="col-md-4 control-label">Loan Period(Monthly)</label>
                      <div class="col-md-6">
                        <div class="input-group">
                        <input type="number" class="form-control" name="loan_period" placeholder="Month">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">months</button>
                          </span>
                        </div>
                      </div>
                </div>
                <div class="form-group">
                    <label for="id " class="col-md-4 control-label"></label>
                      <div class="col-md-6">
                        <div class="input-group">
                         <span class="input-group-btn">
                           <input type="submit" name="btnsubmit" value="Loan" class="btn btn-primary col-md-12">
                          </span>
                        <span class="input-group-btn">
                            <a class="btn btn-warning col-md-12" href="{{url('/Member')}}">Cancel</a>
                          </span>
                        </div>
                      </div>
                </div>
 		                
                    
                    @if(session('errors'))
                      <p class="alert alert-info text-right">{{session('errors')}}</p>
                    @endif
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
