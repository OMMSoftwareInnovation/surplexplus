<link href="<?php echo base_url(); ?>assets/css/profile.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
<style type="text/css">
.table-striped>tbody>tr:nth-of-type(even) 
{
    background-color: #f9f9f9;
}
.unseen 
{
    background-color: #fff!important;
}
tr:hover 
{
    background-color: #cee4f1!important;
    cursor: pointer;
}
.board
{
  height: auto !important;
}
.paginate_button
{
  margin-left: 5px;
  margin-right: 5px;
}
</style>
<div class="main">
  <section style="background:#efefe9;">
        <div class="container">
            <div class="row">
                <div class="board">
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                    <div class="board-inner">
                    <ul class="nav nav-tabs" id="myTab">
                    <div class="liner"></div>
                     <li class="active">
                     <a href="#notifiation" data-toggle="tab" title="Notifiation">
                      <span class="round-tabs one">
                         <i class="glyphicon glyphicon-bell" ></i>
                      </span> 
                  </a></li>

                  <li><a href="#bought" data-toggle="tab" title="Bought">
                     <span class="round-tabs two">
                         <i class="glyphicon glyphicon-shopping-cart" ></i>
                     </span>  </a>
                 </li>
                 <li><a href="#invoices" data-toggle="tab" title="Invoices">
                     <span class="round-tabs three">
                          <i class="glyphicon glyphicon-file" ></i>
                     </span> </a>
                     </li>

                     <li><a href="#profile" data-toggle="tab" title="Profile">
                         <span class="round-tabs four">
                              <i class="glyphicon glyphicon-user" ></i>
                         </span> 
                     </a></li>

                     <li><a href="#doner" data-toggle="tab" title="completed">
                         <span class="round-tabs five">
                              <i class="glyphicon glyphicon-ok"></i>
                         </span> </a>
                     </li>
                     
                     </ul></div>

                    <div class="tab-content">

                          <div class="tab-pane fade in active" id="notifiation">
        <div style="padding-left: 10px;padding-right: 10px;">
            <div class="box-body" style="border-top: 3px solid #d2d6de;box-shadow: 0 1px 1px rgba(0,0,0,0.1);padding: 8px;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Title</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $cnt=1;
                for ($i=0; $i <count($notifi) ; $i++) 
                {
                ?>
                    <tr class="unseen" id="<?php echo $i;?>"  data-subject="<?php echo $i;?>" >
                      <td><?php echo $cnt; ?></td>
                      <td id="subject<?php echo $i;?>"><?php echo $notifi[$i]['notification_subject']; ?></td>
                     <span  style="display: none;" id="text<?php echo $i;?>" ><?php echo $notifi[$i]['notification_text']; ?></span>
                    </tr>                    
                <?php
                $cnt++;
                }
                ?>

                    <div class="modal fade" id="modal-default">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Default Modal</h4>
                          </div>
                          <div class="modal-body">
                            <p id="ntf">One fine body&hellip;</p>
                            <p id="ntf2">One fine body&hellip;</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                </tbody>
                <tfoot>
                <tr>
                  <th>Serial No.</th>
                  <th>Title</th>
                </tr>
                </tfoot>
              </table>
            </div>
        </div>
            <!-- /.box-body -->                   
                          </div>

        <div class="tab-pane fade" id="bought">
        <div style="padding-left: 10px;padding-right: 10px;">
            <div class="box-body" style="border-top: 3px solid #d2d6de;box-shadow: 0 1px 1px rgba(0,0,0,0.1);padding: 8px;">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Order No.</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action</th>
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
                      <td><?php echo $order[$i]['product_name']; ?></td>
                      <td><?php echo $order[$i]['order_amount']; ?></td>
                      <td>
                        <?php 
                        if ($order[$i]['order_status']==1)
                        {
                            echo "Pending";
                        }
                        elseif ($order[$i]['order_status']==2)
                        {
                            echo "Successfull";
                        }
                        else
                        {
                            echo "Rejected";
                        }
                        ?>
                      </td>
                      <td>
                        <button type="submit" class="btn btn-primary btn-sm" id="seller_submit">View Details</button>
                      </td>
                    </tr>
                <?php
                $cnt++;
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial No.</th>
                  <th>Order No.</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
        </div>
            <!-- /.box-body -->
                          </div>

                          <div class="tab-pane fade" id="invoices">
                          </div>

                          <div class="tab-pane fade" id="profile">
                            <div class="modal-content" >
                              <?php   if(isset($notify)){
                                echo $notify;
                              }  ?>
                                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('homecontroller/buyer_profileupdate'); ?>">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Name</label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('name2'); ?>
                                    <input type="text" name="name2" id="name2" class="form-control" placeholder="Name" value="<?php echo($data[0]['buyer_name']) ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo($data[0]['buyer_username']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class=" chkemail form-control " id="email" name="email" placeholder="Email" value="<?php echo($data[0]['buyer_email']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Mobile</label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('mobile'); ?>
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="<?php echo($data[0]['buyer_mobile']) ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Company Name</label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('company_name'); ?>
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="<?php echo($data[0]['buyer_company_name']) ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Company Address</label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('company_address'); ?>
                                        <input type="text" class="form-control" id="company_address" name="company_address" placeholder="Address" value="<?php echo($data[0]['buyer_company_address']) ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-sm" id="seller_submit">
                                            Save</button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            Cancel</button>
                                    </div>
                                </div>
                                </form>
                              </div>
                          </div>

                          <div class="tab-pane fade" id="doner">
                          </div>

                          <div class="clearfix"></div>
                      
                    </div>

</div>
</div>
</div>
</section>
</div>
</div>

<script type="text/javascript">
    $(function(){
      $('a[title]').tooltip();
    });

    $(function () {
      $('#example1').DataTable()
    });

    $(function () {
      $('#example2').DataTable()
    });

    $('#example1 tbody').on( 'click', 'tr', function () 
    {
       //  alert($("#0").attr('data-id'));
       //  exit();
       var aa=$(this).attr('data-subject');
       var bb=$("#subject"+aa).html();
       $('#ntf').text(bb);
   $('#ntf2').html($("#text"+aa).html());


       /**///  alert(aa);
        $('#modal-default').modal('show');
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>