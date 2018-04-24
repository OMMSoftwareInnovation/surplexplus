<style type="text/css">
.check
{
    opacity:0.5;
    color:#996;
}
.none
{
    display: none;
}
.block
{
    display: block;
}
.opc {
    pointer-events: none;
    opacity: 0.4;
}
#file
{
    border: 1px solid #d4d4d4;
    background-color: #f1f1f1;
    border-radius: 2px;
    padding: 8px;
}
</style>
  <!-- Daterange -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/bower_components/datepicker/css/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/report/jquery.dataTables.min.css">

    <!-- Main content -->
    
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">

            <div class="box-header with-border">
              <h3 class="box-title">Auction Details</h3>
            </div>

            <div class="box-body">

                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                  <div  id="act" class="block">
                      <div class="form-group col-md-6">
                          <label>Title <span style="color:red">*</span></label>
                          <input type="text" class="form-control" id="title" name="title" placeholder="Enter ..." required>
                      </div>

                      <div class="form-group col-md-3">
                        <label>Starting Date: <span style="color:red">*</span></label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="reservationtime" name="daterange" required>
                        </div>
                      </div>

                      <div class="form-group col-md-3">
                        <label>Ending Date: <span style="color:red">*</span></label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="reservationtime" name="daterange1" required>
                        </div>
                      </div>

                      <div class="form-group col-md-12">
                          <label for="exampleInputFile">Upload Auction Image </label>
                          <input type="file" id="file" name="file">
                      </div>
                       <div class="form-group col-md-12" style="text-align: center;">
                     
                      <button type="submit" id="uploadimage" style="font-size: 16px;letter-spacing: 1px;" class="btn btn-primary btn-flat">Submit</button>
                      </div>
                  <!--     <span style="color:red;margin-left: 64%;font-style: italic;letter-spacing: 1px;font-weight: bold;">(The fields marked with an asterisk (*) are mandatory.)</span> -->
                  </div>
                </form>

                <div class="overlay none">
                  <i class="fa fa-refresh fa-spin" style="font-size: 50px;"></i>
                </div>
                
                <div  id="act1" class="none">

                    <div class="col-md-12">
                      <div class="col-md-3"></div>
                      <div class="col-md-6" style="text-align: center;">
                      <i class="fa fa-info-circle margin-r-5"></i> Auction Name
                      <p class="text-muted btn-default"><a style="font-size: 26px;"><span id="title1"></span></a></p>
                      </div>
                    </div>

                    <div class="col-md-6" style="text-align: center; display: none;">
                    <i class="fa fa-info-circle margin-r-5"></i> Auction Number
                    <p class="text-muted btn-default"><a style="font-size: 26px;"><span id="aucnum"></span></a></p>
                    </div>

                    <div class="col-md-6" style="text-align: center; display: none;">
                    <i class="fa fa-info-circle margin-r-5"></i> Auction Number
                    <p class="text-muted btn-default"><a style="font-size: 26px;"><span id="imagenum"></span></a></p>
                    </div>
                    
                    <div class="col-md-3"></div>
                    
                    <div class="col-md-12" style="text-align: center;">
                    <i class="fa fa-picture-o margin-r-5"></i> Auction Image
                    <br>
                    <img src="" id="aucpic" style="width: 200px;height: 150px;border: 3px solid #3c8dbc;padding: 2px;border-radius: 2px;">
                    </div>

                    <div class="col-md-6" style="text-align: center;">
                    <i class="fa fa-clock-o margin-r-5"></i> Starting Date And time
                    <p class="text-muted btn-default"><a style="font-size: 23px;"><span id="daterange1"></span></a></p>
                    </div>

                    <div class="col-md-6" style="text-align: center;margin-bottom: 30px;">
                    <i class="fa fa-clock-o margin-r-5"></i> Ending Date And time
                    <p class="text-muted btn-default"><a style="font-size: 23px;"><span id="daterange2"></span></a></p>
                    </div>

                    <div class="form-group col-md-12" id="">
                      <hr>
                    </div>

                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Serial No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Starting Bid <br>(Rs.)</th>
                        <th>Increment <br>(Rs.)</th>
                        <th>Reserve Price <br>(Rs.)</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                          $cnt=1;
                          for ($i=0; $i <count($product) ; $i++)
                          {
                        ?>
                        <tr>
                          <td><?php echo $cnt; ?></td>
                          <td>
                            <img src="<?php echo base_url()?>files/thumbnail/<?php echo $product[$i]['product_main_img']; ?>" alt="..." style="border-radius: 0px;width: 100px;height: 100px;" class="img-thumbnail img-check">
                          </td>
                          <td><?php echo $product[$i]['product_name']; ?></td>
                          <td>
                            <div class="form-group col-md-12" data-toggle="tooltip" data-placement="top" title="Starting Bid">
                              <input type="text" style="width: 110px;" id="bid<?php echo $product[$i]['product_id']; ?>" class="form-control" name="number" placeholder="Enter ...">
                            </div>
                          </td>
                          <td>
                            <div class="form-group col-md-12" data-toggle="tooltip" data-placement="top" title="Increment">
                              <input type="text" style="width: 110px;" id="inc<?php echo $product[$i]['product_id']; ?>" class="form-control" name="number" placeholder="Enter ...">
                            </div>
                          </td>
                          <td>
                            <div class="form-group col-md-12" data-toggle="tooltip" data-placement="top" title="Reserve Price!">
                              <input type="text" style="width: 110px;" id="rspc<?php echo $product[$i]['product_id']; ?>" class="form-control" name="number" placeholder="Enter ...">
                            </div>
                          </td>
                          <td>
                            <button type="submit" id="<?php echo $product[$i]['product_id']; ?>"  class=" svd btn btn-primary btn-flat">Add</button>
                            <button type="submit" style="margin-top: 5px;" id="delete<?php echo $product[$i]['product_id']; ?>" data-index="<?php echo $product[$i]['product_id']; ?>" class="delete none btn btn-warning btn-flat">Delete</button>
                          </td>
                        </tr>
                        <?php
                          $cnt++;
                          }
                        ?>
                      </tbody>
                    </table>

                    <div class="box-footer">
                      <a id="submitauc">
                        <button id="aucfinal" class="btn btn-primary btn-flat col-md-12" disabled="disabled">Submit Auction</button>
                      </a>                
                    </div>

                </div>

            </div>

        </div>
      </div>
    </section>

    <!-- /.content -->

<!-- jQuery 3 -->

<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
var  totalproduct=0;    
$('input[name="number"]').keyup(function(e)
{
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});  

$(document).ready(function (e) 
{
  if (parseInt(totalproduct) != 0)
  {
      $('#aucfinal').removeAttr("disabled");
  };


    $("#uploadimage").on('submit',(function(e) 
    {
        e.preventDefault();

        $("#act").addClass( "opc" );
        $(".overlay").removeClass( "none" ).addClass( "block" );

        $.ajax({
            url: "uploadauction",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                var json_obj = $.parseJSON(data);
                //console.log(parseInt(json_obj['auction_image']));
                $('#title1').text(json_obj['auction_title']);
                $('#aucnum').text(json_obj['auction_id']);
                $('#daterange1').text(json_obj['auction_st_time']);
                $('#daterange2').text(json_obj['auction_ed_time']);
                if (parseInt(json_obj['auction_image'])==1)
                {
                    $("#aucpic").attr("src", '<?php echo base_url() ?>'+"./files/auctions/noimage.png");
                    $('#imagenum').text("1");
                }
                else
                {
                    $("#aucpic").attr("src", '<?php echo base_url() ?>'+ json_obj['auction_image']);
                    $('#imagenum').text("0");
                }
                $("#act").removeClass( "opc" );
                $("#act").removeClass( "block" ).addClass( "none" );
                $(".overlay").removeClass( "block" ).addClass( "none" );
                $("#act1").removeClass( "none" ).addClass( "block" );
                //alert($('#imagenum').text());
            }
        });
    }));
});

$(document).ready(function(e)
{
    $('.table').delegate(".svd", "click", function()
    {
        var aucid = $('#aucnum').text();
        var proid = $(this).attr("id");
        var bid   = $("#bid"+$(this).attr("id")).val();
        var inc   = $("#inc"+$(this).attr("id")).val();
        var rspc  = $("#rspc"+$(this).attr("id")).val();

        var cnt=0;
        if (bid=="")
        {
            //alert(bid);
            alertify.set('notifier','position', 'top-right');
            alertify.error('Please Enter Starting Bid!');
            cnt++;
        }
        if (parseInt(bid)==0)
        {
            //alert(bid);
            alertify.set('notifier','position', 'top-right');
            alertify.error('Starting Bid must be more than 1Rs.!');
            cnt++;
        }
        if (inc=="")
        {
            alertify.set('notifier','position', 'top-right');
            alertify.error('Please Enter Increment Amount!');
            cnt++;
        }
        if (parseInt(inc)==0)
        {
            //alert(bid);
            alertify.set('notifier','position', 'top-right');
            alertify.error('Increment must be more than 1Rs.!');
            cnt++;
        }
        if (rspc=="")
        {
            alertify.set('notifier','position', 'top-right');
            alertify.error('Please Enter Reserve Price!');
            cnt++;
        }
        if (parseInt(rspc)==0)
        {
            //alert(bid);
            alertify.set('notifier','position', 'top-right');
            alertify.error('Reserve Price must be more than 1Rs.!');
            cnt++;
        }
        if(cnt==0)
        {
          if ( parseInt(rspc) >= parseInt(bid) )
          {
              $("#inc"+$(this).attr("id")).attr("disabled", "disabled");
              $("#bid"+$(this).attr("id")).attr("disabled", "disabled");
              $("#rspc"+$(this).attr("id")).attr("disabled", "disabled");
              $(this).removeClass( "svd" ).addClass( "edt" );
              $(this).text('Edit');
              $("#delete"+$(this).attr("id")).removeClass( "none" ).addClass( "block" );

              $.ajax({
                url: 'addaucitem',
                type: 'POST',
                data: 
                {
                  aucid:aucid,
                  proid:proid,
                  bid:bid,
                  inc:inc,
                  rspc:rspc
                },
                success: function(response)
                {
                  totalproduct++;
                  //console.log(totalproduct);
                    alertify.success('Product added to current auction!');
                
                    if (parseInt(totalproduct) != 0)
                    {
                        $('#aucfinal').removeAttr("disabled");
                    }
                }
              });
          }
          else
          {
              alertify.set('notifier','position', 'top-right');
              alertify.error('Reserve Price must be greater than Starting Bid!');
          }
        }
    });

    $('.table').delegate(".edt", "click", function() 
    {
        $(this).removeClass( "edt" ).addClass( "updt" );
        $(this).text('Update');
        $("#inc"+$(this).attr("id")).prop("disabled", false);
        $("#bid"+$(this).attr("id")).prop("disabled", false);
        $("#rspc"+$(this).attr("id")).prop("disabled", false);
    });

    $('.table').delegate(".updt", "click", function() 
    {
        var aucid = $('#aucnum').text();
        var proid = $(this).attr("id");
        var bid   = $("#bid"+$(this).attr("id")).val();
        var inc   = $("#inc"+$(this).attr("id")).val();
        var rspc  = $("#rspc"+$(this).attr("id")).val();
        var cnt=0;
        
        if (bid=="")
        {
            alertify.set('notifier','position', 'top-right');
            alertify.error('Please Enter Starting Bid!');
            cnt++;
        }
        if (inc=="")
        {
            alertify.set('notifier','position', 'top-right');
            alertify.error('Please Enter Increment Amount!');
            cnt++;
        }
        if (rspc=="")
        {
            alertify.set('notifier','position', 'top-right');
            alertify.error('Please Enter Reserve Price!');
            cnt++;
        }
        if(cnt==0)
        {
          if ( parseInt(rspc) >= parseInt(bid) )
          {
              $("#inc"+$(this).attr("id")).attr("disabled", "disabled"); 
              $("#bid"+$(this).attr("id")).attr("disabled", "disabled");
              $("#rspc"+$(this).attr("id")).attr("disabled", "disabled");
              $(this).removeClass( "updt" ).addClass( "edt" );
              $(this).text('Edit');

              $.ajax({
                url: 'updateaucitem',
                type: 'POST',
                data: 
                {
                  aucid:aucid,
                  proid:proid,
                  bid:bid,
                  inc:inc,
                  rspc:rspc
                },
                success: function(response)
                {
                  //console.log(response);
                  if (response) 
                  {
                    alertify.success('Product updated to current auction!');
                  }
                  else
                  {
                    alertify.error('Product not updated to current auction!');
                  }
                }
              });
          }
          else
          {
              alertify.set('notifier','position', 'top-right');
              alertify.error('Reserve Price must be greater than Starting Bid!');
          }
        }
    });

    $('.table').delegate(".delete", "click", function() 
    {
        var aucid = $('#aucnum').text();
        var proid = $(this).attr("data-index");
        
        $("#"+$(this).attr("data-index")).text('Add');
        $("#"+$(this).attr("data-index")).removeClass( "edt" ).addClass( "svd" );
        $("#inc"+$(this).attr("data-index")).val("");
        $("#bid"+$(this).attr("data-index")).val("");
        $("#rspc"+$(this).attr("data-index")).val("");
        $("#inc"+$(this).attr("data-index")).prop("disabled", false);
        $("#bid"+$(this).attr("data-index")).prop("disabled", false);
        $("#rspc"+$(this).attr("data-index")).prop("disabled", false);
        $(this).removeClass( "block" ).addClass( "none" );
        //alert(aucid+"---"+proid);

        $.ajax({
          url: 'deleteaucitem',
          type: 'POST',
          data: 
          {
            aucid:aucid,
            proid:proid
          },
          success: function(response)
          {
              alertify.error('Product deleted to current auction!');
              totalproduct=totalproduct-1;
                
              if (parseInt(totalproduct) != 0)
              {
              }
              else
              {
                $('#aucfinal').attr("disabled", true);
              }
          }
        });
    });
});

$("#aucfinal").on('click',(function(e) 
{
  var ignum = $('#imagenum').text();
  var aucnum = $('#aucnum').text();
  if (ignum=="1")
  {
      $.ajax({
        url: 'uploadaucimage',
        type: 'POST',
        data: 
        {
          aucnum:aucnum
        },
        success: function(response)
        {
              window.location.href = "<?php echo site_url('sellercontroller/pendingauctions') ?>";
        }
      });
  }
  else
  {
      window.location.href = "<?php echo site_url('sellercontroller/pendingauctions') ?>";
  }
}));
</script>