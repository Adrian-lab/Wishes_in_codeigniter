<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product profile</title>
</head>
<body>

    <br><br><br><br><br>
    <a>This is a profile my nigga</a>

    <div class="col-sm-8">
        <div class="col-sm-6">
            <a>Name: <?php echo $_SESSION["name"]; ?></a><br>
            <a>Surname: <?php echo $surname; ?></a><br>
            <a>Age: <?php echo $age; ?></a><br>
            <a>Email: <?php echo $_SESSION["email"]; ?></a>
        </div>
    </div>

</body>
</html>