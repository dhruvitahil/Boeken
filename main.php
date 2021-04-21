<?php
session_start(); 
if (!isset($_SESSION['username'])) { 
   $_SESSION['msg'] = "You have to log in first"; 
  // header('location: main.php'); 
} 

if (isset($_GET['logout'])) { 
   session_destroy(); 
   unset($_SESSION['username']); 
 //  header("location: main.php"); 
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
  			 background-image: url("image/main1.jpg");
  		     }
           .ordermain {
  background-color: #ffffff; /* Green */
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
         .containertext {
         display: flex;
         align-items: center;
         width: 100%;
         height: 100%;
         }
         .typewriter {
             font-family: 'Sacramento', cursive;
            color: black;
            padding-left: 37%;
            display: block;
            padding-top: 130px;
         }
         .typewriter-text {
         padding-right: 10px;
         font-family: 'Sacramento', cursive;
         color: #FF5350;
         border-right: solid #ffe509 7px;
         animation: cursor 1s ease-in-out infinite;
         font-weight: bold;
         }
         @keyframes cursor {
         from { border-color: #FF5350; }
         to { border-color: transparent; }
         }

         @media (max-width: 767.98px) {
         .typewriter { font-size: 35px; }
         }
         @media (min-width: 768px) {
         .typewriter { font-size: 60px; }
         }
      </style>
      <link rel="icon" href="image/bookshelf.png" type="image/gif" sizes="16x16">
      <title>Boeken</title>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;900&display=swap" rel="stylesheet">
      <script src="script/typetext.js"></script>

   </head>
   <body>
      <section class="bg-img">
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
         <div class='containertext'>
         <p class='typewriter'>A book is a 
            <span class='typewriter-text' data-text='[ "Friend ", "Guide ","Gift","Philosopher","Dream","Motivation", "Traveller" ]'></span>
         </p>
         </div>
      </section>
      <section class="discount_info">
         <div class="row">
         <div class=" col-6 col-s-12">
            <div class="discount_img">
               <img id="main2" src="image/main2.jpg">
               <div class="centered"><a href="">  10% off on purchase of 2 books!</a></div>
            </div>
         </div>
         <div class=" col-6 col-s-12">
            <div class="card">
               <p>Boeken's Owner</p>
               <br><img src="image/left-quote.png" style="height: 20px; width:20px;"> 
               <blockquote>
                   <p>Our store is more than just another average online retailer. We sell not only top quality products, but give our customers a positive online shopping experience.</p>
               </blockquote>
               <br>
               <blockquote>
                  <p> Forget about struggling to do everything at once: taking care of the family, running your business, walking your dog, cleaning the house, doing the shopping, etc. Purchase the book you like every day or just like in a few clicks or taps, depending on the device you use to access the Internet. We work to make your life more enjoyable. Happy Reading!!</p>
               </blockquote>
            </div>
         </div>
      </section>
      <section class="row" style="padding-top: 70px;padding-bottom: 70px; background-color: #d8d8d8;">
         <i class="fas fa-truck col-3 col-s-6 " aria-hidden="true" style="font-size: 30px;text-align: center;">
         <br>Free Shipping</i>
         <i class="fas fa-calendar col-3 col-s-6 " aria-hidden="true" style="font-size: 30px;text-align: center;"><br>Money Back Guarantee</i>
         <i class="far fa-money-bill-alt col-3 col-s-6 " aria-hidden="true" style="font-size: 30px;text-align: center;"><br><b>Cash On Delivery</b></i>
         <i class="fas fa-phone col-3 col-s-6 " aria-hidden="true" style="font-size: 30px;text-align: center;"><br>For Support</i>
      </section>
      <section class="review">
         <p style="font-size: 30px;">See what customers have to say for us!</p>
         <br><br>
         <div class="row">
            <div class="col-4 col-s-12">
               <img src="image/person1.jpeg" class="Avatar" alt="Avatar" style="width:100%;">
               <p>Kate Dselvia</p>
               <img src="image/left-quote.png" style="height: 10px; width:10px;">
               <p style="font-size: 15px; text-align: justify; width: 300px;">Made a purchase at your store recently. The order has been shipped and delivered on time. The quality is superb!. The price is quite reasonable as well!!</p>
            </div>
            <div class="col-4 col-s-12">
               <img src="image/person2.jpg" class="Avatar" alt="Avatar" style="width:100%;">
               <p>Ross Geller</p>
               <img src="image/left-quote.png" style="height: 10px; width:10px;">
               <p style="font-size: 15px; text-align: justify; width: 300px;">Having distressing experience with some online shops before decided to say "THANKYOU" to all personnel of this store. You are that friendly but deliver really good products 
            in the shortest possible time. Happy with my purchase and service</p>
            </div>
            <div class="col-4 col-s-12">
               <img src="image/person3.jpg" class="Avatar" alt="Avatar" style="width:100%;">
               <p>Christy Cooper</p>
               <img src="image/left-quote.png" style="height: 10px; width:10px;">
               <p style="font-size: 15px; text-align: justify; width: 300px;">The Service of the store is very good the delivery was on time.It needs to be more user friendly .I would recommend others to buy from boeken.</p>
            </div>
         </div>
      </section>
      <section class="book_order">
         <div class="row">
         <div class="discount_img col-s-12 col-12">
            <img src="image/main6.jpg" id="book_order_img" style="min-width: 100%; max-height: 400px;">
            <div class="left">
               <p class="big">Order you Book Now</p>
               <br>
               <button class="ordermain button2" onclick="books.php">Go to catalog
               </button>
            </div>
         </div>
      </section>
      <section class="subscribe">
         <div class="row">
            <div class="col-6 col-s-12 sub_left">
               <p class="big">Want to be updated of Book Launches and discount offers?</p>
               <p>Subscribe to our mailing list if you want to be the first ones to know about your book launches and also get special discounts</p>
            </div>
            <div class="col-6 col-s-12 sub_right">
               <form class="sub_email">
                  <input type="email" placeholder="Your email address" style="border-radius: 10px; height: 40px; width: 300px;"><br>
                  <input type="submit" value="Subscribe" style="border-radius: 10px; width: 300px; ">
               </form>
            </div>
         </div>
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

      <script>  
         function myFunction() {
           var x = document.getElementById("myTopnav");
           if (x.className === "topnav") {
             x.className += " responsive";
           } else {
             x.className = "topnav";
           }
         }
      </script>
   </body>
</html>