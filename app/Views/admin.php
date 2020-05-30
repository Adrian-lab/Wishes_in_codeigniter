<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--<link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sticky-footer-navbar/">-->

	<!--<link rel="stylesheet" type="text/css" href="../public/Assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="../public/Assets/css/bootstrap.min.css">-->

    <title>Admin</title>
</head>
<body>
    <br><br><br>

    <?php 
        if (strcmp($info, "ok") ==0){
            ?>
                <div class="warning" style="width:100%; height:20px; background-color:green; position:absolute; top:61px;">
                    <p>Data has been successfully removed</p>
                </div>

            <?php
        }

        if (strcmp($info, "noexist") == 0){
            ?>
                 <div class="warning" style="width:100%; height:20px; background-color:red; position:absolute; top:61px;">
                    <p>The given data does not exist! Please try again</p>
                </div>
            <?php
        }?>
    <div class= col-sm-12>
        <h1>Administration panel</h1>
        <hr>
        <button type="button" onclick="addProduct()">Add product</button>
        <button type="button" onclick="removeProduct()">Remove product</button>
        <button type="button" onclick="removeUser()">Remove user</button>

        <div class="container col-sm-6" id="addProduct" style="display:none; background-color:#F2F2F2; padding:50px; margin-top:10px;">
            <form action="/public/home/addProduct" method="post">
                <label for="pname"><b>Name of the product:</b></label>
                <input type="text" placeholder="Enter a product name" name="pname" required>
                <br>
                <label for="price" style="margin-left:21.5%;"><b>Price:</b></label>
                <input type="text" placeholder="Enter a price" name="price" required>
                <br>
                <label for="description" style="margin-left:13%;"><b>Description:</b></label>
                <input type="text" placeholder="Enter a description" name="description" required>
                <br>
                <label for="link" style="margin-left:23%;"><b>Link:</b></label>
                <input type="text" placeholder="Enter Link" name="link" required>
                <br>
                <label for="imgnumber"><b>Number of the image:</b></label>
                <input type="number" placeholder="Enter a number" name="imgnumber" required>
                <br>
                </label>
                <input type="submit" style="margin-left:30.5%;margin-top: 10px; border: none; background-color: black; color: white; padding: 8px 20px 8px 20px;" value="Send">
            </form>
        </div>

        <div class="container col-sm-6" id="removeProduct" style="display:none; background-color:#F2F2F2; padding:50px; margin-top:10px;">
            <form action="/public/home/removeProduct" method="post">
                <label for="imgnumber"><b>Number of the image:</b></label>
                    <input type="number" placeholder="Enter a number" name="imgnumber" required><br>
                </label>
                <input type="submit" style="margin-left:30%;margin-top: 10px; border: none; background-color: black; color: white; padding: 8px 20px 8px 20px;" value="Send">
            </form>
        </div>

        <div class="container col-sm-6" id="removeUser" style="display:none; background-color:#F2F2F2; padding:50px; margin-top:10px;">
            <form action="/public/home/removeUser" method="post">
                <label for="mail"><b>E-mail:</b></label>
                    <input type="email" placeholder="Enter E-mail" name="mail" required><br>
                </label>
                <input type="submit" style="margin-left:10%;margin-top: 10px; border: none; background-color: black; color: white; padding: 8px 20px 8px 20px;" value="Send">
            </form>
        </div>

    </div>

    <script>
        function addProduct() {
            document.getElementById("addProduct").style.display = "block";
            document.getElementById("removeProduct").style.display = "none";
            document.getElementById("removeUser").style.display = "none";
        }

        function removeProduct() {
            document.getElementById("addProduct").style.display = "none";
            document.getElementById("removeProduct").style.display = "block";
            document.getElementById("removeUser").style.display = "none";
        }

        function removeUser() {
            document.getElementById("addProduct").style.display = "none";
            document.getElementById("removeProduct").style.display = "none";
            document.getElementById("removeUser").style.display = "block";
        }
    </script>

</body>
</html>