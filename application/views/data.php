<?php  
                  if(isset($product))
                  {
                    for($i=0;$i<count($product);$i++)
                    {
                      $mm="";
                      $img = $product[$i]['product_imgs'];
                      $img1 = explode(",",$img);
                        if(count($img1)>1)
                        {
                        if( $img1[1]==$product[$i]['product_main_img'])
                        {
                            $mm=(isset($img1[2]))? $img1[2]:$img1[1]; 
                        }else{
                           $mm=$img1[1]; 
            
                         }
                        }

              ?>    
                <?php 
                    if ($product[$i]['product_type'] == '1') 
                    {
                ?>
                     <a href="<?php echo site_url('salecontroller/pricedsaleproduct');?>/<?php echo $product[$i]['product_id']?>">

                <?php
                    }
                    else
                    {
                ?>
                    <a href="<?php echo site_url('salecontroller/onrequestsaleproduct');?>/<?php echo $product[$i]['product_id']?>">

                <?php
                    }
                 ?>
                    <div class="item  col-xs-4 col-lg-4">
                            <div class="thumbnail">

                                <img class="group list-group-image" src="<?php echo base_url(); ?>/files/thumbnail/<?php echo $product[$i]['product_main_img'] ?>" onMouseOver="this.setAttribute('src', '<?php echo base_url(); ?>/files/<?php echo $mm; ?>');" onMouseOut="this.setAttribute('src', '<?php echo base_url(); ?>/files/<?php echo $product[$i]['product_main_img'] ?>');" alt="" />
<!-- 
                                
                                <img class="group list-group-image" src="<?php echo base_url().'files/thumbnail/'.$product[$i]['product_main_img']; ?>"  alt="" style="height: 170px;width: 237px;margin-top: -11px; " /> -->
                                <div class="caption" style="    padding-bottom: 0px;">
                                    <h5 class="group inner list-group-item-heading">

                                        <?php 
                                             $name=$product[$i]["product_name"];
                                             $length=strlen($name);
                                            if ($length>35)
                                            {
                                               // echo word_limiter($name, 4);
                                                echo substr($name,0,40)."...";
                                            }
                                            else
                                            {
                                                echo $name;
                                            } 
                                        ?>
                                           
                                    </h5>

                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                           <?php 
                                            if ($product[$i]['product_type'] == '1') 
                                            {
                                                echo "<h4 class='lead'>";
                                                echo "₹  ".$product[$i]['product_price'];
                                                echo "</h4>";
                                            }
                                            ?>
                                            <?php 
                                            if ($product[$i]['product_type'] != '1') 
                                            {
                                                echo "<h4 class='lead'>";
                                                echo "On Request!";
                                                echo "</h4>";
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
                }            
                ?>