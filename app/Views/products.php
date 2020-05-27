<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <style>
        * {
        box-sizing: border-box;
        }

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

        /* Create two equal columns that sits next to each other */
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

/* Make the image responsive */
.container img {
  width: 100%;
  height: auto;
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
  <p>Click on the buttons to change the grid view.</p>
  <button class="btn" onclick="one()">1</button>
  <button class="btn active" onclick="two()">2</button>
  <button class="btn" onclick="three()">3</button>
</div>

<!-- Photo Grid -->
<div class="row"> 
  <div class="column">
    <?php 

    if(strcmp($warning, "exists") == 0){
      ?>
      <div class="warning" style="width:100%; height:100px; background-color:orange;">
        <p>This product is already in your wishlist</p>
      </div>
      <?php
    }

    foreach ($products as $row){
    ?>
    <div class="container">
        <img src="../../public/assets/img/<?php echo $row?>.jpg" alt="Imagen producto">
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

<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// Full-width images
function one() {
    for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "100%";  // IE10
    elements[i].style.flex = "100%";
  }
}

// Two images side by side
function two() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "50%";  // IE10
    elements[i].style.flex = "50%";
  }
}

// Four images side by side
function three() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "33%";  // IE10
    elements[i].style.flex = "33%";
  }
}

// Add active class to the current button (highlight it)
var header = document.getElementById("myHeader");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

</script>

</body>
</html>