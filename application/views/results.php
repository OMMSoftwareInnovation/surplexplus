<div class="main">
    <div class="row">
        <div class="col-md-12">
            <div id="products" class="row list-group">
         <?php  
                  if(isset($product))
                  {
                      $mm="";
                      $img = $product[0]['product_imgs'];
                      $img1 = explode(",",$img);
                        if(count($img1)>1)
                        {
                        if( $img1[1]==$product[0]['product_main_img'])
                        {
                            $mm=(isset($img1[2]))? $img1[2]:$img1[1]; 
                        }else{
                           $mm=$img1[1]; 
            
                         }
                        }

              ?>    
                <?php 
                    if ($product[0]['product_type'] == '1') 
                    {
                ?>
                     <a href="<?php echo site_url('salecontroller/pricedsaleproduct');?>/<?php echo $product[0]['product_id']?>">

                <?php
                    }
                    else
                    {
                ?>
                    <a href="<?php echo site_url('salecontroller/onrequestsaleproduct');?>/<?php echo $product[0]['product_id']?>">

                <?php
                    }
                 ?>
                    <div class="item  col-xs-4 col-lg-4"></div>
                    <div class="item  col-xs-3 col-lg-3">
                            <div class="thumbnail">

                                <img class="group list-group-image" src="<?php echo base_url(); ?>/files/thumbnail/<?php echo $product[0]['product_main_img'] ?>" onMouseOver="this.setAttribute('src', '<?php echo base_url(); ?>/files/<?php echo $mm; ?>');" onMouseOut="this.setAttribute('src', '<?php echo base_url(); ?>/files/<?php echo $product[0]['product_main_img'] ?>');" style="height: 170px;width: 237px;margin-top: 5px;" alt="" />

                                <div class="caption" style="    padding-bottom: 0px;">
                                    <h5 class="group inner list-group-item-heading">

                                        <?php 
                                             $name=$product[0]["product_name"];
                                             $length=strlen($name);
                                            if ($length>60)
                                            {
                                                echo substr($name,0,59)."...";
                                            }
                                            else
                                            {
                                                echo $name;
                                            }
                                        ?>
                                           
                                    </h5>

                                    <div class="row">
                                        <div class="col-xs-12 col-md-12"  ">
                                           
                                                <?php 
                                                    if ($product[0]['product_type'] == '1') 
                                                    {
                                                        echo "<h4 class='lead'>";
                                                        echo "Rs.".$product[0]['product_price'];
                                                        echo "</h4>";
                                                    }
                                                ?>
                                                <?php 
                                                    if ($product[0]['product_type'] != '1') 
                                                    {
                                                

                        ?>
                             <p class="lead">    
                                        <?php
        echo "On request!";
                                                    }
                                                ?>
                                              </p>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
            
              <?php
                }            
                ?>
    </div>
</div>
</div>
</div>
</div>