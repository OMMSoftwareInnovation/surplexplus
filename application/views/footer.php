    
   <div class="footer">
      <div class="wrap">    
         <div class="section group">
                <div class="col_1_of_4 span_1_of_4">
                        <h4>Information</h4>
                        <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Customer Service</a></li>
                        <li><a href="#">Advanced Search</a></li>
                        <li><a href="#">Orders and Returns</a></li>
                        <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                <div class="col_1_of_4 span_1_of_4">
                    <h4>Why buy from us</h4>
                        <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Customer Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Site Map</a></li>
                        <li><a href="#">Search Terms</a></li>
                        </ul>
                </div>
                <div class="col_1_of_4 span_1_of_4">
                    <h4>My account</h4>
                        <ul>
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                </div>
                <div class="col_1_of_4 span_1_of_4" style="height: 189px;">
                    <h4>Contact</h4>
                        <ul>
                            <li><span>+91-123-456789</span></li>
                            <li><span>+00-123-000000</span></li>
                        </ul>
                        <!-- <div class="social-icons">
                            <h4>Follow Us</h4>
                              <ul>
                                  <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>assets/images/facebook.png" alt="" /></a></li>
                                  <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>assets/images/twitter.png" alt="" /></a></li>
                                  <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>assets/images/skype.png" alt="" /> </a></li>
                                  <li><a href="#" target="_blank"> <img src="<?php echo base_url(); ?>assets/images/dribbble.png" alt="" /></a></li>
                                  <li><a href="#" target="_blank"> <img src="<?php echo base_url(); ?>assets/images/linkedin.png" alt="" /></a></li>
                                  <div class="clear"></div>
                             </ul>
                        </div> -->
                </div>
            </div>          
        </div>
        <div class="copy_right">
                <p><i class="footer-ui">Surplex+</i> © All rights Reseverd | Design by  <a class="footer-ui1" href="http://ommsoftware.com/">Omm Software</a> </p>
           </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {          
            $().UItoTop({ easingType: 'easeOutQuart' });            
        });
        
    </script>
    <a href="#" id="toTop" style="bottom: -7px;"><span id="toTopHover"> </span></a>
    <script type="text/javascript">

    $(document).ready(function(){
            $("#search-box").autocomplete({
                minLength: 1,
                source: 
                function(req, add){
                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/homecontroller/searchbar",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:    
                        function(data){
                            if(data.response =="true"){
                                add(data.message);
                            }
                        },
                    });
                },
            select: 
                function(event, ui) {
                    
                    window.location.href = '<?php  echo base_url();?>'+"index.php/homecontroller/results/"+ui.item.id ;             
                },      
            });
    });
</script>
</body>
</html>

