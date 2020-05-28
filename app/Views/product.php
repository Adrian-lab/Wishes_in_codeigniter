<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product profile</title>
</head>
<body>

    <br><br><br><br><br>
   
    <div class="col-sm-8">
        <h1>Profile product</h1>
        <img src="<?php echo $product_info[4];?>" style="width:50%; height:50%; border-style:solid; border-color:grey;"></img><br>
        <a>Name: <?php echo $product_info[0]; ?></a><br>
        <a>Price: <?php echo $product_info[1]; ?> €</a><br>
        <a>Description: <?php echo $product_info[2]; ?></a><br>
        <a>Link: <?php echo $product_info[3]; ?></a><br>
    </div>
    

</body>
</html>