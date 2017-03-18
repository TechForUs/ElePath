<html>
<head>
</head>

<body>

<div>

<form action="createuser" method="post">
    {{ csrf_field() }}
   name : <input type="text" name="name"  />
   Email :  <input type="text" name="email"  />
   password : <input type="password" name="password"  />
   Admin : <input type="checkbox" name="admin" value="1">
   <input type="submit" value"submit" />
</form>

</div>

</body>
</html>