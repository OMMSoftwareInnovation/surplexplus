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
                  <?php
                  if ($nm == "Live") {
                    ?>
                  <th>Status</th>
                    <?php
                  }
                  ?>
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
                    <a href="<?php echo site_url('sellercontroller/auctiondetail'); ?>/<?php echo $auctions[$i]['auction_id']; ?>"><?php echo $auctions[$i]['auction_title']; ?></a>
                  </td>
                  <td><?php echo $auctions[$i]['auction_st_time']; ?></td>
                  <td><?php echo $auctions[$i]['auction_ed_time']; ?></td>
                  <?php
                  if ($nm == "Live") {
                    ?>
                  <td style="text-align: center;">
                  <?php 
                            $date = date_create($auctions[$i]['auction_ed_time']);
                            date_format($date, 'Y/m/d H:i:s') ; 
                            $dat = date_create($auctions[$i]['auction_st_time']);
                            $cate = date_create(date('Y/m/d H:i:s', time()));
                            $A = $auctions[$i]['auction_st_time'];
                            $B = $auctions[$i]['auction_ed_time'];
                            $C = date("Y-m-d h:m:i");

                            if (strtotime($C) > strtotime($A) && strtotime($C) < strtotime($B)){
                  ?>
                  <span class="label label-success" style="letter-spacing: 1px;font-size: 12px;">Live!</span>
                  <?php    }else{?>
                  <span class="label label-warning" style="letter-spacing: 1px;font-size: 12px;">To Start!</span>
                  <?php     }
                  ?> </td>
                    <?php
                  }
                  ?>
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