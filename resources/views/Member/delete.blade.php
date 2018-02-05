@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color:lightblue" class="panel-heading">Delete User</div>

                  <div class="panel-body">
                  <form class="form-horizontal" method="post" action="{{url('/User/Delete')}}">
                  {{csrf_field()}}
                  <h3>Are you sure Delete this</h3>
                    @foreach($list_user as $users)
                      <input class="" type="hidden" name="id" value="{{$users->id}}" placeholder="id">
                       <div class="form-group">
                            <label for="id " class="col-md-4 control-label">First Name :</label>
                            <div class="col-md-6">
                                <label  class="col-md-6 control-label">{{$users->firstname}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Last Name :</label>
                            <div class="col-md-6">
                                <label  class="col-md-6 control-label">{{$users->lastname}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Middle Name :</label>
                            <div class="col-md-6">
                                 <label  class="col-md-6 control-label">{{$users->middlename}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Address :</label>
                            <div class="col-md-6">
                                <label  class="col-md-6 control-label">{{$users->Address}}</label>
                            </div>
                        </div>
                      
                      <input type="submit" name="btnsubmit" value="Delete" class=" btn btn-danger">
                      <a href="{{url('/User')}}" class="btn btn-warning" >Cancel</a>
                    @endforeach
                  </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection