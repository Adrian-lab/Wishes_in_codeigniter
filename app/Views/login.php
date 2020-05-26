<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--<link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sticky-footer-navbar/">-->

	<!--<link rel="stylesheet" type="text/css" href="../public/Assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="../public/Assets/css/bootstrap.min.css">-->

    <title>Login</title>
</head>
<body>
    <br><br><br>
    
    <div class="container">
        <form action="/public/home/user" method="post">
            <label for="uname"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            <input type="submit" value="Login">
        </form>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
    </form>

</body>
</html>