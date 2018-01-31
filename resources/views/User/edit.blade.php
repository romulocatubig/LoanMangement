@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color:lightblue" class="panel-heading">User Edit</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{url('/User/Edit')}}">
                        {{csrf_field()}}
                      @foreach($list_user as $users)
                       <div class="form-group">
                            <div class="col-md-6">
                                 <input class="form-control" type="hidden" name="id" value="{{$users->id}}" placeholder="id">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                                  <input class="form-control" type="text" name="firstname" value="{{$users->firstname}}" placeholder="firstname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-6">
                                   <input class="form-control" type="text" name="lastname" value="{{$users->lastname}}" placeholder="lastname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Middle Name</label>
                            <div class="col-md-6">
                                   <input class="form-control" type="text" name="middlename" value="{{$users->middlename}}" placeholder="middlename">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                   <input class="form-control" type="text" name="address" value="{{$users->Address}}" placeholder="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 navbar-centered">
                                    <input type="submit" name="btnsubmit" value="Save" class="btn btn-primary">
                                    <a class="btn btn-warning" href="{{url('/User')}}">Cancel</a>
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