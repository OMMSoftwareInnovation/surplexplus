<style type="text/css">
.ab:hover
{
    background-color: #f1f1f1 !important;
}.thumbnail
{
    min-height: 275px;
}
</style>
 <div class="main">

<div class="row" style="margin: 0px;">
	<div class="col-md-12">
   
		<div>
			<div class="well well-sm" style="border-radius: 1px;">
		        <strong style="margin-left: 280px;">View: </strong>
		        <div class="btn-group">
		            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
		            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
		                class="glyphicon glyphicon-th"></span>Grid</a>
		        </div>
		    </div>
    
		    <div id="products" class="row list-group">
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
                    <div class="item  col-xs-3 col-lg-3">
                            <div class="thumbnail">

                                <img class="group list-group-image" src="<?php echo base_url(); ?>/files/thumbnail/<?php echo $product[$i]['product_main_img'] ?>" onMouseOver="this.setAttribute('src', '<?php echo base_url(); ?>/files/<?php echo $mm; ?>');" onMouseOut="this.setAttribute('src', '<?php echo base_url(); ?>/files/<?php echo $product[$i]['product_main_img'] ?>');" style="height: 170px;width: 250px;margin-top: 0px; " alt="" />
                                <div class="caption" style="    padding-bottom: 0px;">
                                    <h5 class="group inner list-group-item-heading">

                                        <?php 
                                             $name=$product[$i]["product_name"];
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
                                                    if ($product[$i]['product_type'] == '1') 
                                                    {
                                                        echo "<h4 class='lead'>";
                                                        echo "Rs.".$product[$i]['product_price'];
                                                        echo "</h4>";
                                                    }
                                                ?>
                                                <?php 
                                                    if ($product[$i]['product_type'] != '1') 
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
                }            
                ?>
      
    </div>
</div>
</div>
</div>

 </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>
