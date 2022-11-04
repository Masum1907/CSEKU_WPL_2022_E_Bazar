<div class="footer">
        <div class="main-content">
            <div class="left box">
                <h2>About Us</h2>  
                <div class="content">
                    <p> We are the students of CSE Discipline,Khulna University.This website has
                  been built under<b> Web Programming Laboratory CSE-3200 </b>course.</p>
                    <div class="social">
                        
                    
                    <a href="https://www.facebook.com/masumrayhankhulnauniversity/"><span class="fab fa-facebook-f"></span></a>
                    <a href="https://twitter.com/MasumRayhan10"><span class="fab fa-twitter"></span></a>
                    <a href="https://www.instagram.com/accounts/login/"><span class="fab fa-instagram"></span></a>
                    <a href="https://www.youtube.com/c/MasumRayhan"><span class="fab fa-youtube"></span></a>
                    
                    </div>
                </div>
            </div>

            <div class="center-left box">
                <h2>Address</h2>
                    <div class="content">
                        <div class="place">
                            <span class="fas fa-map-marker-alt"></span>
                            <span class="text">Khulna,Bangladesh</span>

                        </div>
                        <div class="phone">
                            <span class="fas fa-phone-alt"></span>
                            <span class="text">+880 1709-115882</span>

                        </div>
                        <div class="email">
                            <span class="fas fa-envelope"></span>
                            <span class="text">wplebazar@gmail.com</span>

                        </div>
                    </div>


            </div>



            

                <div class="center-right box">
                    <h2> Quick links</h2>
                    <div class="content">
              <ul>      
            <li><a href="index.php">Home</a></li>
            <li><a href="all_products.php">All products</a></li>
            <li><a href="my_account.php">My account</a></li>
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
                </ul>
                    
                </div>
                    </div>

                <div class="right box">
                    <h2> Subscribe to our newsletter</h2>
                    <div class="content">
                        <form method = "post"action="">
                            <div class="email">
                         
                                <div class="text">Email *</div>
                                <input type="email"name="email" />
                            </div>
                            
                        
                        <input type="submit"style="float:left;color:black;padding:5px;background:skyblue;"name="subscribe"value="Subscribe"/>
                    </form>
                </div>
                </div>
        </div>
    </div>



        
</div>
</body>
</html>
<?php 
if(isset($_POST['subscribe'])){  
  
   $email = $_POST['email'];
  $c_email=$_SESSION['customer_email'];
   
   $check_exist = mysqli_query($con,"select * from subscriber where customer_email = '$c_email'");
   
   $email_count = mysqli_num_rows($check_exist);
   
   $row_register = mysqli_fetch_array($check_exist);
   
   if($email_count > 0){
   
   echo "<script>alert('Hey!!, your  already subscribe !')</script>";
   
   }else{
	 $sub = mysqli_query($con,"insert into subscriber (customer_email) values('$c_email')");
	 
	 if($sub){
	 echo "<script>alert('Subscription successfull!')</script>";
	 
	 echo "<script>window.open('index.php,'_self')</script>";
	 
	 }
	 
	}
	
  
}

?>




  
