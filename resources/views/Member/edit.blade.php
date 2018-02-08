  @extends('layout.privatetemplate')

  @section('body')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div style="background-color:lightblue" class="panel-heading">Member Edit</div>

                  <div class="panel-body">
                      <form class="form-horizontal" method="post" action="{{url('/Member/Edit')}}">
                          {{csrf_field()}}
                        @foreach($list_member as $members)
                         <div class="form-group">
                              <div class="col-md-6">
                                   <input class="form-control" type="hidden" name="id" value="{{$members->id}}" placeholder="id" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="id " class="col-md-4 control-label">First Name</label>
                              <div class="col-md-6">
                                    <input class="form-control" type="text" name="firstname" value="{{$members->firstname}}" placeholder="firstname" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="id " class="col-md-4 control-label">Last Name</label>
                              <div class="col-md-6">
                                     <input class="form-control" type="text" name="lastname" value="{{$members->lastname}}" placeholder="lastname" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="id " class="col-md-4 control-label">Middle Name</label>
                              <div class="col-md-6">
                                     <input class="form-control" type="text" name="middlename" value="{{$members->middlename}}" placeholder="middlename" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="id " class="col-md-4 control-label">Address</label>
                              <div class="col-md-6">
                                     <input class="form-control" type="text" name="address" value="{{$members->address}}" placeholder="address" required>
                              </div>
                          </div>
                           <div class="form-group">
                              <label for="id " class="col-md-4 control-label">Conatct</label>
                              <div class="col-md-6">
                                     <input class="form-control" type="text" name="contact" value="{{$members->contact}}" placeholder="address" required>
                              </div>
                          </div>
                           <div class="form-group">
                              <label for="id " class="col-md-4 control-label">Salary</label>
                              <div class="col-md-6">
                                     <input class="form-control" type="text" name="salary"value="{{$members->salary}}" placeholder="Salary" required>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="id " class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                              <div class="input-group">
                               <span class="input-group-btn">
                                 <input type="submit" name="btnsubmit" value="Save" class="btn btn-primary col-md-12">
                               </span>
                               <span class="input-group-btn">
                                <a class="btn btn-warning col-md-12" href="{{url('/Member')}}">Cancel</a>
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