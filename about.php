<!DOCTYPE html>

<html lang="en">
<?php 
session_start();
include("functions/functions.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style6.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css   "/>
     <title>index</title>
</head>
<body>

<div class="main_wrapper">
    
        <div class="header_wrapper">

            <img id="logo"src="images/img.png" >
          

        </div>

        <div class="menubar">
            
        <ul id="menu" >
        <li><a href="index.php" >Home</a></li>
            <li><a href="all_products.php">All products</a></li>
            <li><a href="my_account.php">My account</a></li>         
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php"style="color:black;font-weight:bolder;">About Us</a></li>
        </ul>
        <div id="form">
            <form method="grt" action="results.php"enctype="multipart/form-data">
            <input type="text"name="user_query" placeholder="Search product...">
            <button ><input type="submit"name="search"value="search"></button>         </form>
        </div>
        
 
        </div>

   <div class="content_wrapper">
            
            <div id="sidebar">
                
            <img src="images/s.jpg" alt="" style="width:300px;height:auto;">  
            <img src="images/m.jpg" alt="" style="width:300px;height:auto;">  
        
            </div>

            <div id="content_area">
            
            <section id="about-section">
            

            <div class="about-right">
              
                <h1>Our Story</h1>
                <p>
                  We are the students of CSE Discipline,Khulna University.This website has
                  been built under<b> Web Programming Laboratory CSE-3200 </b>course.
                </p>
                <div class="address">
                    <ul>
                        <li>
                            <span class="address-logo">
                                <i class="fas fa-paper-plane"></i>
                            </span>
                            <p>Address</p>
                            <span class="saprater">:</span>
                            <p>Khulna,Bangladesh</p>
                        </li>
                        <li>
                            <span class="address-logo">
                                <i class="fas fa-phone-alt"></i>
                            </span>
                            <p>Phone No</p>
                            <span class="saprater">:</span>
                            <p>+880 1515212179</p>
                        </li>
                        <li>
                            <span class="address-logo">
                                <i class="far fa-envelope"></i>
                            </span>
                            <p>Email ID</p>
                            <span class="saprater">:</span>
                            <p>wplebazar@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <div class="expertise">
                    <h3>Frontend</h3>
                    <ul>
                        <li>
                            <span class="expertise-logo">
                                <i class="fab fa-html5"></i>
                            </span>
                            <p>HTML</p>
                        </li>
                        <li>
                            <span class="expertise-logo">
                                <i class="fab fa-css3-alt"></i>
                            </span>
                            <p>CSS</p>
                        </li>
                        
                        
                    </ul>
                </div>
                <div class="expertise">
                    <h3>Backend</h3>
                    <ul>
                        <li>
                            <span class="expertise-logo">
                            <i class="fa-brands fa-php"></i>
                            </span>
                            <p>PHP: MySQL Database</p>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </section>

            </div>
        

</div>


<?php include ('footer.php'); ?>


