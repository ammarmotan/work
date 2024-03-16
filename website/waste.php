<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">

               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
            <?php while($data=mysqli_fetch_assoc($res)) { ?>
              

               
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           <?php echo $data['pro_name'] ?>
                           </a>
                           <?php if(isset($_SESSION['Username'])){
                              ?>
                              <form action="pro.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $data['pro_id'] ?>">
                           <button type="submit" name="submit" class="option2">
                           Buy Now
            </button>
            </form>
                           <?php }else{?>
                              <button type="submit" name="submit" class="option2">
                         <a href="Login.php">Buy Now</a>
            </button>   
            <?php } ?> 
                           
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="<?php echo $data['pro_image'] ?>" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        <?php echo $data['pro_name'] ?>
                        </h5>
                        <h6>
                        <?php echo $data['price'] ?>
                        </h6>
                        <h6>
                        <?php echo $data['cat_name'] ?>
                        </h6>
                     </div>
                  </div>
               </div>
        
               <?php } ?>


           
            
             
            


            
              
            </div>
            <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
         </div>
      </section>