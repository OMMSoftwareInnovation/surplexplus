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
      <h1>Approved order reports</h1>
      <hr>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
<table id="example" class="display nowrap" cellspacing="0" width="100%" style="text-align: center;">
        <thead>
            <tr>
                <th>Serial No.</th>
                <th>Order No.</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
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
                  <td><?php echo $order[$i]['order_id']; ?></td>
                  <td>
                    <img src="<?php echo base_url() ?>files/thumbnail/<?php echo $order[$i]['product_main_img']; ?>" style="width: 100px;height: 100px;">
                  </td>
                  <td>
                    <a href="<?php echo  site_url('sellercontroller/orderdetail/');?><?php echo $order[$i]['order_id']; ?>"><?php echo $order[$i]['product_name']; ?>
                    </a>
                  </td>
                  <td><?php echo $order[$i]['order_amount']; ?></td>
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

    </section>
    <!-- /.content -->