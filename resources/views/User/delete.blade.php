<html>
    <body>
       <form class="form-horizontal" method="post" action="{{url('/User/Delete/')}}">
          {{csrf_field()}}
          <h3>Delete User</h3>
          <h3>Are you sure Delete this</h3>
          @foreach($list_user as $users)
          <input class="" type="hidden" name="id" value="{{$users->id}}" placeholder="id">
          <label>{{$users->firstname}}</label>
          <label>{{$users->lastname}}</label>
          <label>{{$users->middlename}}</label>
          <label>{{$users->Address}}</label>
          <input type="submit" name="btnsubmit" value="Delete">
          <a href="{{url('/User')}}">Cancel</a>
          @endforeach
       </form>
    </body>
</html>