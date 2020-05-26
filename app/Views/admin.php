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

    <div class= col-sm-6>
    <button type="button" onclick="addProduct()">Add product</button>
    <button type="button" onclick="removeProduct()">Remove product</button>
    <button type="button" onclick="removeUser()">Remove user</button>
    </div>
    
    <div class="container" id="addProduct" style="display:none">
        <form action="/public/home/addProduct" method="post">
            <label for="pname"><b>Name of the product</b></label>
            <input type="text" placeholder="Enter a product name" name="pname" required>

            <label for="price"><b>Price</b></label>
            <input type="text" placeholder="Enter a price" name="price" required>

            <label for="description"><b>Description</b></label>
            <input type="text" placeholder="Enter a description" name="description" required>

            <label for="link"><b>Link</b></label>
            <input type="text" placeholder="Enter Link" name="link" required>

            <label for="imgnumber"><b>Number of the image</b></label>
            <input type="number" placeholder="Enter a number" name="imgnumber" required>

            </label>
            <input type="submit" value="Send">
        </form>
    </div>

    <div class="container" id="removeProduct" style="display:none">
        <form action="/public/home/removeProduct" method="post">
            <label for="imgnumber"><b>Number of the image</b></label>
                <input type="number" placeholder="Enter a number" name="imgnumber" required>
            </label>
            <input type="submit" value="Send">
        </form>
    </div>

    <div class="container" id="removeUser" style="display:none">
        <form action="/public/home/removeUser" method="post">

            <label for="mail"><b>E-mail</b></label>
                <input type="email" placeholder="Enter E-mail" name="mail" required>
            </label>
            <input type="submit" value="Send">
        </form>
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