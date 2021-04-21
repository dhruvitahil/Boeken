<?php
session_start();

if (!isset($_SESSION['username'])) { 
   $_SESSION['msg'] = "You have to log in first"; 
   //header('location: main.php'); 
} 

if (isset($_GET['logout'])) { 
   session_destroy(); 
   unset($_SESSION['username']); 
   //header("location: main.php"); 
} 

$status = "";
if (isset($_POST['action']) && $_POST['action'] == "remove")
{
    if (!empty($_SESSION["shopping_cart"]))
    {
        foreach ($_SESSION["shopping_cart"] as $key => $value)
        {
          
            if ($_POST["BId"] == $key)
            {
                unset($_SESSION["shopping_cart"][$key]);
                $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
            }
            if (empty($_SESSION["shopping_cart"])) unset($_SESSION["shopping_cart"]);
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change")
{
    foreach ($_SESSION["shopping_cart"] as & $value)
    {
        if ($value['BId'] === $_POST["BId"])
        {
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product
            
        }
    }

}
?>
<!DOCTYPE html>
<html>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="css/common.css">
      <link rel="stylesheet" type="text/css" href="cartcss.css">
      <script src="script/nav.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src='https://kit.fontawesome.com/a076d05399.js'></script>
      <style>
         .card {
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 550px;
  min-height:650px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

#imagebox {
   width: 350px;
     height: 400px;
     float: center;
}
#desc{
  font-family:Arial,Helvetica,sans-serif;
}
      </style>      
      <title>Boeken</title>
      <link rel="icon" href="image/bookshelf.png" type="image/gif" sizes="16x16">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;900&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>
   <body>
      <section class="nav">
         <div class="container">
            <nav class="topnav" id="myTopnav">
               <span><a href="main.php" style="text-decoration: none; color: white;"> Boeken</a></span>
               <?php
               if (!isset($_SESSION['username'])) {?>
                  <a href="login.php" class="navbar">Login</a>
                  <a href="register.php" class="navbar">Sign up</a>
                  <a href="about.php" class="navbar">About Us</a>
                  <a href="books.php" class="navbar">Books</a>
               <?php } ?>
               <?php if (isset($_SESSION['username'])) { ?>
                  <a href="main.php?logout=1" class="navbar">Logout</a>
                  <a href="about.php" class="navbar">About Us</a>
                  <a href="books.php" class="navbar">Books</a>
               <?php } ?>
               <a href="javascript:void(0);"  class="navbar icon" onclick="myFunction()">
               <i class="fa fa-bars"></i>
               </a>
            </nav>
         </div>
      </section>
      <nav id="container1">
         <a href="fiction.php" class="navbar1">Fiction</a>
         <a href="nonfiction.php" class="navbar1">Non-Fiction</a>
         <a href="fantasy.php" class="navbar1">Fantasy</a>
         <a href="adventure.php" class="navbar1">Adventure</a>
         <a href="suspense.php" class="navbar1">Suspense</a>
         <p><?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" class="cart-icon" /> Cart<span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>
<form method="POST" action="search.php" style="float:right;">
            <input type="text" class="search"  placeholder="Search.." name="search">
            <button type="submit" class="searchButton" style="margin-right: 5px; ">Submit</button>
         </form>

</p> 
      </nav>
      <div class="cart">
    <?php
    if (isset($_SESSION["shopping_cart"]))
    {
      $total_price = 0;
    ?>
      <table class="table" style="text-align: center;">
        <tbody>
          <tr>
            <td></td>
            <td>ITEM NAME</td>
            <td>QUANTITY</td>
            <td>UNIT PRICE</td>
            <td>ITEMS TOTAL</td>
          </tr>
          <?php
            foreach ($_SESSION["shopping_cart"] as $product)
            {
            ?>
            <tr>
              <td> <img src='<?php echo $product["Image"]; ?>' width="150" height="200" /> </td>
              <td>
                <?php echo $product["Title"]; ?>
                  <br/>
                  <form method='post' action=''>
                    <input type='hidden' name='BId' value="<?php echo $product["BId"]; ?>" />
                    <input type='hidden' name='action' value="remove" />
                    <button type='submit' class='remove'>Remove Item</button>
                  </form>
              </td>
              <td>
                <form method='post' action=''>
                  <input type='hidden' name='BId' value="<?php echo $product["BId"]; ?>" />
                  <input type='hidden' name='action' value="change" />
                  <select name='quantity' class='quantity' onChange="this.form.submit()">
                    <option <?php if ($product[ "quantity"]==1 ) echo "selected"; ?> value="1">1</option>
                    <option <?php if ($product[ "quantity"]==2 ) echo "selected"; ?> value="2">2</option>
                    <option <?php if ($product[ "quantity"]==3 ) echo "selected"; ?> value="3">3</option>
                    <option <?php if ($product[ "quantity"]==4 ) echo "selected"; ?> value="4">4</option>
                    <option <?php if ($product[ "quantity"]==5 ) echo "selected"; ?> value="5">5</option>
                  </select>
                </form>
              </td>
              <td>
                <?php echo "Rs." . $product["Price"]; ?>
              </td>
              <td>
                <?php echo "Rs." . $product["Price"] * $product["quantity"]; ?>
              </td>
            </tr>
            <?php
                $total_price += ($product["Price"] * $product["quantity"]);
              }
            ?>
              <tr>
                <td colspan="5" align="right"> <strong>TOTAL: <?php echo "Rs." . $total_price; ?></strong> </td>
              </tr>
              
        </tbody>
      </table>
      <?php
        }
        else
        {
          ?>
          <div style="display:inline-block;vertical-align:middle;">
            <img src="image/emptycart.gif">
          </div>
          <div style="display:inline-block; vertical-align: middle;">
            <div style="color: #989898; font-size: 40px; font-family: sans-serif;">Your Cart is empty <i class='far fa-frown' style='font-size:40px'></i></div>
          </div>
          
          <?php
        }
      ?> 
      </div>
      <div>
        <?php
        if (!empty($_SESSION["shopping_cart"])) {?>
        <?php include 'ship.php';?>
         
    <?php } ?> 
      </div>
    <div style="clear:both;"></div>
    <div class="message_box" style="margin:10px 0px;">
    <?php echo $status; ?> &nbsp;
    </div>
      <footer>
         <div class="row">
            <div class="col-4 col-s-4">
         <p>About Us</p><br>
            <p style="word-wrap: normal; width: 300px; text-align: justify;">We deliver our goods worldwide. No matter where you live, your order will be shipped in time and delivered right to your door or to any other location you have stated. The packages are handled with utmost care, so the ordered products will be handed to you safe and sound, just like you expect them to be.</p>  
            </div>
            <div class="col-4 col-s-4">
         <p>Contact Us</p><br>
            <p><i class="fa fa-fw fa-map-marker"></i>  Booken</p>
            <p><i class="fa fa-fw fa-phone"></i>   +1228546983</p>
            <p><i class="fa fa-fw fa-envelope"></i>   Booken@official.com</p>
            </div>
            <div class="col-4 col-s-4">
          <p>Join Us</p><br>
            <i class="fa fa-facebook-official socialicon"></i>
        <i class="fa fa-instagram socialicon"></i>
        <i class="fa fa-snapchat socialicon"></i>
        <i class="fa fa-pinterest-p socialicon"></i>
        <i class="fa fa-twitter socialicon"></i>
        <i class="fa fa-linkedin socialicon"></i>
        
            </div>
                <div class="col-12 col-s-12">
         <center>Powered by<span> <a style="color:white;" href="main.php">Booken   </a><i class="far fa-copyright"></i></span></center> 
      </div>
      
         </div>
      </footer>
      <script>
         window.onscroll = function() {myFunction()};
         
         var navbar = document.getElementById("container1");
         var sticky = navbar.offsetTop;
         
         function myFunction() {
           if (window.pageYOffset >= sticky) {
             navbar.classList.add("sticky")
           } else {
             navbar.classList.remove("sticky");
           }
         }  
      </script>
  </body>
</html>