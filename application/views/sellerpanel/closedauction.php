<?php   
if(isset($notify))
{
echo $notify;
}
?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
    <section class="content-header">
      <h1><?php echo $nm; ?> Auctions</h1>
      <hr>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              	<div class="col-md-10">
              		<h3 class="box-title">Auction List</h3>
              	</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Starting Time</th>
                  <th>Ending Time</th>
                  <th>Status</th>
                  <th>Total Items</th>
                </tr>
                </thead>
                <tbody>
              <?php
                $cnt=1;
                for ($i=0; $i <count($auctions) ; $i++) 
                {
              ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td>
                    <img src="<?php echo base_url() ?><?php echo $auctions[$i]['auction_image']; ?>" style="width: 150px;height: 100px;">
                  </td>
                  <td>
                    <a href="<?php echo site_url('sellercontroller/closedauctiondetail'); ?>/<?php echo $auctions[$i]['auction_id']; ?>"><?php echo $auctions[$i]['auction_title']; ?></a>
                  </td>
                  <td><?php echo $auctions[$i]['auction_st_time']; ?></td>
                  <td><?php echo $auctions[$i]['auction_ed_time']; ?></td>
                  <td style="text-align: center;">
                      <span class="label label-danger" style="letter-spacing: 1px;font-size: 12px;">Closed!</span>
                  </td>
                  <td><?php echo $auctions[$i]['total']; ?></td>
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