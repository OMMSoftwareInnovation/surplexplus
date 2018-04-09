<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/bower_components/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<style type="text/css">
  .none
  {
    display: none;
  }
  .block
  {
    display: block;
  }
  .wysihtml5-supported
  {
    padding: 0px;
  }
  img
  {
    width: 80px;
  }
  body
  {
    padding-top: 0px !important;
  }
</style>
<style type="text/css">
  #regiration_form fieldset:not(:first-of-type) {
    display: none;
  }
  </style>
<section class="content-header">
  <h1>
    Add Product
  </h1>
  <hr>
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary" style="padding: 20px;">
            <!-- /.box-header -->
            <?php  
            if(isset($notify))
            {
                echo $notify;
            }
            ?>
            
          <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="alert alert-success hide"></div>
          <div id="regiration_form">
              <fieldset>

                    <h2 style="text-align: center;letter-spacing: 1px;">Step 1: Product Details</h2>
                    <!-- <hr> -->
                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="product_name">Product Name <span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Name">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Category <span style="color:red">*</span></label>
                      <select class="form-control" id="category"  name="category">
                        <option value="0">Select Category</option>
                        <?php
                        for ($i=0; $i <count($category) ; $i++) 
                        {
                        ?>
                        <option value="<?php echo $category[$i]['id'];?>">
                           <?php echo $category[$i]['name']; ?>
                        </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="row none" id="catother">
                    <div class="form-group col-md-12">
                      <label for="catotherinfo">Information About OTHER Category <span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="catotherinfo" id="catotherinfo" placeholder="Enter Information">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 none" id="subcategorydiv">
                      <label>Subcategory</label>
                      <select class="form-control" id="subcategory"  name="subcategory">
                      </select>
                    </div>
                </div>

                <div class="row none" id="subcatother">
                    <div class="form-group col-md-12">
                      <label for="subcatotherinfo">Information About OTHER Sub-Category</span></label>
                      <input type="text" class="form-control" name="subcatotherinfo" id="subcatotherinfo" placeholder="Enter Information">
                    </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-12" id="">
                    <label>Summary <span style="color:red">*</span></label>
                    <textarea placeholder="Place some text here" id="product_summary" style="min-width: 100%;max-width: 100%;min-height: 100px; max-height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
                </div>

                <input type="button" name="password" class="next1 btn btn-info col-md-2" value="Next" id="password" disabled=""> &nbsp;
                <!-- <a href="viewproduct"> -->
                  <input type="button" id="" style="margin-left: 2%;" class="cancel btn btn-warning col-md-2" value="Cancel">
                <!-- </a> -->
                <span style="color:red;margin-left:  28.4%;font-style: italic;letter-spacing: 1px;font-weight: bold;">(The fields marked with an asterisk (*) are mandatory.)</span>
              </fieldset>

              <fieldset>

                <h2 style="text-align: center;letter-spacing: 1px;">Step 2: All Details</h2>
                
                <div class="row">
                    <div class="pad margin no-print">
                      <div class="callout callout-success" style="margin-bottom: 0!important;border-color: #00c0ef;background-color: #3c8dbc !important;">
                        <h4 style="margin-bottom: 0px;" class="text-center">Item Details</h4>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="itemname">Item Name <span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="itemname" id="itemname" placeholder="Enter Item Name">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="manufacturer">Manufacturer <span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="manufacturer" id="manufacturer" placeholder="Enter ">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="model_type">Model/Type <span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="model_type" id="model_type" placeholder="Enter ">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="yofmenu">Year of Manufacture <span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="yofmenu" id="yofmenu" placeholder="Enter ">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="machine_condi">Machine Condition <span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="machine_condi" id="machine_condi" placeholder="Enter ">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="machine_loc">Machine Location <span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="machine_loc" id="machine_loc" placeholder="Enter ">
                    </div>
                </div>
                
                <div class="row">
                    <div class="pad margin no-print">
                      <div class="callout callout-success" style="margin-bottom: 0!important;border-color: #00c0ef;background-color: #3c8dbc !important;">
                        <h4 style="margin-bottom: 0px;" class="text-center">Description</h4>
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-12" id="">
                    <label>Description <span style="color:red">*</span></label>
                    <textarea class="" placeholder="Place some text here" id="product_desc" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
                </div>
                
                <div class="row">
                    <div class="pad margin no-print">
                      <div class="callout callout-success" style="margin-bottom: 0!important;border-color: #00c0ef;background-color: #3c8dbc !important;">
                        <h4 style="margin-bottom: 0px;" class="text-center">Technical Details</h4>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="w_approx">Weight Approx <span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="w_approx" id="w_approx" placeholder="Enter ">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="s_d_approx">Size/Dimensions Approx <span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="s_d_approx" id="s_d_approx" placeholder="Enter ">
                    </div>
                </div>

                <input type="button" name="previous" style="float: left;" class="previous btn btn-default" value="Previous" />
                <input type="button" name="password" style="margin-left: 2%;" class="next btn btn-info col-md-2" value="Next" id="password" disabled=""> &nbsp;
                  <input type="button" id="" style="margin-left: 2%;" class="cancel btn btn-warning col-md-2" value="Cancel">
                <span style="color:red;margin-left:  19.16%;font-style: italic;letter-spacing: 1px;font-weight: bold;">(The fields marked with an asterisk (*) are mandatory.)</span>
              </fieldset>

              <fieldset>
                <h2 style="text-align: center;letter-spacing: 1px;">Step 2: Upload Images</h2>

                <!-- Generic page styles -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/multiupload/css/style.css">
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/multiupload/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/multiupload/css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="<?php echo base_url() ?>assets/multiupload/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="<?php echo base_url() ?>assets/multiupload/css/jquery.fileupload-ui-noscript.css"></noscript>


                <form id="fileupload" action="<?php echo site_url('sellercontroller/multiupload'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row fileupload-buttonbar">
                        <div class="col-lg-7">
                            <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="btn btn-success fileinput-button">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Add Images...</span>
                                <input type="file" name="files[]" id="dd" multiple>
                            </span>
                            <button type="submit" class="btn btn-primary start" disabled="disabled" id="qwe">
                                <i class="glyphicon glyphicon-upload"></i>
                                <span>Upload all</span>
                            </button>
                            <button type="button" class="btn btn-danger deleteall" disabled="disabled">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>Delete</span>
                            </button>
                            <!-- The global file processing state -->
                            <span class="fileupload-process"></span>
                        </div>
                        <!-- The global progress state -->
                        <div class="col-lg-5 fileupload-progress fade">
                            <!-- The global progress bar -->
                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                            </div>
                            <!-- The extended global progress state -->
                            <div class="progress-extended">&nbsp;</div>
                        </div>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" id="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                </form>

                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="submit"   id="submit" name="submit" class="submit btn btn-success" value="Submit" />
                  <input type="button" id="" style="float: right;" class="cancel btn btn-warning col-md-2" value="Cancel">
              </fieldset>
              
              </div>
            <!-- </form> -->
          </div>
          <!-- /.box -->
      </div>
  </div>
</section>

<script id="template-upload" type="text/x-tmpl">
{% 

$(document).ready(function()
{
   if((o.files.length>0))
   {
  
  $("#qwe").removeAttr('disabled');
  }
  else
  {
  $("#qwe").prop("disabled", true);
  }
});

  for (var i=0, file; file=o.files[i]; i++) { 





  %}


    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name" id="ss">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size"  >Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Upload</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel" onclick="abc('{%=file.length%}')">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% 
  
  for (var i=0, file; file=o.files[i]; i++) { 

  %}
    

    <tr class="template-download fade">
      <td>  <input type="checkbox" name="delete" value="1" class="toggle btn btn-danger"></td>
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" class="upimg" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size"   >{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button id="dltimg" class="btn btn-danger delete" onclick="mmm('{%=file.length%}') data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                    <div class="btn btn-warning " >
                   
                    <input type="radio"   name="defaultimg" value="{%=file.name%}">
                    Default Image
                </div>
            {% } else { %}
                <button class="btn btn-warning cancel" >
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}

</script>


  </div>
  <!-- /.content-wrapper -->

</div>
</body>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->

<!-- DataTables -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>

<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/sellerpanel/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/sellerpanel/dist/js/demo.js"></script>
<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/notify.min.js"></script>


<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo base_url() ?>assets/multiupload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<!-- blueimp Gallery script -->
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url() ?>assets/multiupload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url() ?>assets/multiupload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url() ?>assets/multiupload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url() ?>assets/multiupload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->

<script src="<?php echo base_url() ?>assets/multiupload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url() ?>assets/multiupload/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="<?php echo base_url() ?>assets/multiupload/js/main.js"></script>

<script>
 function abc(aa)
  {
  aa=$('#presentation tr').length;
   if(aa >=0){
  $("#qwe").removeAttr('disabled');
 
   if(aa==1){
   $("#qwe").prop("disabled", true);
      
   }
   }
  else
  {
  $("#qwe").prop("disabled", true);
  }
  }
$(document).ready(function()
{
    var cnt1=0;
    var cnt2=0;
    var cnt3=0;

    $(".deleteall").click(function()
    {
      $(".toggle").prop("checked", true);

      alertify.confirm('Are you sure?', 'Are you sure you want to delete all images?', 
        function()
        {
          $(".delete").click();
          alertify.success('All images are deleted!');
        },
        function()
        {
        }
      );
    });

    $('.cancel').click(function()
    {
        alertify.confirm("Are You Sure?", "Are You Sure you don't want to add new product?", 
          function()
          {
            window.location.href="<?php echo site_url('sellercontroller/viewproduct')?>";
          },
          function()
          {
            //alertify.error('Cancel')
          }
        );
    });

    $("#product_name").on("blur keyup",  function (event)
    {
        var name= $("#product_name").val();
        if(name != "")
        {
            cnt1=1;
            cc();
        }
        else
        {
            cnt1=0;
            bb();
        }
    });
    $("#product_summary").on("blur keyup",  function (event)
    {
        var summary= $("#product_summary").val();
        if(summary != "")
        {
            cnt2=1;
            cc();
        }
        else
        {
            cnt2=0;
            bb();
        }
    });
    $("#category").on("keyup change",  function (event)
    {
        var cate= $("#category").val();
        var catotherinfo= $("#catotherinfo").val();
        //alert(cate);
        if(cate == "18" && catotherinfo != "")
        {
            cnt3=1;
            cc();
        }
        else if(cate == "0")
        {
            $("#catotherinfo").val("");
            cnt3=0;
            bb();
        }
        else if(cate !== "18")
        {
            $("#catotherinfo").val("");
            cnt3=1;
            cc();
        }
        else
        {
            cnt3=0;
            bb();
        }
    });
    $("#catotherinfo").on("blur keyup",  function (event)
    {
        var cate= $("#category").val();
        var catotherinfo= $("#catotherinfo").val();
        //alert(cate);
        if(cate == "18" && catotherinfo != "")
        {
            cnt3=1;
            cc();
        }
        else
        {
            cnt3=0;
            bb();
        }
    });

    function cc()
    {
      if (cnt1 !=0  && cnt2 !=0  && cnt3 !=0)
      {
        $('.next1').removeAttr('disabled');
      }
    };

    function bb()
    {
        $(".next1").prop("disabled", true);
    };

    var current = 1,current_step,next_step,steps;
    steps = $("fieldset").length;

    $(".next1").click(function()
    {
        current_step = $(this).parent();
        next_step = $(this).parent().next();
        next_step.show();
        current_step.hide();
        setProgressBar(++current);    
    });

    var cnt4=0;
    var cnt5=0;
    var cnt6=0;
    var cnt7=0;
    var cnt8=0;
    var cnt9=0;
    var cnt10=0;
    var cnt11=0;
    var cnt12=0;      

    $("#itemname").on("blur keyup",  function (event)
    {
        var itemname = $("#itemname").val();
        if(itemname != "")
        {
            cnt4=1;
            dd();
        }
        else
        {
            cnt4=0;
            ee();
        }
    });

    $("#manufacturer").on("blur keyup",  function (event)
    { 
        var manufacturer = $("#manufacturer").val();
        if(manufacturer != "")
        {
            cnt5=1;
            dd();
        }
        else
        {
            cnt5=0;
            ee();
        }
    });

    $("#model_type").on("blur keyup",  function (event)
    { 
        var model_type = $("#model_type").val();
        if(model_type != "")
        {
            cnt6=1;
            dd();
        }
        else
        {
            cnt6=0;
            ee();
        }
    });

    $("#yofmenu").on("blur keyup",  function (event)
    { 
        var yofmenu = $("#yofmenu").val();
        if(yofmenu != "")
        {
            cnt7=1;
            dd();
        }
        else
        {
            cnt7=0;
            ee();
        }
    });

    $("#machine_condi").on("blur keyup",  function (event)
    { 
        var machine_condi = $("#machine_condi").val();
        if(machine_condi != "")
        {
            cnt8=1;
            dd();
        }
        else
        {
            cnt8=0;
            ee();
        }
    });

    $("#machine_loc").on("blur keyup",  function (event)
    { 
        var machine_loc = $("#machine_loc").val();
        if(machine_loc != "")
        {
            cnt9=1;
            dd();
        }
        else
        {
            cnt9=0;
            ee();
        }
    });

    $("#product_desc").on("blur keyup",  function (event)
    { 
        var product_desc = $("#product_desc").val();
        if(product_desc != "")
        {
            cnt10=1;
            dd();
        }
        else
        {
            cnt10=0;
            ee();
        }
    });

    $("#w_approx").on("blur keyup",  function (event)
    { 
        var w_approx = $("#w_approx").val();
        if(w_approx != "")
        {
            cnt11=1;
            dd();
        }
        else
        {
            cnt11=0;
            ee();
        }
    });

    $("#s_d_approx").on("blur keyup",  function (event)
    { 
        var s_d_approx = $("#s_d_approx").val();
        if(s_d_approx != "")
        {
            cnt12=1;
            dd();
        }
        else
        {
            cnt12=0;
            ee();
        }
    });

    function dd()
    {
      if (cnt4 !=0 && cnt5 !=0 && cnt6 !=0 && cnt7 !=0 && cnt8 !=0 && cnt9 !=0 && cnt10 !=0 && cnt11 !=0 && cnt12 !=0)
      {
        $('.next').removeAttr('disabled');
      }
    };

    function ee()
    {
        $(".next").prop("disabled", true);
    };

    $(".next").click(function()
    {

      var cnt=0;
      if(itemname=="")
      {
          $("#itemname").notify("Enter Product Name!");
          cnt=1;
          $("html, body").scrollTop(0);
      }
      if (manufacturer=="") 
      {
          $("#manufacturer").notify("Select Category!");
          cnt=1;
          $("html, body").scrollTop(0);
      }
      if(model_type=="")
      {
          $("#model_type").notify("Enter Summary!");
          cnt=1;
          $("html, body").scrollTop(0);
      }
      if(yofmenu=="")
      {
          $("#yofmenu").notify("Enter Other Category Information!");
          cnt=1;
          $("html, body").scrollTop(0);
      }
      if(machine_condi=="")
      {
          $("#machine_condi").notify("Enter !");
          cnt=1;
          $("html, body").scrollTop(0);
      }
      if(machine_loc=="")
      {
          $("#machine_loc").notify("Enter !");
          cnt=1;
          $("html, body").scrollTop(0);
      }
      if(product_desc=="")
      {
          $("#product_desc").notify("Enter !");
          cnt=1;
          $("html, body").scrollTop(0);
      }
      if(w_approx=="")
      {
          $("#w_approx").notify("Enter !");
          cnt=1;
          $("html, body").scrollTop(0);
      }
      if(s_d_approx=="")
      {
          $("#s_d_approx").notify("Enter !");
          cnt=1;
          $("html, body").scrollTop(0);
      }
      if(cnt==0)
      {   current_step = $(this).parent();
          next_step = $(this).parent().next();
          next_step.show();
          current_step.hide();
          setProgressBar(++current);
      }
    });

    $(".previous").click(function()
    {
      current_step = $(this).parent();
      next_step = $(this).parent().prev();
      next_step.show();
      current_step.hide();
      setProgressBar(--current);
    });

    setProgressBar(current);
    function setProgressBar(curStep)
    {
      var percent = parseFloat(100 / steps) * curStep;
      percent = percent.toFixed();
      $(".progress-bar")
        .css("width",percent+"%")
        .html(percent+"%");   
    };

});


    $("#category").change (function () 
    {
        var id=$(this).val();
        // alert($id);
        if (id=="18")
        {
            //alert('hey');
            $("#subcategory select").val("0");
            $("#subcatother").val("");
            $("#subcategorydiv").removeClass( "block" ).addClass( "none" );
            $("#subcatother").removeClass( "block" ).addClass( "none" );
            $("#catother").removeClass( "none" ).addClass( "block" );
        }
        else if (id=="0")
        {
            $("#subcategory select").val("0");
            $("#subcatother").val("");
            $("#subcategorydiv").removeClass( "block" ).addClass( "none" );
            $("#subcatother").removeClass( "block" ).addClass( "none" );
        }
        else
        {
            $.ajax({
              url: 'subcategory',
              type: 'POST',
              data: {id:id},
              success: function(response)
              {
                //console.log(response);
                if (response=='') 
                {
                  $("#subcategorydiv").removeClass( "block" ).addClass( "none" );
                  alertify.error('This Category Has no Subcategory!');
                }
                else
                {
                  $("#catother").removeClass( "block" ).addClass( "none" );
                  $("#subcategorydiv").removeClass( "none" ).addClass( "block" );
                  $("#subcatother").removeClass( "block" ).addClass( "none" );
                  $("#subcategory").html(response);
                }
              }
            });
        }
    });

    $("#subcategory").change (function () 
    {
        var id=$(this).val();
        if(id=="other")
        {
            $("#subcatother").removeClass( "none" ).addClass( "block" );
        }
        else
        {
            $("#subcatother").removeClass( "block" ).addClass( "none" );   
        }
    });

    $("#submit").on("click", function ()
    {
        images="0";
        $('.upimg').each(function(index)
        {
          images=images+","+$(this).attr('download');
        });
        
        var main_image=$('input[name=defaultimg]:checked').val();
        var pic= $("#product_pic").val();
        var name= $("#product_name").val();
        var summary= $("#product_summary").val();
        var category= $("#category").val();
        var subcategory= $("#subcategory").val();
        var catotherinfo= $("#catotherinfo").val();
        var subcatotherinfo= $("#subcatotherinfo").val();

        var itemname = $("#itemname").val();
        var manufacturer = $("#manufacturer").val();
        var model_type = $("#model_type").val();
        var yofmenu = $("#yofmenu").val();
        var machine_condi = $("#machine_condi").val();
        var machine_loc = $("#machine_loc").val();
        var product_desc = $("#product_desc").val();
        var w_approx = $("#w_approx").val();
        var s_d_approx = $("#s_d_approx").val();

        var cnt=0;
        if(pic=="")
        {
            alert("Please Upload Picture.");
            cnt=1;
        }
        if(cnt==0)
        {
            $.ajax({
                url :'upload_product',
                type: 'POST',
                data:{
                      name:name,
                      summary:summary,
                      main_image:main_image,
                      images:images,
                      category:category,
                      subcategory:subcategory,
                      catotherinfo:catotherinfo,
                      subcatotherinfo:subcatotherinfo,
                      itemname:itemname,
                      manufacturer:manufacturer,
                      model_type:model_type,
                      yofmenu:yofmenu,
                      machine_condi:machine_condi,
                      machine_loc:machine_loc,
                      product_desc:product_desc,
                      w_approx:w_approx,
                      s_d_approx:s_d_approx
                     },
                success : function (data)
                {
                    var obj = jQuery.parseJSON(data);                
                    //console.log(obj);
                    if(obj['status'] == 'success')
                    {
                        alertify.success('Product Details Uploaded!');
                        window.location.href = "<?php echo site_url('sellercontroller/viewproduct'); ?>";
                    }
                    else
                    {
                        alertify.error('Product Details Not Uploaded!');
                        //window.setTimeout(function(){location.reload()},500)
                    }
                }
            });
        }
    });

</script>
<script>
  $(function () {
    $('.textarea').wysihtml5()
  })
</script>
<!-- Alertify JS -->
 <script>
   // tooltip demo
   $('.tooltip-div').tooltip({
     selector: "[data-toggle=tooltip]",
     container: "body"
   });
</script>

<script>

$(document).ready(function()
{


function load_unseen_notification(view = '')

{

 $.ajax({

  url:"<?php echo site_url('sellercontroller/fetch_notification');?>",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)

  {
   $('.menu').html(data.notification);

   if(data.unseen_notification > 0)
   {
    $('#ntf').html(data.unseen_notification);
   }

  }

 });

}

load_unseen_notification();

// submit form and get new records


// load new notifications

 $("#ntff").click(function (event) {
        //Do stuff when clicked
    
   // alert("Fsf");
  $('#ntf').html('');

 load_unseen_notification('yes');

});

setInterval(function(){

 load_unseen_notification();;

}, 5000);

});

</script>


<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
</html>