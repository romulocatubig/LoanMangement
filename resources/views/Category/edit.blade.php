@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color:lightblue" class="panel-heading">Category Edit</div>

                <div class="panel-body">
                   <form class="form-horizontal" method="post" action="{{url('/Category/Edit')}}">
                    {{csrf_field()}}
                     @foreach($list_category as $categoryloans)
                       <div class="form-group">
                            <div class="col-md-6">
                                <input class="" type="hidden" name="id" value="{{$categoryloans->id}}" placeholder="id" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">loan Type</label>
                            <div class="col-md-6">
                                  <input class="form-control" type="text" name="loantype" value="{{$categoryloans->loantype}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Interset</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                 <input class="form-control" type="number" name="interest" value="{{$categoryloans->interest}}" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button">%</button>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Minimum</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                      <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">₱</button>
                                    </span>
                                     <input class="form-control" type="number" name="min" value="{{$categoryloans->minimum_loan}}" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">.00</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Maximum</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                      <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">₱</button>
                                    </span>
                                    <input class="form-control" type="number" name="max" value="{{$categoryloans->maximum_loan}}" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">.00</button>
                                    </span>
                                </div>
                            </div>
                        </div>                         <div class="form-group">
                            <label for="id " class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                   <span class="input-group-btn">
                                     <input type="submit" name="btnsubmit" value="Save" class="btn btn-primary col-md-12">
                                 </span>
                                 <span class="input-group-btn">
                                    <a class="btn btn-warning col-md-12" href="{{url('/Category')}}">Cancel</a>
                                </span>
                            </div>
                        </div>
                        </div>
                      @endforeach
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection