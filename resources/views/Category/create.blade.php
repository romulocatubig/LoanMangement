
@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color:lightblue" class="panel-heading">Category Create</div>

                <div class="panel-body">
                   <form class="form-horizontal" method="post" action="{{url('/Category/Create')}}">
                    {{csrf_field()}}
                       <div class="form-group">
                            <div class="col-md-6">
                                <input class="form-control" type="hidden" name="id" placeholder="id" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">loan Type</label>
                            <div class="col-md-6">
                                  <input class="form-control" type="text" name="loantype" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Interest</label>
                            <div class="col-md-6">
                                  <input class="form-control" type="number" name="interest" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Minimum</label>
                            <div class="col-md-6">
                                  <input class="form-control" type="number" name="min" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Maximum</label>
                            <div class="col-md-6">
                                   <input class="form-control" type="number" name="max" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 navbar-centered">
                                    <input type="submit" name="btnsubmit" value="Create" class="btn btn-primary">
                                    <a class="btn btn-warning" href="{{url('/Category')}}">Cancel</a>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection