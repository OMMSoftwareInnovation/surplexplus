<link rel="stylesheet" href="<?php echo base_url() ?>assets/report/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/report/buttons.dataTables.min.css">
<style type="text/css">
    .dt-buttons,.dataTables_filter,.nowrap,.dataTables_info
    {
        padding: 1%;
    }
    .paging_simple_numbers
    {
        margin-top: -2%;
    }
    table.dataTable.nowrap th, table.dataTable.nowrap td 
    {
        white-space: normal !important;
    }
    td
    {
        border: 1px solid #ddd;
    }
    table.dataTable thead th, table.dataTable thead td,
    table.dataTable tfoot th, table.dataTable tfoot td
    {
        border: 1px solid #ddd !important;
    }
</style>
<section class="content-header">
      <h1>Products Reports</h1>
      <hr>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
<table id="example" class="display nowrap" cellspacing="0" width="100%" style="text-align: center;">
        <thead>
                <tr>
                  <th style="width: 62px;">Serial No.</th>
                  <th style="width: 75px;">Image</th>
                  <th style="">Name</th>
                  <th style="">Date</th>
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

    </section>
    <!-- /.content -->