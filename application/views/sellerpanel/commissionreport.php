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
      <h1>Commission Reports</h1>
      <hr>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
<table id="example" class="display nowrap" cellspacing="0" width="100%" style="text-align: center;">
        <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Paid Commission</th>
                  <th>Commision Rate</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $cnt=1;
                  for ($i=0; $i <count($commission) ; $i++) 
                  {
                ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td align="center"><img src="<?php echo base_url()?>files/thumbnail/<?php echo $commission[$i]['product_main_img']; ?>" style="width: 150px;height: 100px;"></td>
                  <td><a href="<?php echo site_url('sellercontroller/orderdetail');?>/<?php echo $commission[$i]['product_id']; ?>"><?php echo $commission[$i]['product_name']?></td></a>
                  <td><?php echo $commission[$i]['max']?></td>
                  <td><?php echo $commission[$i]['commission_rate']?></td>
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