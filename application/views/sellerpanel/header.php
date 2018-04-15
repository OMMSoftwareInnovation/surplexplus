<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SurplexPlus Seller</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/dist/css/skins/_all-skins.min.css">
  <!-- Alertify style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/alertifyjs/css/alertify.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/alertifyjs/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/alertifyjs/css/themes/semantic.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sellerpanel/alertifyjs/css/themes/bootstrap.min.css">
  <script src="<?php echo base_url() ?>assets/sellerpanel/alertifyjs/alertify.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css">
  .navbar-nav>.notifications-menu>.dropdown-menu>li.header
  {
    border-radius: 0px;
    background-color: #3c8dbc;
    color: #ffffff;
    font-size: 17px;
  }
</style>
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('sellercontroller/index'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">SAP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">SurplexPlus Seller</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li>
            <a href="<?php echo base_url();?>" class="label label-info" style="font-size: 14px;border-radius: 0px;">
              <!-- <img class="logo-dime" style="width: 200px;height: 50px;" src="http://localhost/surplex1/assets/images/logo.jpg" alt=""> --> SurplexPlus Website
            </a>
          </li>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="ntf" ></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" align="center">Notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#" >
                      <i class="fa fa-users text-aqua"></i> 
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo site_url('sellercontroller/notification_view'); ?>" id="ntff">View all</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>assets/sellerpanel/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ($this->session->userdata('username')); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>assets/sellerpanel/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo ($this->session->userdata('username')); ?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div align="center">
                  <a href="<?php echo site_url('homecontroller/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/sellerpanel/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ($this->session->userdata('username')); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>

        <li>
          <a href="<?php echo site_url('sellercontroller/index'); ?>">
            <i class="fa fa-dashboard"></i> 
            <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url('sellercontroller/notification_view'); ?>">
            <i class="fa fa-bell-o"></i> 
            <span>Notifications</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-bag "></i>
            <span>Product Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('sellercontroller/addproduct'); ?>"><i class="fa fa-arrow-circle-right"></i> Add Item</a></li>
            <li><a href="<?php echo site_url('sellercontroller/viewproduct'); ?>"><i class="fa fa-arrow-circle-right"></i> View Items</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-bag "></i>
            <span>Sales Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('sellercontroller/forsaleproduct'); ?>"><i class="fa fa-arrow-circle-right"></i> For Sale Products</a></li>
            <!-- <li><a href="<?php echo site_url('sellercontroller/viewproduct'); ?>"><i class="fa fa-arrow-circle-right"></i> View Product</a></li> -->
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-gavel"></i>
            <span>Auction Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('sellercontroller/addauction'); ?>"><i class="fa fa-arrow-circle-right"></i> New Auction</a></li>
            <li><a href="<?php echo site_url('sellercontroller/pendingauctions'); ?>"><i class="fa fa-arrow-circle-right"></i> Pending Auctions</a></li>
            <li><a href="<?php echo site_url('sellercontroller/activeauctions'); ?>"><i class="fa fa-arrow-circle-right"></i> Approved Auctions</a></li>
            <li><a href="<?php echo site_url('sellercontroller/liveauctions'); ?>"><i class="fa fa-arrow-circle-right"></i> Live Auctions</a></li>
            <li><a href="<?php echo site_url('sellercontroller/closedauctions'); ?>"><i class="fa fa-arrow-circle-right"></i> Closed Auctions</a></li>
            <li><a href="<?php echo site_url('sellercontroller/rejectedauctions'); ?>"><i class="fa fa-arrow-circle-right"></i> Rejected Auctions</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-truck  "></i>
            <span>Order Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('sellercontroller/onrequestorders'); ?>"><i class="fa fa-arrow-circle-right"></i>On Request Orders</a></li>
            <li>
              <a href="<?php echo site_url('sellercontroller/neworders'); ?>">
              <i class="fa fa-arrow-circle-right"></i>
              <span> New Orders</span></a></li>
            <li><a href="<?php echo site_url('sellercontroller/approvedorders'); ?>"><i class="fa fa-arrow-circle-right"></i>Approved Orders</a></li>
            <li><a href="<?php echo site_url('sellercontroller/cancelledorders'); ?>"><i class="fa fa-arrow-circle-right"></i> Rejected Orders</a></li>
          </ul>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-user-circle-o"></i> 
            <span>Profile</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> 
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('sellercontroller/productreport'); ?>"><i class="fa fa-arrow-circle-right"></i> Product Reports</a></li>
            <li><a href="<?php echo site_url('sellercontroller/commissionreport'); ?>"><i class="fa fa-arrow-circle-right"></i> Commission Reports</a></li>
            <li><a href="<?php echo site_url('sellercontroller/commissionreport'); ?>"><i class="fa fa-arrow-circle-right"></i> Auction Reports</a></li>
            <li><a href="<?php echo site_url('sellercontroller/approvedorderreport'); ?>"><i class="fa fa-arrow-circle-right"></i>Approved Orders Reports</a></li>
            <li><a href="<?php echo site_url('sellercontroller/rejectedorderreport'); ?>"><i class="fa fa-arrow-circle-right"></i> Rejected Orders Reports</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->