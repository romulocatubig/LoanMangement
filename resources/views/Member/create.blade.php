@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color:lightblue" class="panel-heading">Member Create</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{url('/Member/Create')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                                  <input class="form-control" type="text" name="firstname" placeholder="firstname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-6">
                                   <input class="form-control" type="text" name="lastname" placeholder="lastname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Middle Name</label>
                            <div class="col-md-6">
                                   <input class="form-control" type="text" name="middlename" placeholder="middlename" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                   <input class="form-control" type="text" name="address" placeholder="address" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Contact</label>
                            <div class="col-md-6">
                                   <input class="form-control" type="text" name="contact" placeholder="contact" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Salary</label>
                            <div class="col-md-6">
                                   <input class="form-control" type="text" name="salary" placeholder="salary" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                   <span class="input-group-btn">
                                      <input type="submit" name="btnsubmit" value="Create" class="btn btn-primary col-md-12">
                                 </span>
                                 <span class="input-group-btn">
                                     <a class="btn btn-warning col-md-12" href="{{url('/Member')}}">Cancel</a>
                                </span>
                            </div>
                        </div>
                    </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection