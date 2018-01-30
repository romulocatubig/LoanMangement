<html>
    <body>
       <form class="form-horizontal" method="post" action="/User/Create">
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
</html>