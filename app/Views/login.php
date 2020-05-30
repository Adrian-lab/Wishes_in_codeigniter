<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--<link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sticky-footer-navbar/">-->

	<!--<link rel="stylesheet" type="text/css" href="../public/Assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="../public/Assets/css/bootstrap.min.css">-->

    <title>Login</title>

    <style>


body {
margin: 0;
font-family: Arial, Helvetica, sans-serif;
}

.header {
text-align: center;
padding: 32px;
}

.row {
display: -ms-flexbox; /* IE 10 */
display: flex;
-ms-flex-wrap: wrap; /* IE 10 */
flex-wrap: wrap;
padding: 0 4px;
}

.column {
-ms-flex: 50%; /* IE 10 */
flex: 50%;
padding: 0 4px;
}

.column img {
margin-top: 8px;
vertical-align: middle;
}

/* Style the buttons */
.btn {
border: none;
outline: none;
padding: 10px 16px;
background-color: #f1f1f1;
cursor: pointer;
font-size: 18px;
}

.btn:hover {
background-color: #ddd;
}

.btn.active {
background-color: #666;
color: white;
}

/* Container needed to position the button. Adjust the width as needed */
.container {
position: relative;
width: 50%;
}

/* Style the button and place it in the middle of the container/image */
.container .btn {
position: relative;
top: 50%;
left: 35%;
transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
background-color: #555;
color: white;
font-size: 16px;
padding: 12px 24px;
border: none;
cursor: pointer;
border-radius: 5px;
}

.container .btn:hover {
background-color: black;
}
</style>
</head>
<body>
    <br><br><br>
    
    <div class= col-sm-12>
    <h1 class="text-center">Login</h1>
    <hr>

        <div class="container col-sm-6" style="background-color:#F2F2F2; padding:50px;">
            <form action="/public/home/user" class="text-left" method="post">
                <label style="margin-left:5.5%;"for="uname"><b>Email:</b></label>
                <span><input type="email" placeholder="Enter Email" name="uname" required></span>
                <br>
                <label for="psw"><b>Password:</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <br>
                </label>
                <input type="submit" style="margin-left:14%;margin-top: 10px; border: none; background-color: black; color: white; padding: 8px 20px 8px 20px;"value="Login">
            </form>
        </div>
    </div>

</body>
</html>