<style type="text/css">
.timeline {
    position: relative;
    padding: 21px 0px 10px;
    margin-top: 20px;
    margin-bottom: 30px;
}

.timeline .line {
    position: absolute;
    width: 4px;
    display: block;
    background: currentColor;
    top: 0px;
    bottom: 0px;
    margin-left: 59px;
}

.timeline .separator {
	background: whitesmoke;
    border: 1px solid currentColor;
    padding: 5px;
    padding-left: 40px;
    font-style: italic;
    font-size: .9em;
    margin-left: 30px;
    border-radius: 1px;    
}

.timeline .panel {
    position: relative;
    margin: 10px 0px 21px 82px;
    clear: both;
}
.timeline .panel .panel-heading.icon * { font-size: 20px; vertical-align: middle; line-height: 40px; }
.timeline .panel .panel-heading.icon {
    position: absolute;
    left: -90px;
    display: block;
    width: 40px;
    height: 40px;
    padding: 0px;
    border-radius: 0%;
    text-align: center;
    float: left;
}

.timeline .panel::before {
    position: absolute;
    display: block;
    top: 8px;
    left: -24px;
    content: '';
    width: 0px;
    height: 0px;
    border: inherit;
    border-width: 12px;
    border-top-color: transparent;
    border-bottom-color: transparent;
    border-left-color: transparent;
}

.timeline .panel .panel-heading.icon * { font-size: 20px; vertical-align: middle; line-height: 40px; }
.timeline .panel .panel-heading.icon {
    position: absolute;
    left: -70px;
    display: block;
    width: 40px;
    height: 40px;
    padding: 0px;
    border-radius: 0%;
    text-align: center;
    float: left;
}
.container
{
	width: 1077px;
}
.panel-primary>.panel-heading {
    color: #5d5555;
    background-color: #ffffff;
    border-color: #ffffff;
}
.calendar-text { margin-top: .3em; }
/*  body {
        padding: 60px 0px;
        background-color: rgb(220, 220, 220);
    }
*/    
    .event-list {
        list-style: none;
        font-family: 'Lato', sans-serif;
        margin: 0px;
        padding: 0px;
    }
    .event-list > li {
        background-color: rgb(255, 255, 255);
        box-shadow: 0px 0px 5px rgb(51, 51, 51);
        box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.7);
        padding: 0px;
        margin: 0px 0px 20px;
    }
    .event-list > li > time {
        display: inline-block;
        width: 100%;
        color: rgb(255, 255, 255);
        background-color: rgb(197, 44, 102);
        padding: 5px;
        text-align: center;
        text-transform: uppercase;
    }
    .event-list > li:nth-child(even) > time {
        background-color: rgb(165, 82, 167);
    }
    .event-list > li > time > span {
        display: none;
    }
    .event-list > li > time > .day {
        display: block;
        font-size: 56pt;
        font-weight: 100;
        line-height: 1;
    }
    .event-list > li time > .month {
        display: block;
        font-size: 24pt;
        font-weight: 900;
        line-height: 1;
    }
    .event-list > li > img {
        width: 100%;
    }
    .event-list > li > .info {
        padding-top: 5px;
        text-align: center;
    }
    .event-list > li > .info > .title {
        font-size: 15pt;
        font-weight: 700;
        margin: 0px;
    }
    .event-list > li > .info > .desc {
        font-size: 13pt;
        font-weight: 300;
        margin: 0px;
    }
    .event-list > li > .info > ul,
    .event-list > li > .social > ul {
        display: table;
        list-style: none;
        margin: 10px 0px 0px;
        padding: 0px;
        width: 100%;
        text-align: center;
    }
    .event-list > li > .social > ul {
        margin: 0px;
    }
    .event-list > li > .info > ul > li,
    .event-list > li > .social > ul > li {
        display: table-cell;
        cursor: pointer;
        color: rgb(30, 30, 30);
        font-size: 11pt;
        font-weight: 300;
        padding: 3px 0px;
    }
    .event-list > li > .info > ul > li > a {
        display: block;
        width: 100%;
        color: rgb(30, 30, 30);
        text-decoration: none;
    } 
    .event-list > li > .social > ul > li {    
        padding: 0px;
    }
    .event-list > li > .social > ul > li > a {
        padding: 3px 0px;
    } 
    .event-list > li > .info > ul > li:hover,
    .event-list > li > .social > ul > li:hover {
        color: rgb(30, 30, 30);
        background-color: rgb(200, 200, 200);
    }
    .facebook a,
    .twitter a,
    .google-plus a {
        display: block;
        width: 100%;
        color: rgb(75, 110, 168) !important;
    }
    .twitter a {
        color: rgb(79, 213, 248) !important;
    }
    .google-plus a {
        color: rgb(221, 75, 57) !important;
    }
    .facebook:hover a {
        color: rgb(255, 255, 255) !important;
        background-color: rgb(75, 110, 168) !important;
    }
    .twitter:hover a {
        color: rgb(255, 255, 255) !important;
        background-color: rgb(79, 213, 248) !important;
    }
    .google-plus:hover a {
        color: rgb(255, 255, 255) !important;
        background-color: rgb(221, 75, 57) !important;
    }

    @media (min-width: 768px) {
        .event-list > li {
            position: relative;
            display: block;
            width: 100%;
            height: 120px;
            padding: 0px;
        }
        .event-list > li > time,
        .event-list > li > img  {
            display: inline-block;
        }
        .event-list > li > time,
        .event-list > li > img {
            width: 120px;
            float: left;
        }
        .event-list > li > .info {
            background-color: white;
            overflow: hidden;
        }
        .event-list > li > time,
        .event-list > li > img {
            width: 180px;
            height: 120px;
            padding: 0px;
            margin: 0px;
        }
        .event-list > li > .info {
            position: relative;
            height: 120px;
            text-align: left;
            padding-right: 40px;
        }   
        .event-list > li > .info > .title, 
        .event-list > li > .info > .desc {
            padding: 0px 10px;
        }
        .event-list > li > .info > ul {
            position: absolute;
            left: 0px;
            bottom: 0px;
        }
        .event-list > li > .social {
            position: absolute;
            top: 0px;
            right: 0px;
            display: block;
            width: 40px;
        }
        .event-list > li > .social > ul {
            border-left: 1px solid rgb(230, 230, 230);
        }
        .event-list > li > .social > ul > li {          
            display: block;
            padding: 0px;
        }
        .event-list > li > .social > ul > li > a {
            display: block;
            width: 40px;
            padding: 10px 0px 9px;
        }
    }
    .panel p
    {
    color: #333333;
    }
    .labelformat
    {
        margin-left: -183px;
        margin-top: 2px;
    }
    .numberDisplay
    {
        font-size: 17px !important;
    }
</style>
<link href="<?php echo base_url(); ?>assets/timer/css/jQuery.countdownTimer.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/timer/js/jQuery.countdownTimer.min.js"></script>

<div class="main">
<div class="row">
	<div class="col-md-12">

		<div class="container">
		    <div class="page-header" style="padding: 0px;margin: 0px; border: 1px solid #e2b8ba; box-shadow: 0px 0px 4px rgba(41,51,57,.5);">
				<h3 id="" style="margin-top: 10px; margin-left: 20px;color: #cd1f25;">Industrial Auctions</h3>
			</div>
		</div>
		<div class="container">

            <div class="timeline">

		        <div class="line text-muted"></div>
            <?php
         
           /*print_r($dt[1]);*/
          
         for ($i=0; $i <count($dt[1]) ; $i++) { 
                             # code...
                              ?>
		  

		        <article class="panel panel-primary">
                    <div class="panel-heading icon">
                    <?php 
                    $datetime = new DateTime($dt[1][$i]['0']);
                 /*  print_r($datetime);
                   die();*/
       echo '            <span class="fa-stack fa-5x">
  <i class="fa fa-calendar-o fa-stack-2x" style="font-size:31px"></i>
  <strong class="fa-stack-1x calendar-text" style="font-size:14px">'.$datetime->format("d").'</strong>
</span>';
                    echo "\n"; 

                    echo $datetime->format('M');
                    ?>
                    </div>
                      <div class="panel-body">
                <ul class="event-list">
         
                        <?php    
                        for($j=1; $j<count($dt[1][$i]); $j++)
                        {       
                        // echo"sss" .$dt[1][$i][$j][0]['auction_title'];
                        ?>

                    <li>
                        
                        <img alt="Surplexplus" src="<?php echo base_url();  echo $dt[1][$i][$j][0]['auction_image'] ?>" />
                        <div class="info">
                            <h3 class="title"><?php echo $dt[1][$i][$j][0]['auction_title']; ?></h3>
                            <p class="desc"><?php 
                            $date = date_create($dt[1][$i][$j][0]['auction_ed_time']);
                            echo   "<i class='fa fa-clock-o' style='font-size: 18px;color:#cd1f25'></i> End Time: ".date_format($date, 'Y/m/d H:i:s') ; 
                            $dat = date_create($dt[1][$i][$j][0]['auction_st_time']);
                            $cate = date_create(date('Y/m/d H:i:s', time()));
                            $A = $dt[1][$i][$j][0]['auction_st_time'];
                            $B = $dt[1][$i][$j][0]['auction_ed_time'];
                            $C = date("Y-m-d h:m:i");
                            ?></p><br>
                            <br>
                            <br>
                            <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('auctioncontroller/auctionproductlist'); ?>">
                                  
<?php
                                  if (strtotime($C) > strtotime($A) && strtotime($C) < strtotime($B)){
   ?>

                                 <button  type="submit" style="margin-top: -20px;" name="acid" class="btn btn-success pull-right" value="<?php echo $dt[1][$i][$j][0]['auction_id']; ?>"><?php echo $dt[1][$i][$j][0]['total']; ?>  Items</button>
     
   <?php    }else{?>
    
                                 <button  style="margin-top: -20px;" name="acid" class="btn btn-success pull-right" value="<?php echo $dt[1][$i][$j][0]['auction_id']; ?>" disabled><?php echo $dt[1][$i][$j][0]['total']; ?>  Items </button>
     

    <?php     }
    ?>                       </form>
                        </div>
                    </li>
                        <?php
                        }
                        ?>
                </ul>
                      </div>
		        </article>
            <?php
            }
            ?>
		    </div>
        </div>
</div>
	</div>
</div>

 </div>

<script type="text/javascript">
      
    $(function()
    {
        var ed = $(".desc").text();
        
          $(function(){
      $(".label_timer").countdowntimer({
          dateAndTime : ed,
          labelsFormat : true,
          displayFormat : "DHMS",
          padZeroes : false,
          timeZone : +5.50,
          beforeExpiryTime : "00:00:03:25",
          beforeExpiryTimeFunction :  beforeExpiryFunc,
          timeUp : timeIsUp,
          borderColor:"#ffffff",
          backgroundColor:"#ffffff",
          size:"xs",
          fontColor:"#cd1f25",
          expiryUrl : "#"
      });
      function beforeExpiryFunc() {
          //Your code
             console.log("sdss");
      }
      function timeIsUp() {
     
          //Your code
      }                             
  });
    });
</script>