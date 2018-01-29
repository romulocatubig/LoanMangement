<html>
    <body>
       <form class="form-horizontal" method="post" action="/User/Create">
       	{{csrf_field()}}
	   <input class="" type="text" name="firstname" placeholder="firstname">
	   <input class="" type="text" name="lastname" placeholder="lastname">
       <input class="" type="text" name="middlename" placeholder="middlename">
       <input class="" type="text" name="address" placeholder="address">
       <input type="submit" name="btnsubmit" value="submit">
   	   </form>
    </body>
</html>