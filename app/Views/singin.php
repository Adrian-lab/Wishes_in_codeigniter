<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--<link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sticky-footer-navbar/">-->

	<!--<link rel="stylesheet" type="text/css" href="../public/Assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="../public/Assets/css/bootstrap.min.css">-->

    <title>Sing in</title>
</head>
<body>
    <br><br><br>

    <div class= col-sm-12>
    <h1>Sign In</h1>
    <hr>

        <div class="container col-sm-6" style="background-color:#F2F2F2; padding:50px;">
            <form action="/public/home/newuser" class="text-left" method="post">
                <label for="uname"><b>Username:</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
                <br>
                <label style="margin-left:2%; for="surname"><b>Surname:</b></label>
                <input type="text" placeholder="Enter Surname" name="sname" required>
                <br>
                <label style="margin-left:8.5%; for="age"><b>Age: </b></label>
                <input type="number" placeholder="Enter your Age" name="age" required>
                <br>
                <label style="margin-left:6%; for="mail"><b>E-mail:</b></label>
                <input type="email" placeholder="Enter E-mail" name="mail" required>
                <br>
                <label style="margin-left:2%; for="psw"><b>Password:</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <br>
                </label>
                <input type="submit" style="margin-left:16%;margin-top: 10px; border: none; background-color: black; color: white; padding: 8px 20px 8px 20px;" value="Send">
            </form>
        </div>

    </div>

</body>
</html>