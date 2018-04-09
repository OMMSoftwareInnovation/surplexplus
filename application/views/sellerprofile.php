<link href="<?php echo base_url(); ?>assets/css/profile.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
<style type="text/css">
  .none
  {
    display: none;
  }
  .block
  {
    display: block;
  }
</style>
<div class="main" style="margin-bottom: 20px;">
  <section>
        <div class="container">
            <div class="row">
                <div class="board" style="height: auto;">
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                    <div class="board-inner">
                    <ul class="nav nav-tabs" id="myTab">
                    <div class="liner"></div>

                     <li><a href="#notification" data-toggle="tab" title="Notification">
                         <span class="round-tabs five" style="color: #007cff;border: 2px solid #007cff;">
                              <i class="glyphicon glyphicon-bell"></i>
                         </span> </a>
                     </li>

                     <li class="active">
                     <a href="#watchlist" data-toggle="tab" title="Add Product">
                      <span class="round-tabs one">
                         <i class="glyphicon glyphicon-plus"></i>
                      </span> 
                     </a>
                     </li>

                  <li><a href="#sold" data-toggle="tab" title="Sold">
                     <span class="round-tabs two">
                         <i class="glyphicon glyphicon-shopping-cart"></i>
                     </span>  </a>
                 </li>
                 <li><a href="#invoices" data-toggle="tab" title="Invoices">
                     <span class="round-tabs three">
                          <i class="glyphicon glyphicon-file"></i>
                     </span> </a>
                     </li>

                     <li>
                      <a href="#profile" data-toggle="tab" title="Profile">
                         <span class="round-tabs four">
                              <i class="glyphicon glyphicon-user"></i>
                         </span> 
                     </a></li>
                     
                     </ul></div>

                    <div class="tab-content">

                          <div class="tab-pane fade in active" id="watchlist">
                              <div class="modal-content">
                              <?php   if(isset($notify)){
                                echo $notify;
                              }  ?>
                                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('homecontroller/addproduct'); ?>">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Product Name</label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('product_name'); ?>
                                        <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name"  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Price Type</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="pricetype"  name="pricetype">
                                            <option value="0">Select Price Type</option>
                                            <option value="1">General Price</option>
                                            <option value="2">On Request Price</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group none" id="generalprice">
                                    <label for="email" class="col-sm-2 control-label">
                                        Product Price</label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('product_price'); ?>
                                        <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Product Price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Product summary</label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('product_summary'); ?>
                                        <input type="text" class=" chkemail form-control " id="product_summary" name="product_summary" placeholder="Product summary">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Product Description</label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('product_desc'); ?>
                                        <input type="text" class="form-control" id="product_desc" name="product_desc" placeholder="Description"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Product Item Details</label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('product_mdetails'); ?>
                                        <input type="text" class="form-control" id="product_mdetails" name="product_mdetails" placeholder="Item Details" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Product Image</label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('product_img'); ?>
                                        <input type="text" class="form-control" id="product_img" name="product_img" placeholder="" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-sm" id="seller_submit">
                                            Save</button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            Cancel</button>
                                    </div>
                                </div>
                                </form>
                              </div>
                    <hr>

                    <h3 align="center">Registered Products</h3>
                    <!-- /.box-header -->
            <div style="padding-left: 10px;padding-right: 10px;">
            <div class="box-body" style="border-top: 3px solid #d2d6de;box-shadow: 0 1px 1px rgba(0,0,0,0.1);padding: 8px;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Summary</th>
                  <th>Description</th>
                  <th>Item Details</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $cnt=1;
                for ($i=0; $i <count($product) ; $i++) 
                {
                ?>
                    <tr>
                      <td><?php echo $cnt; ?></td>
                      <td><img src="<?php echo base_url(); ?>assets/images/<?php echo $product[$i]['product_main_img'] ?>"></td>
                      <td><?php echo $product[$i]['product_name']; ?></td>
                      <td><?php echo $product[$i]['product_price']; ?></td>
                      <td><?php echo $product[$i]['product_summary']; ?></td>
                      <td><?php echo $product[$i]['product_description']; ?></td>
                      <td><?php echo $product[$i]['product_machine_details']; ?></td>
                    </tr>
                <?php
                $cnt++;
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial No.</th>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Summary</th>
                  <th>Description</th>
                  <th>Item Details</th>
                </tr>
                </tfoot>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
                          </div>

                          <div class="tab-pane fade" id="sold">
                          </div>

                          <div class="tab-pane fade" id="invoices">
                          </div>

                          <div class="tab-pane fade" id="profile">
                            <div class="modal-content">
                                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('homecontroller/seller_profileupdate'); ?>">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Name</label>
                                    <div class="col-sm-10"> 
                                        <?php echo form_error('name2'); ?>
                                        <input type="text" name="name2" id="name2" class="form-control" placeholder="Name" value="<?php echo($data[0]['seller_name']) ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo($data[0]['seller_username']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class=" chkemail form-control " id="email" name="email" placeholder="Email" value="<?php echo($data[0]['seller_email']) ?>"  disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Mobile</label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('mobile'); ?>
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="<?php echo($data[0]['seller_mobile']) ?>"  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Company Name</label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('address'); ?>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Company Name" value="<?php echo($data[0]['seller_company_name']) ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Company Address</label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('address'); ?>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Company Address" value="<?php echo($data[0]['seller_company_address']) ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-sm" id="seller_submit">
                                            Save</button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            Cancel</button>
                                    </div>
                                </div>
                                </form>
                              </div>
                          </div>

                          <div class="tab-pane fade" id="notification">
                          </div>

                          <div class="clearfix"></div>
                      
                    </div>



</div>
</div>
</div>
</section>
</div>
</div>

<script type="text/javascript">
  $(function(){
$('a[title]').tooltip();
});
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>


<script>
  $(function () {
    $('#example1').DataTable()
  });

     $("#pricetype").change (function () 
     {
        if ($('#pricetype option:selected').val()=='1') 
        {
            $( "#generalprice" ).removeClass( "none" ).addClass( "block" );
        }

        if ($('#pricetype option:selected').val()=='2')
        {
            $( "#generalprice" ).removeClass( "block" ).addClass( "none" );
        }
    });
</script>
