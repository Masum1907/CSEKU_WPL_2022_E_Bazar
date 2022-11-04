<div class="product_box">
            <div class="cards">
                <div class="card">
                    <i class="fa fa-users" style="font-size: 70px;padding:10px;"></i>
                    <h2 >Total Customers</h4>
                    <h1 style="color:red;">
                    <?php
                        $sql="SELECT * from customers ";
                        $result=$con-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h5>
                
            </div>
            <div class="card">
                    <i class="fa fa-users" style="font-size: 70px;padding:10px;"></i>
                    <h2 >Total Vendors</h4>
                    <h1 style="color:red;">
                    <?php
                        $sql="SELECT * from vendors ";
                        $result=$con-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h5>
                
            </div>
            
                <div class="card">
                    <i class="fa fa-th-large" style="font-size: 70px;padding:10px;"></i>
                    <h2>Total Categories</h4>
                    <h1 style="color:red;">
                    <?php
                       
                       $sql="SELECT * from categories";
                       $result=$con-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
            
            </div>
            
            <div class="card">
                    <i class="fa fa-th" style="font-size: 70px;padding:10px;"></i>
                    <h2>Total Products</h4>
                    <h1 style="color:red;">
                    <?php
                       
                       $sql="SELECT * from products";
                       $result=$con-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                
            </div>
            <div class="card">
                    <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 70px;padding:10px;"></i>
                    <h2 >Total Orders</h4>
                    <h1 style="color:red;">
                    <?php
                        $sql="SELECT * from orders ";
                        $result=$con-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h5>
                
            </div>
            <div class="card">
            <i class="fa-solid fa-truck"style="font-size: 70px;padding:10px;"></i>
                    <h2 >Total Sale</h4>
                    <h1 style="color:red;">
                    <?php
                        $sql="SELECT SUM(qty)as total_qty from order_new";
                        $result=$con-> query($sql);
                        $row=mysqli_fetch_array($result);
                               
                                $sum = $row['total_qty'];
                                
                                
                         echo $sum;
                    ?></h5>
                
            </div>
            
            
            
        </div>
        
  
        </div>  