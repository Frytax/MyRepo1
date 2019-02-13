<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - ToDoAPP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <span><h2>Welcom ToDo aplication!</h2></span>
        <form action="todo.php" method="POST">
            <input type="text" name="user" placeholder="Login" onfocus="this.placeholder=''" onblur="this.placeholder='Login'"/>
            <input type="password" name="password" placeholder="Password" onfocus="this.placeholder=''" onblur="this.placeholder='Password'"/>
            <input type="submit" name ="login" value="Login"/>
            <span>You dont have an account yet? <a href="form_registration.php">put them on!</a></span>
        </form>
       
    </div>
       

</body>
</html>