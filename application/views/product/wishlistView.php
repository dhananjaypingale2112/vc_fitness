<?php 
  $data['page'] = "";
  $this->load->view('templates/header',$data);
  $customer_id = $this->session->userdata('customer_id');
  $total = $this->cart->total();
  //print_r($total);
?>
<div id="main"> 
      <!-- main-content starts here -->
      <div id="main-content">
        <section id="primary" class="content-full-width">
          <div class="dt-sc-hr-invisible-small"></div>
          <div class="dt-sc-hr-invisible-normal"></div>
         
          <!-- Pricintable type3 starts here -->
          <div class="fullwidth-section">
             <div class="container">
             <h3 class="border-title"> <span> Your wishlist</span> </h3>
                   
                 <form class="shopping-cart" action="#">
                <div>
                     <section>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Details</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                if($wishlist):
                                    foreach ($wishlist as $key => $items):
                                      //echo"<pre>";print_r($items);
                                ?>
                                    <tr>
                                        <td class="product-in-table">
                                            <img class="img-responsive" src="<?php echo base_url()."public/images/".$items[0]['image'];?>" alt="">
                                            <div class="product-it-in">
                                                <h3><?php echo $items[0]['name']; ?></h3>
                                                <span><?php echo empty($items[0]['meta_title'])?"":$items[0]['meta_title']; ?></span>
                                            </div> 
                                        </td>
                                        <td><?php echo $items[0]['price']; ?><input type="hidden" id="quntity_<?php echo $items[0]['product_id'];?>" value="1" readonly/></td>
                                        <td><a href="<?php echo base_url().'product/productDetails/'.$items[0]['product_id'];?>" >View Item</a></td>
                                        </td>
                                        <td><a href="#" data-toggle="tooltip" title="Add To Cart"><button class="btn-cart1 right" onclick="addToCart('<?php echo $items[0]['product_id'];?>','<?php echo $items[0]['price'];?>','<?php echo $items[0]['name'];?>','<?php echo $items[0]['image'];?>','<?php echo $items[0]['meta_title'];?>','<?php echo "delWish" ?>')" id="addToCart11"><i class="fa fa-cart-arrow-down"></i>&nbsp;Buy Item</button></a></td>
                                        
                                        <td>
                                            <button type="button" class="close" id="row_<?php echo $items[0]['product_id'];?>"><a onclick="removeWishlistItem('<?php echo $items[0]['product_id'];?>')"><span>&times;</span><a><span class="sr-only">Close</span></button>
                                        </td>
                                    </tr> 
                                  <?php 
                                    endforeach; 
                                    else:
                                  ?>
                                    <tr><td colspan="6" style="text-align: center;"><h3>Your Wishlist is Empty</h3></td><tr>
                                  <?php endif; ?>
                                  </tbody>
                            </table>
                        </div>
                    </section>
                    <div class="container">
    
 </div>
                    
                    
                      
                </div>
            </form>      
            </div>
          </div>
          
          <!-- support starts here -->
          <div class="dt-sc-hr-invisible-large"></div>
        </section>
      </div>
      <!-- main-content ends here --> 
    </div>
<?php 
  $this->load->view('templates/footer');
?>