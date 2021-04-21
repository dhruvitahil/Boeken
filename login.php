<?php
 
include('config.php');
session_start();
if (!isset($_SESSION['username'])) { 
   $_SESSION['msg'] = "You have to log in first"; 
   //header('location: main.php'); 
} 

if (isset($_GET['logout'])) { 
   session_destroy(); 
   unset($_SESSION['username']); 
   header("location: main.php"); 
}  
if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            #echo '<p class="success">Congratulations, you are logged in!</p>';
            header("location:main.php");  exit;
            
            exit;
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    }
}
 
?>
<!DOCTYPE html>
<html>
   <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="css/common.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Sacramento&display=swap" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://kit.fontawesome.com/f524338cfc.js" crossorigin="anonymous"></script>
      <style>
        .bg-img {
            /* The image used */
             background-image: url("image/main18.jpg");
             }
        .containerform {
  position: absolute;
  right: 0;
  margin: 50px;
  max-width: 500px;
  min-height:400px;
  padding: 16px;
  background-color: white;
}
      </style> 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;900&display=swap" rel="stylesheet">
       
      <title>Boeken</title>
      <link rel="icon" href="image/bookshelf.png" type="image/gif" sizes="16x16">
      <script src="https://kit.fontawesome.com/f524338cfc.js" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;900&display=swap" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
</head>



<body>
    <section class="bg-img" style="min-height: 900px;">
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
<form method="post" name="signin-form" class="containerform">
    <p style="padding: 20px 0px;">Enter the following feilds to login!</p>
    <hr>
    <div class="input-icons"> 
        <i class="far fa-user icon"> 
        </i> 
        <input type="text" name="username" placeholder="Enter Username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="input-icons"> 
        <i class="fas fa-key icon"> 
        </i> 
        <input type="password" placeholder="Enter Password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Log In</button>
    <p> 
            Don't have an account? 
            <a href="register.php"> 
                Register Here! 
            </a> 
        </p>
</form>
</section>
<footer>
         <div class="row">
            <div class="col-4 col-s-4">
         <p>About Us</p><br>
            <p class="footerabout">We deliver our goods worldwide. No matter where you live, your order will be shipped in time and delivered right to your door or to any other location you have stated. The packages are handled with utmost care, so the ordered products will be handed to you safe and sound, just like you expect them to be.</p>  
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
</body>
</html>