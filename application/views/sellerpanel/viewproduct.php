<?php   
if(isset($notify))
{
echo $notify;
}
?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
    <section class="content-header">
      
            <h1>Products</h1>
      <hr>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              	<div class="col-md-10">
              		<h3 class="box-title">Product List</h3>
              	</div>
              	<div class="col-md-2">
                  <a href="<?php echo site_url('sellercontroller/addproduct'); ?>">
                    <button type="button" class="btn btn-block btn-primary btn-flat"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Product
                    </button>
                  </a>
              	</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                <thead>
                <tr>
                  <th style="width: 62px;">Serial No.</th>
                  <th style="width: 75px;">Image</th>
                  <th style="">Name</th>
                  <th style="">Created Date</th>
                  <th style="width: 75px;">Status</th>
                  <th style="width: 75px;">Listing Type</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $cnt=1;
                  for ($i=0; $i <count($product) ; $i++) 
                  {
                ?>
                <tr>
                  <td align="center"><?php echo $cnt; ?></td>
                  <td align="center"><img src="<?php echo base_url()?>files/thumbnail/<?php echo $product[$i]['product_main_img']; ?>" style="width: 150px;height: 100px;"></td>
                  <td align="center">
                    <a href="<?php echo site_url('sellercontroller/productdetail');?>/<?php echo $product[$i]['product_id']; ?>"><?php echo $product[$i]['product_name']; ?></a>
                  </td>
                  <td align="center"><?php echo $product[$i]['date']; ?></td>
                  <td align="center">
                  <?php 
                  if ($product[$i]['product_status']=='1') 
                  {
                  ?>
                      <span class='label label-warning' style='letter-spacing: 1px;'><?php echo "Pending"; ?></span>
                  <?php
                  }
                  elseif ($product[$i]['product_status']=='2') 
                  {
                  ?>
                      <span class='label label-success' style='letter-spacing: 1px;'><?php echo "Approved"; ?></span>
                  <?php
                  }
                  else
                  {
                  ?>
                      <span class='label label-danger' style='letter-spacing: 1px;'><?php echo "Rejected"; ?></span>
                  <?php
                  }
                  ?>
                  </td>
                  <td style="word-spacing: 3px;">
                <?php
                if ($product[$i]['product_status']=='2')
                { 
                $typ=$product[$i]['action_status'];
                       if($typ==0)
                       {
                        echo '  <select class="form-control actsts" field='.$product[$i]['product_id'].'>
                                    <option value="0" selected>Select Listing Type</option>
                                    <option value="1">For Sale</option>
                                    <option value="2">For Auction</option>
                                    <option value="3">For Sale & Auction</option>
                                </select>';
                       }
                       elseif($typ==1)
                       {
                        echo '<b>SALE</b> only!';
                       }
                       elseif($typ==2)
                       {
                        echo '<b>AUCTION</b> only!';
                       }
                       else
                       {
                        echo '<b>AUCTION</b> And <b>SALE</b>!';
                       }
                }
                ?>
                    <?php
                    if ($product[$i]['action_status']=='0')
                    {
                        echo "<span class='label label-danger' style='letter-spacing: 1px;'>Please Select Type</span>";
                    }
                    ?>
                  </td>
                </tr>
                <?php
                  $cnt++;
                  }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->

<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

    $('.actsts').on('change', function()
    {
        var m=$(this).attr('field');
        var n=this.value;
        //alert(m+"-------"+n);
        $.ajax({
                type: 'POST',
                url: '<?php echo site_url('sellercontroller/changeactionstatus'); ?>',
                data:
                {
                  id:m,
                  action_status:n
                },
                success: function(dat) 
                {
                  alertify.success('Listing Type Changed!');
                  location.reload();
                }
           });
    });

</script>