<?php
session_start();
$servername = "127.0.0.1";
               $username = "root";
               $password = "root123";
               $dbname = "boeken";
               // Create connection
               $conn = new mysqli($servername, $username, $password, $dbname);
               // Check connection
               if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
               }
$status="";
if (!isset($_SESSION['username'])) { 
   $_SESSION['msg'] = "You have to log in first"; 
  // header('location: main.php'); 
} 

if (isset($_GET['logout'])) { 
   session_destroy(); 
   unset($_SESSION['username']); 
 //  header("location: main.php"); 
} 




if (isset($_POST['BId']) && $_POST['BId']!=""){
$BId = $_POST['BId'];
$result = mysqli_query($conn, "SELECT * FROM `bookmaster` WHERE `BId`='$BId'");
$row = mysqli_fetch_assoc($result);
$Title = $row['Title'];
$BId = $row['BId'];
$Price = $row['Price'];
$Image = $row['Image'];

$cartArray = array(
 $BId=>array(
 'Title'=>$Title,
 'BId'=>$BId,
 'Price'=>$Price,
 'quantity'=>1,
 'Image'=>$Image)
);
 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    //print_r($_SESSION["shopping_cart"]);
    $status = "<div class='box'>First Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($BId,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>"; 
    } else {
        
    $_SESSION["shopping_cart"] = array_replace($_SESSION["shopping_cart"],$cartArray);
    //print_r(array_replace($_SESSION["shopping_cart"],$cartArray));
    $status = "<div class='box'>Product is added to your cart!</div>";
 }
 
 }
//print_r($_SESSION["shopping_cart"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="css/common.css">
      <link rel="stylesheet" type="text/css" href="cartcss.css">
      <script src="script/nav.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         .card {
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 550px;
  min-height:650px;
  margin: auto;
  margin-bottom: 20px;
  text-align: center;
  font-family: arial;
  padding: 15px;
}

.price {
  color: grey;
  font-size: 22px;
  padding: 15px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  text-decoration: none;
  cursor: pointer;
  width:90% ;
  font-size: 18px;
  display: inline-block;
  margin: 20px;
}
.card button:hover {
  opacity: 0.7;
}
#imagebox {
   width: 350px;
     height: 400px;
     float: center;
     padding: 15px;
}
#desc{
  font-family:Arial,Helvetica,sans-serif;
}
      </style>      
      <title>Boeken</title>
      <link rel="icon" href="image/bookshelf.png" type="image/gif" sizes="16x16">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;900&display=swap" rel="stylesheet">
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
      <section class="top_books">
        <br>
         <div class="row" style="padding-left: 20px;">
<?php

$sql="SELECT * FROM `bookmaster` WHERE BId=".$_GET['id'];
$id=$_GET['id'];
$result = $conn->query($sql);?>
<div class="card">
<?php
 if ($result->num_rows > 0) {
  //   output data of each row
    while($row = $result->fetch_assoc()) { ?>
      <form method='post' action=''>
        <input type='hidden' name='BId' value="<?=$id ?>" />
        <img id="imagebox" src="<?php echo $row["Image"];?>  "/>
        <h1><?php echo $row["Title"];?></h1>
		<p class="price">Price Rs.<?php echo $row["Price"];?></p>
		<p ><?php echo $row["Description"];?></p>
		<?php if (isset($_SESSION['username'])) { ?>
    <?php echo "<button type='submit' class='buy'>Add to Cart</button>" ?>
    <?php } ?>
    <?php if (!isset($_SESSION['username'])) { ?>
    <?php echo "<button><a href='login.php'style='text-decoration:none; color: white;'> Login to Buy!</a></button>" ?>
    <?php } ?>
    <div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

		
	<?php
    }
} else {
   echo "0 results";
}
?>


      </section>
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