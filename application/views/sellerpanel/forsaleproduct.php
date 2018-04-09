<?php   
if(isset($notify))
{
echo $notify;
}
?>
<style type="text/css">
  .notActive{
    color: #3276b1;
    background-color: #fff;
}
</style>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
    <section class="content-header">
      
            <h1>For Sale Products</h1>
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
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                <thead>
                <tr>
                  <th style="width: 62px;">Serial No.</th>
                  <th style="width: 75px;">Image</th>
                  <th style="">Name</th>
                  <th>Price</th>
                  <th>Date</th>
                  <th style="min-width: 215px;">Status</th>
                </tr>
                </thead>
                <tbody>
              <?php
                $cnt=1;
                for ($i=0; $i <count($products) ; $i++) 
                {
              ?>
                <tr>
                  <td align="center"><?php echo $cnt; ?></td>
                  <td align="center"><img src="<?php echo base_url()?>files/thumbnail/<?php echo $products[$i]['product_main_img']; ?>" style="width: 150px;height: 100px;"></td>
                  <td align="center">
                    <a href="<?php echo site_url('sellercontroller/productdetail');?>/<?php echo $products[$i]['product_id']; ?>"><?php echo $products[$i]['product_name']; ?></a>
                  </td>
                  <td align="center">
                    <?php 
                        $cc = array();
                    if ($products[$i]['product_type'] == '1')
                    { 
                         $cc[0]="active";
                         $cc[1]="notActive";
                         
                         echo "Rs.".$products[$i]['product_price'];  
                    }
                    elseif ($products[$i]['product_type'] == '2')
                    {
                        $cc[1]="active";
                        $cc[0]="notActive";
                       
                        echo "On Request!";
                    } 
                    else
                    {
                        $cc[1]="notActive";
                        $cc[0]="notActive";                      
                    }
                    ?>
                  </td>
                  <td><?php echo $products[$i]['date']; ?></td>
                  <td>

                    <div class="form-group">
                      <div class="col-md-12">
                        <div class="input-group">
                          <div id="<?php echo $products[$i]['product_id']; ?>" class="btn-group">
                            <a class="btn btn-primary btn-sm addp <?php echo $cc[0];?>  " data-toggle="<?php echo $products[$i]['product_id']; ?>" data-title="Y">Selling Price</a>
                            <a class="btn btn-primary btn-sm addr <?php echo $cc["1"];?>" data-toggle="<?php echo $products[$i]['product_id']; ?>" data-title="N">On Request</a>
                          </div>
                          <input type="hidden" name="happy" id="happy">
                        </div>
                      </div>
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

 $('.ajs-input').keyup(function(e)
     {
   //console.log("S");
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});  

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
          }
     });
    });

    $('.addp').on('click', function()
    {
    var id = $(this).data('toggle');
    //var tog = $(this).data('title');

        alertify.prompt( 'Enter Selling Price!', 'Selling Price:', '',

        function(evt, value)
         {
             $('.ajs-input').keyup(function(e)
                 {
               if (/\D/g.test(this.value))
                {
                  this.value = this.value.replace(/\D/g, '');
                }
            });

            var cnt=0;
            if (isNaN(value) == true)
            {
                alertify.set('notifier','position', 'top-right');
                alertify.error("Please Enter Numeric Value!");
                cnt++;
            }
            if (value == "")
            {
                alertify.set('notifier','position', 'top-right');
                alertify.error("Please Enter Value!");
                cnt++;
            }
            if (/\D/g.test(value))
            {
                value = value.replace(/\D/g, '');
                cnt++;
            }
            if (cnt==0)
            {
              //console.log(id);
              $.ajax({
                type: 'POST',
                url: '<?php echo site_url('sellercontroller/submitproductsellingprice'); ?>',
                data:
                {
                  id:id,
                  value:value
                },
                success: function(dat) 
                {
                  alertify.set('notifier','position', 'top-right');
                  alertify.success('Selling Price Submited!');
                  location.reload();
                }
              });              
            }          
         },

         function()
         {
            // alertify.error("You Didn"+"'t ")
         }

         );
    });

    $('.addr').on('click', function(){
        var id = $(this).data('toggle');
        //var tog = $(this).data('title');
        //console.log("hh");
        
        alertify.confirm('Are You Sure?', 'Updating price as "On Request"', 
          function()
          {
            $.ajax({
              type: 'POST',
              url: '<?php echo site_url('sellercontroller/submitproductonreqprice'); ?>',
              data:
              {
                id:id
              },
              success: function(dat) 
              {
                //console.log(dat);
                alertify.success('Selling Price Submited!');
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
    })

</script>