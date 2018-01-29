<html>
    <body>
      <h3>Category Create</h3>
       <form class="form-horizontal" method="post" action="/Category/Create">
       	{{csrf_field()}}
	   <input class="" type="text" name="type" placeholder="Loan Type">
	   <input class="" type="text" name="interest" placeholder="Interest">
       <input class="" type="text" name="min" placeholder="Minimum">
       <input class="" type="text" name="max" placeholder="maximum">
       <input type="submit" name="btnsubmit" value="submit">
   	   </form>
    </body>
</html>