<?php   
if(isset($notify))
{
echo $notify;
}
?>
  <!-- DataTables -->
 <link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <section class="content-header">
      <h1>Buyer's Profile</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
          <div class="col-md-3"></div>
          <div class="col-md-6" style="box-shadow: 0px 0px 2px 0 rgba(0,0,0,0.16), 0px 0px 2px 0 rgba(0,0,0,0.12);border: 1px solid #d2d6de;">

              <h3 class="profile-username text-center" style="font-size: 30px;"><?php echo $data[0]['seller_name']; ?></h3>

              <p class="text-muted text-center"><?php echo $data[0]['seller_email']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Username</b> <a class="pull-right"><?php echo $data[0]['seller_username']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Mobile</b> <a class="pull-right"><?php echo $data[0]['seller_mobile']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Company Name</b> <a class="pull-right"><?php echo $data[0]['seller_company_name']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Company Address</b> <a class="pull-right"><?php echo $data[0]['seller_company_address']; ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <!-- <li><a href="#settings" data-toggle="tab">History</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url() ?>assets/sellerpanel/dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url() ?>assets/sellerpanel/dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input class="form-control input-sm" placeholder="Response">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url() ?>assets/sellerpanel/dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                      <img class="img-responsive" src="<?php echo base_url() ?>assets/sellerpanel/dist/img/photo1.png" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-responsive" src="<?php echo base_url() ?>assets/sellerpanel/dist/img/photo2.png" alt="Photo">
                          <br>
                          <img class="img-responsive" src="<?php echo base_url() ?>assets/sellerpanel/dist/img/photo3.jpg" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <img class="img-responsive" src="<?php echo base_url() ?>assets/sellerpanel/dist/img/photo4.jpg" alt="Photo">
                          <br>
                          <img class="img-responsive" src="<?php echo base_url() ?>assets/sellerpanel/dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <!-- <div class="tab-pane" id="settings">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Product Name</th>
                  <th>Seller Name</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Due Date</th>
                </tr>
                </thead>
                <tbody>
              <?php 
                $cnt=1;
                for ($i=0; $i <count($buyer_fulldata) ; $i++) 
                { 
              ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo $buyer_fulldata[$i]['product_name']; ?></td>
                  <td><?php echo $buyer_fulldata[$i]['seller_id']; ?></td>
                  <td><?php echo $buyer_fulldata[$i]['order_amount']; ?></td>
                  <td><?php echo $buyer_fulldata[$i]['order_status']; ?></td>
                  <td><?php echo $buyer_fulldata[$i]['created_at']; ?></td>
                </tr>
              <?php
                $cnt++;
                }
              ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial No.</th>
                  <th>Product Name</th>
                  <th>Seller Name</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Due Date</th>
                </tr>
                </tfoot>
              </table>
              </div> -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->