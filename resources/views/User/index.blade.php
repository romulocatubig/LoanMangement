<html>
    <body>
    	<a href="/User/Create">Create New User</a>
       <table>
       @foreach($list_user as $users)
       <tr>
       		<td>{{$users->firstname}}</td>
       		<td>{{$users->lastname}}</td>
       		<td>{{$users->middlename}}</td>
       		<td>{{$users->Address}}</td>
       		<td><a href="/User/Edit/{{$users->id}}">edit</a> / <a href="/User/Delete/{{$users->id}}">delete</a></td>
       </tr>
       @endforeach
       </table>
    </body>
</html>
