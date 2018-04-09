<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<style type="text/css">
  .list-group-unbordered>.list-group-item
  {
    border-top: 0;
  }
  .modal-dialog
  {
    width: 800px;
    margin: 130px 290px;
  }
  .callout
  {
    padding: 8px 30px 1px 23px;
    border-right: 5px solid #eee;
  }
  .payment
  {
    letter-spacing: 1px;
    font-size: 18px;
  }
  .dataTables_length,.dataTables_info
  {
    text-align: left;
  }
</style>

  <section class="content-header">
      <div class="text-center">
          <span style="font-size: 26px;"><?php echo $product[0]['product_name']; ?></span>

          <!-- <?php
          if ($product[0]['product_status']==1)
          {
              echo "<span class='text-yellow'><b>(Pending)</b></span>";
          }
          elseif ($product[0]['product_status']==2)
          {
              echo "<span class='text-green'><b>(Active)</b></span>";
          }
          elseif ($product[0]['product_status']==3)
          {
              echo "<span class='text-red'><b>(Inactive)</b></span>";
          }
          else
          {
              echo "<span class='text-danger'><b>(Rejected)</b></span>";
          }
          ?> -->

          <button type="button" class="btn btn-warning btn-flat pull-right" onclick="window.history.back()">Back</button>
      </div>
  </section>

    <!-- Main content -->
  <section class="content">

    <div class="row">
      <!-- /.col -->
      <?php
      $tt=0;
      if($comm['status']!="no")
      {
      ?>
      <div class="col-md-12">
          <!-- About Me Box -->
          <div class="box box-primary">

              <?php
              if (count($productorders) == "0")
              {
                ?>
                    <div class="pad margin no-print">
                      <div class="callout callout-success" style="margin-bottom: 0!important;border-color: #00c0ef;background-color: #3c8dbc !important;">
                        <h4 style="letter-spacing: 1px;" class="text-center">No Orders!</h4>
                      </div>
                    </div>
              <?php
              }
              else
              {
              if(isset($comm['newtotal']))
              {
                $tt++;
              ?>
              <div class="box-body box-profile">
                  <div class="col-md-4"></div>
                  <div class="col-md-4" style="box-shadow: 0px 0px 2px 0 rgba(0,0,0,0.16), 0px 0px 2px 0 rgba(0,0,0,0.12);border: 1px solid #d2d6de;">

                    <ul class="list-group list-group-unbordered" style="margin-bottom: 0px;">
                      <li class="list-group-item">
                        <b>Highest Order Price</b> 
                        <a class="pull-right">
                          Rs.<span id="hei_price"><?php echo $comm['high']; ?></span>
                        </a>
                      </li>
                      <li class="list-group-item">
                        <b>Commission Rate</b> 
                        <a class="pull-right">
                          <span id="comis"> <?php echo $comm['rate']; ?></span> %
                        </a>
                      </li>
                      <li class="list-group-item">
                        <b>Current Commission Amount</b> 
                        <a class="pull-right">
                          Rs.<span id="total"> <?php echo $total=$comm['total']; ?></span>
                        </a>
                      </li>
                      <li class="list-group-item">
                        <b>Previous Paid Commission</b> 
                        <a class="pull-right">
                          Rs.<span> <?php echo $commissiondetails[0]['commission_value']; ?></span>
                        </a>
                      </li>
                    </ul>
                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <b>Total</b> 
                        <a class="pull-right">
                          <b>Rs.<span id="total"> <?php echo $total=$comm['newtotal']; ?></span></b>
                        </a>
                      </li>
                    </ul>
                    <div class="row margin-bottom text-center">
                        <button type='button' class='btn btn-success payment btn-flat' style="">Pay Rs.<?php echo $comm['newtotal'] ?></button>
                    </div>
                  </div>
              </div>
              <?php
              }
              elseif (isset($comm['firsttotal']))
              {
                $tt++;
              ?>
              <div class="box-body box-profile">
                  <div class="col-md-4"></div>
                  <div class="col-md-4" style="box-shadow: 0px 0px 2px 0 rgba(0,0,0,0.16), 0px 0px 2px 0 rgba(0,0,0,0.12);border: 1px solid #d2d6de;">

                    <ul class="list-group list-group-unbordered" style="margin-bottom: 0px;">
                      <li class="list-group-item">
                        <b>Order Price</b> 
                        <a class="pull-right">
                          Rs.<span id="hei_price"><?php echo $comm['high']; ?></span>
                        </a>
                      </li>
                      <li class="list-group-item">
                        <b>Commission Rate</b> 
                        <a class="pull-right">
                          <span id="comis"> <?php echo $comm['rate']; ?></span> %
                        </a>
                      </li>
                      <li class="list-group-item">
                        <b>Commission Amount</b> 
                        <a class="pull-right">
                          Rs.<span id="total"> <?php echo $comm['firsttotal']; ?></span>             
                        </a>
                      </li>
                    </ul>
                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <b>Total</b> 
                        <a class="pull-right">
                          <b>Rs.<span id="total"> <?php echo $total=$comm['firsttotal']; ?></span></b>
                        </a>
                      </li>
                    </ul>
                    <div class="row margin-bottom text-center">
                        <button type='button' class='btn btn-success payment btn-flat'>Pay Rs.<?php echo $comm['firsttotal'] ?></button>
                    </div>
                  </div>
              </div>
              <?php
              }
              ?>
          </div>
      </div>
      <?php
      }}
      ?>
    </div>

    <div class="row"> 
      <div class="col-md-3">

        <!-- About Me Box -->
        <div class="box box-primary text-center">
          <div class="box-header with-border">
            <h3 class="box-title" style="font-size: 21px;">Product</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <i class="fa fa-rupee margin-r-5"></i> Highest Order Price

            <p class="text-muted"><a style="font-size: 23px;">Rs.<?php echo $highestprice[0]['max']; ?></a></p>

            <hr>

            <i class="fa fa-th-list margin-r-5"></i> Category

            <p class="text-muted"><a style="font-size: 23px;"><?php echo $category[0]['name']; ?></a></p>

            <hr>

            <i class="fa fa-tags margin-r-5"></i> Sub Category

            <p class="text-muted"><a style="font-size: 23px;"><?php echo $subcategory[0]['name']; ?></a></p>

            <hr>

            <i class="fa fa-truck margin-r-5"></i> Total Orders

            <p class="text-muted"><a style="font-size: 23px;"><?php echo count($productorders); ?></a></p>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>

      <!-- /.col -->
      <div class="col-md-9">
          <!-- About Me Box -->
          <div class="box box-primary text-center">
              <div class="box-header with-border">
                <h3 class="box-title" style="font-size: 21px;">Buyer(s) Details</h3>
              </div>
              <div class="box-body">

            <table id="example1" class="table table-bordered table-striped"" style="text-align: center;">
              <thead>
              <tr>
                <th>Serial No.</th>
                <th>Date</th>
                <th>Price<br>(Rs)</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
            <?php
              $cnt=1;
              for ($i=0; $i <count($productorders) ; $i++) 
              {
            ?>
              <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $productorders[$i]['created_at']; ?></td>
                <td><?php echo "Rs.".$productorders[$i]['order_amount']; ?></td>
                <td>
                  <?php

                  if ($productorders[$i]['order_status']==1)
                  {
                    if($tt==0)
                    {
                      echo "<span class='label label-warning'><b>New</b></span>";
                    }
                    else
                    {
                      echo "<span class='label label-warning'><b>Pending</b></span>";
                    }
                  }
                  elseif ($productorders[$i]['order_status']==2)
                  {
                      echo "<span class='label label-success'><b>Approved</b></span>";
                  }
                  else
                  {
                      echo "<span class='label label-danger'><b>Rejected</b></span>";
                  }
                  ?></td>
                <td>
                  <?php
                  if ($productorders[$i]['order_status']==2)
                  {
                  ?>
                  <button type="button" class="btn btn-block btn-primary btn-xs viewbuyer" data-index="<?php echo $productorders[$i]['buyer_id']; ?>" style="letter-spacing: 1px">View Buyer</button>

                  <?php
                  }
                  if ($productorders[$i]['order_status']==1)
                  {
                    if($tt==0){
                  ?>
                  <button type="button" class="btn btn-block btn-primary btn-xs viewbuyer" data-index="<?php echo $productorders[$i]['buyer_id']; ?>" id="new" data-order="<?php echo $productorders[$i]['order_id']; ?>" style="letter-spacing: 1px">View Buyer</button>

                  <?php
                  
                  }}
                  ?>
                  <div class="modal fade" id="modal-default" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <h4 class="modal-title">
                            <button type="button" class="btn btn-block btn-primary btn-flat btn-lg" style="letter-spacing: 2px;">Buyer Details</button>
                          </h4>
                        </div>
                        <div class="modal-body">
                            <!-- /.box-header -->
                            <div class="box-body text-center">
                              <div class="col-md-6">
                              <i class="fa fa-info margin-r-5"></i> Name

                              <p class="text-muted btn-default"><a style="font-size: 23px;"><span id="bname"></span></a></p>
                              </div>

                              <div class="col-md-6">
                              <i class="fa fa-envelope margin-r-5"></i> Email

                              <p class="text-muted btn-default"><a style="font-size: 23px;"><span id="bem"></span></a></p>
                              </div>
                              
                              <div class="col-md-6">
                              <i class="fa fa-info-circle margin-r-5"></i> Company Name

                              <p class="text-muted btn-default"><a style="font-size: 23px;"><span id="bcom"></span></a></p>
                              </div>

                              <div class="col-md-6">
                              <i class="fa fa-map-marker margin-r-5"></i> Company Address

                              <p class="text-muted btn-default"><a style="font-size: 23px;"><span id="bca"></span></a></p>
                              </div>
                              
                              <div class="col-md-3"></div>
                              
                              <div class="col-md-6">
                              <i class="fa fa-phone margin-r-5"></i> Mobile

                              <p class="text-muted btn-default"><b><a style="font-size: 23px;"><span id="bmo"></span></a></b></p>
                              </div>

                            </div>
                        </div>
                        <div class="modal-footer" style="text-align: center;">
                          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                </td>
              </tr>
            <?php
              $cnt++;
              }
            ?>
              </tbody>
            </table>
              </div>
          </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class=""><a href="#summary" data-toggle="tab"></a></li>
            <li class="active"><a href="#summary" data-toggle="tab">Summary</a></li>
            <li><a href="#description" data-toggle="tab">Description</a></li>
            <li><a href="#mdetails" data-toggle="tab">Item Details</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="summary">
              <!-- Post -->
              <div class="post">
                <p><?php echo $product[0]['product_summary']; ?></p>
              </div>
              <!-- /.post -->
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="description">
              <!-- Post -->
              <div class="post">
                <p><?php echo $product[0]['product_description']; ?></p>
              </div>
              <!-- /.post -->
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="mdetails">
              <!-- Post -->
              <div class="post">
                <p><?php echo $product[0]['product_machine_details']; ?></p>
              </div>
              <!-- /.post -->
            </div>
            <!-- /.tab-pane -->
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
    </div>

    <div class="row">
      <!-- /.col -->
      <div class="col-md-12">
          <!-- About Me Box -->
          <div class="box box-primary text-center">
              <div class="box-header with-border">
                <h3 class="box-title" style="font-size: 21px;">Product Images</h3>
              </div>
              <div class="box-body">
                  <div class="row margin-bottom">
                      <?php
                        $str = $product[0]['product_imgs'];
                        $img = explode(",",$str);
                        for ($i=1; $i <count($img) ; $i++)
                        {
                      ?>
                        <div class="col-sm-3" style="margin-top: 10px;">
                          <img class="img-responsive" src="<?php echo base_url() ?>files/<?php echo $img[$i] ?>"
                           style="width: 100%;max-height: 180px;"
                            alt="Photo">
                        </div>
                      <?php
                        }
                      ?>
                      <br>
                  </div>
              </div>
          </div>
      </div>
        <!-- /.nav-tabs-custom -->
    </div>
      <!-- /.col -->

  </section>
    <!-- /.content -->
<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

    $('.payment').on('click', function()
    {
      var hp = $('#hei_price').text();
      var comrt = $("#comis").text();
      var comtotal = $("#total").text();
      var pid=<?php echo (isset($product[0]['product_id']))? $product[0]['product_id'] : "0"; ?>;

      alertify.confirm('Are You Sure?', 'Are you sure you want to make payment?', 
        function()
        {
          $.ajax({
            url: '<?php  echo site_url('sellercontroller/orderapproval'); ?>',
            type: 'POST',
            data: 
            {
              hp:hp,
              comrt:comrt,
              comtotal:comtotal,
              pid:pid
            },
            success: function(response)
            {
              console.log(response);
               // alertify.success(response);
              location.reload();
            }
          });
        },
        function()
        {
          //alertify.error('Cancel')
        }
      );
    });

    $('.viewbuyer').on('click', function()
    {
      //alert('hey');
      var bid = $(this).attr("data-index");
      if($(this).attr("id")=="new")
      {
        var oid = $(this).attr("data-order");
        // alert(bid+"---"+oid);
      $.ajax({
        url: '<?php  echo site_url('sellercontroller/updateorderstatusbybuyer'); ?>',
        type: 'POST',
        data: 
        {
          bid:bid,oid:oid
        },
        success: function(response)
        {}
      });

      }
      $.ajax({
        url: '<?php  echo site_url('sellercontroller/buyerdata'); ?>',
        type: 'POST',
        data: 
        {
          bid:bid
        },
        success: function(response)
        {
          var json_obj = $.parseJSON(response);
          // console.log(json_obj);
          // console.log(json_obj['buyer_name']);
          $('#bname').text(json_obj[0]['buyer_name']);
          $('#bem').text(json_obj[0]['buyer_email']);
          $('#bcom').text(json_obj[0]['buyer_company_name']);
          $('#bca').text(json_obj[0]['buyer_company_address']);
          $('#bmo').text(json_obj[0]['buyer_mobile']);
          $('#modal-default').modal("show");
        }
      });

    });
  
</script>