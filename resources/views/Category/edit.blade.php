
       <form class="form-horizontal" method="post" action="/User/Edit">
          {{csrf_field()}}
          <h3>Edit Categoty</h3>
          @foreach($list_user as $users)
          <input class="" type="hidden" name="id" value="{{$users->id}}" placeholder="id">
          <input class="" type="text" name="firstname" value="{{$users->firstname}}" placeholder="firstname">
          <input class="" type="text" name="lastname" value="{{$users->lastname}}" placeholder="lastname">
          <input class="" type="text" name="middlename" value="{{$users->middlename}}" placeholder="middlename">
          <input class="" type="text" name="address" value="{{$users->Address}}" placeholder="address">
          <input type="submit" name="btnsubmit" value="Save">
          <a href="/User">Cancel</a>
          @endforeach
       </form>
