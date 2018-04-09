<link href="<?php echo base_url(); ?>assets/css/register.css" rel="stylesheet" type="text/css" media="all"/>
<div class="main">
<div class="modal-dialog modal-lg">
        <div class="modal-content">
<div class="tab-pane" id="Registration1">

                                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('homecontroller/seller_registraion'); ?>">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Title</label>
                                    <div class="col-sm-2">
                                        <select class="form-control"  name="name1">
                                            <option>Mr.</option>
                                            <option>Ms.</option>
                                            <option>Mrs.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Name <span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('name2'); ?>
                                        <input type="text" name="name2" id="name2" class="form-control" placeholder="Name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Username <span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('username'); ?>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                                        <a href="javascript:void(0);" id="chk_avail"><span>Check Availability</span></a>
                                        <div id="msgbx_err" class="alert-box error1"><span>error: </span>User already exist with same name.</div>
                                        <div id="msgbx_err2" class="alert-box error1"><span>error: </span>Type atleast 3 alphabets.</div>
                                        <div id="msgbx_success" class="alert-box success"><span>success: </span>Username available.</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email <span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('email'); ?>
                                        <input type="email" class=" chkemail form-control " id="email" name="email" placeholder="Email" />
                                        <div id="msgbx_err1" class="alert-box error1"><span>error: </span>This Email Already Exits.</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Mobile <span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('mobile'); ?>
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Company Name <span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('company_name'); ?>
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Company Address <span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('company_address'); ?>
                                        <input type="text" class="form-control" id="company_address" name="company_address" placeholder="Address" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        GSTIN Number <span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control gstinnumber" id="company_address" name="gstinnumber" placeholder="Address" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password <span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <?php echo form_error('password'); ?>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Confirm Password <span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-sm" id="seller_submit" disabled>
                                            Submit</button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            Cancel</button>
                                        <span style="color:red;margin-left: 35%;font-style: italic;">(The fields marked with an asterisk (*) are mandatory.)</span>
                                    </div>
                                </div>
                                </form>
                            </div></div></div>



 </div>
</div>

<style type="text/css">
    .alert-box { color:#555; box-shadow: 0 0px 2px rgba(0,0,0,.5); font-family:Tahoma,Geneva,Arial,sans-serif;font-size:12px; padding:10px 10px 10px 36px; margin:10px; } 
            .alert-box span { font-weight:bold; text-transform:uppercase; } 
            .error1 { background:#ffecec; border:1px solid #f5aca6; } 
            .success { background:#e9ffd9; border:1px solid #a6ca8a; } 
            #msgbx_err{ display: none; } 
            #msgbx_success{ display: none; } 
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(function() {

        var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

            function validatePassword(){
              if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
              } else {
                confirm_password.setCustomValidity('');
              }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;


    var  cnt=0;
        $('#chk_avail').click(function() 
        {
            var name =$('#username').val();
            if (name.length >= 3) 
            {
                $.post('<?php echo site_url('homecontroller/chk_seller_usr'); ?>', {seller_username: name}, function(d) {
                    if (d == 1)
                    {
                        $('#msgbx_success').css('display', 'none');
                        $('#msgbx_err').css('display', 'block') ;
                        $('#msgbx_err2').css('display', 'none');
                    }
                    else
                    {
                      if(cnt==2){
                        $("#seller_submit").removeAttr("disabled");
                         }else{
                            cnt++;
                         }
                        $('#msgbx_err').css('display', 'none');
                        $('#msgbx_success').css('display', 'block');
                        $('#msgbx_err2').css('display', 'none');
                    }
                });
            }
            else
            {
                $('#msgbx_err').css('display', 'none');
                $('#msgbx_success').css('display', 'none');
                $('#msgbx_err2').css('display', 'block');             
            }
        });

        function ValidateEmail(mail)   
        {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  
            {  
                return (true)
            }
            return (false)
        } 

        $( "#email" ).keyup(function() 
        {
            var aa=ValidateEmail($("#email").val());
            if(aa==true)
            {
                var name = $('#email').val();
                $.post('<?php echo site_url('homecontroller/chk_seller_email'); ?>', {seller_email: name}, function(d) 
                {
                    if (d == 1)
                    {
                        $('#msgbx_err1').css('display', 'block');
                    }
                    else
                    {
                        if(cnt==2)
                        {
                            $("#seller_submit").removeAttr("disabled");
                        }
                        else
                        {
                            cnt++;
                        }
                        $('#msgbx_err1').css('display', 'none');
                    }
                });
                $( "#email" ).removeClass( "chkemail" ).addClass( "validemail" );
            }
            else
            {
                $( "#email" ).removeClass( "validemail" ).addClass( "chkemail" );         
            }
        });
     
    });
</script>
<script>
  $(document).on('change',".gstinnumber", function(){    
    var inputvalues = $(this).val();
    var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
    
    if (gstinformat.test(inputvalues)) {
     return true;
    } else {
        alert('Please Enter Valid GSTIN Number');
        $(".gstinnumber").val('');
        $(".gstinnumber").focus();
    }
    
});
</script>