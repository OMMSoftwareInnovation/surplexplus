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
                  <th style="text-align: center;">Serial No.</th>
                  <th style="text-align: center;">Image</th>
                  <th style="text-align: center;">Product Name</th>
                  <th style="text-align: center;">Price<!-- <br> -->(Rs.)</th>
                  <th style="text-align: center;">Status</th>
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
                    <a href="<?php echo  site_url('sellercontroller/productdetail/');?><?php echo $order[$i]['product_id']; ?>"><?php echo $order[$i]['product_name']; ?>
                    </a>
                  </td>
                  <td>
                    <?php 
                    if ($order[$i]['order_status']==3)
                    {
                    ?>
                      <div class="form-group">
                        <input type="text" style="width: 110px;" id="price<?php echo $order[$i]['order_id']; ?>" class="form-control" name="number" placeholder="Enter ...">
                      </div><button type="button" class="btn btn-primary btn-flat addprice" data-toggle="<?php echo $order[$i]['order_id']; ?>" data-bid="<?php echo $order[$i]['buyer_id']; ?>" data-pid="<?php echo $order[$i]['product_id']; ?>">Save</button>
                    <?php
                    }
                    else
                    {
                      echo $order[$i]['order_amount'];
                    }
                    ?>
                  </td>
                  <td>
                    <?php 
                    if ($order[$i]['order_status']==3)
                    {
                      echo "On Request!";
                    }
                    else
                    {
                      echo "<code>Waiting for <b>BUYER</b> Approvel!</code>";
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
  
 $('input[name=number]').keyup(function(e)
{
  if (/\D/g.test(this.value))
  {
    this.value = this.value.replace(/\D/g, '');
  }
}); 
    $('.addprice').on('click', function(){
        var id = $(this).data('toggle');
        var price = $("#price"+id).val();
        var bid = $(this).data('bid');
        var pid = $(this).data('pid');
        //alert(id+'----'+bid+'----'+price);
        
            var cnt=0;
            if (parseInt(price)<=0)
            {
                alertify.set('notifier','position', 'top-right');
                alertify.error("Please Enter Numeric Value More Then 0!");
                cnt++;
            }
            if (isNaN(price) == true)
            {
                alertify.set('notifier','position', 'top-right');
                alertify.error("Please Enter Numeric Value!");
                cnt++;
            }
            if (price == "")
            {
                alertify.set('notifier','position', 'top-right');
                alertify.error("Please Enter Price!");
                cnt++;
            }
            if (cnt==0)
            {
        alertify.confirm('Are You Sure?', 'You quote is Rs.'+price+' ?', 
          function()
          {
              $.ajax({
                type: 'POST',
                url: '<?php echo site_url('sellercontroller/submitonreqprice'); ?>',
                data:
                {
                  oid:id,oprice:price,bid:bid,pid:pid
                },
                success: function(dat) 
                {
                  //console.log(dat);
                  alertify.success('On Request Price Submited!');
                  location.reload();
                }
              });
            //alertify.success('Ok')
          },
          function()
          {
            //alertify.error('Cancel')
          }
        );
            }
    })
</script>