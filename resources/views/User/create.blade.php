{{-- <html>
    <body>
       <form class="form-horizontal" method="post" action="{{url('/User/Create/')}}">
       	{{csrf_field()}}
       <h3>Create User</h3>
	     <input class="" type="text" name="firstname" placeholder="firstname">
	     <input class="" type="text" name="lastname" placeholder="lastname">
       <input class="" type="text" name="middlename" placeholder="middlename">
       <input class="" type="text" name="address" placeholder="address">
       <input type="submit" name="btnsubmit" value="submit">
       <a href="{{url('/User')}}">Cancel</a>
   	   </form>
    </body>
</html> --}}
@extends('layout.privatetemplate')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="background-color:lightblue" class="panel-heading">User Create</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{url('/User/Create')}}">
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
                            <label for="id " class="col-md-4 control-label">Position</label>
                            <div class="col-md-6">
                               <select class="form-control" name="position">
                                    <option value="Admin">Admin</option>
                                    <option value="Collector">Collector</option>
                               </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="id " class="col-md-4 control-label">User Name</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="username" placeholder="username" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="id " class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input class="form-control" type="password" name="password" placeholder="password" required>
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
                                    <a class="btn btn-warning col-md-12" href="{{url('/User')}}">Cancel</a>
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