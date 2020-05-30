<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

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
    <!-- Header -->
<div class="header" id="myHeader">
  <h1>All your Wishes</h1>
  <hr>
</div>

<!-- Photo Grid -->
<div class="row"> 
  <div class="column">
    <?php 
    if(strcmp($info, "exists") == 0){
      ?>
      <div class="warning" style="width:100%; height:20px; background-color:orange; position:absolute; top:61px;">
        <p style="padding-left:10px;">This product is already in your wishlist</p>
      </div>
      <?php
    }else{
      if(strcmp($info, "ok") == 0){
        ?>
        <div class="warning" style="width:100%; height:20px; background-color:green; position:absolute; top:61px;">
          <p style="padding-left:10px;">Good choice! Product added to your wishlist!</p>
        </div>
        <?php
      }
    }
    
    foreach ($products as $row){
    ?>
    <div class="container col-sm-12">
        <img src="../../public/assets/img/<?php echo $row?>.jpg" alt="Imagen producto" style="width:50%; border-style:solid; border-color:grey;">
        <button  class="btn" role="link" onclick="window.location='product?arg=<?php echo $row?>'">Profile</button>
        <?php 
         if (isset($_SESSION['name'])){?>
          <button class="btn" role="link" onclick="window.location='wish?arg=<?php echo $row?>'">Wish</button>
   <?php }?>
    </div>
    <?php
    }
    ?>
    
  </div>  

</div>

</body>
</html>