<?php   
if(isset($notify))
{
echo $notify;
}
?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
    <section class="content-header">
      <h1>
        <?php echo $head; ?> Orders</h1>
      <hr>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              	<div class="col-md-10">
              		<h3 class="box-title">Order List</h3>
              	</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped"" style="text-align: center;">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Highest Price</th>
                  <th>No. Buyer(s)</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
              <?php
                $cnt=1;
                for ($i=0; $i <count($order) ; $i++) 
                {
              ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td>
                    <img src="<?php echo base_url() ?>files/thumbnail/<?php echo $order[$i]['product_main_img']; ?>" style="width: 150px;height: 100px;">
                  </td>
                  <td>
                    <a href="<?php echo  site_url('sellercontroller/orderdetail/');?><?php echo $order[$i]['product_id']; ?>"><?php echo $order[$i]['product_name']; ?>
                    </a>
                  </td>
                  <td>Rs.<?php echo $order[$i]['max']; ?></td>
                  <td><?php echo $order[$i]['total']; ?></td>
                  <td>
                    <?php
                    if ($order[0]['order_status']==1)
                    {
                        echo "<span class='label label-warning'><b>Pending</b></span>";
                    }
                    elseif ($order[0]['order_status']==2)
                    {
                        echo "<span class='label label-success'><b>Approved</b></span>";
                    }
                    else
                    {
                        echo "<span class='label label-danger'><b>Rejected</b></span>";
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