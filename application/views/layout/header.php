<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CME Admin Panel">
    <meta name="author" content="Arman Sheikh">

    <title>CME Admin Panel</title>

    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="<?=base_url()?>assets/js/modernizr.min.js"></script>
    <!-- jQuery  -->
    <script src="<?=base_url()?>assets/js/jquery.min.js"></script>

    <style>
        #datatable th,#datatable td{
            text-align: center;
        }
    </style>
</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="#" class="logo"><i class="icon-magnet icon-c-logo"></i><span>CME</span></a>
            </div>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left">
                            <i class="ion-navicon"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>

                    <form role="search" class="navbar-left app-search pull-left hidden-xs">
                        <input type="text" placeholder="Search..." class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>


                    <ul class="nav navbar-nav navbar-right pull-right">

                        <li class="hidden-xs">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><i class="icon-user"></i></a>
                            <ul class="dropdown-menu">

                                <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                                <li><a href="<?=site_url("/login/index/logout")?>"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>

                    <li class="text-muted menu-title">Navigation</li>

                    <li>
                        <a href="<?=site_url("dashboard")?>" class="waves-effect active"><i class="ti-home"></i> <span> Dashboard </span> </a>
                    </li>

                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="ti-align-left"></i> <span> Articles </span> </a>
                        <ul class="list-unstyled">
                            <li><a href="<?=site_url("article/add")?>">Add Article</a></li>
                            <li><a href="<?=site_url("article/index")?>">View Articles</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="ti-align-justify"></i> <span> Categories </span> </a>
                        <ul class="list-unstyled">
                            <li><a href="<?=site_url("categories/add")?>">Add Category</a></li>
                            <li><a href="<?=site_url("categories/index")?>">View Categories</a></li>
                        </ul>
                    </li>
                    
                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="ti-align-justify"></i> <span> Cities </span> </a>
                        <ul class="list-unstyled">
                            <li><a href="<?=site_url("cities/add")?>">Add City</a></li>
                            <li><a href="<?=site_url("cities/index")?>">View City</a></li>
                        </ul>
                    </li>
                    
                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="ti-align-justify"></i> <span> Subjects </span> </a>
                        <ul class="list-unstyled">
                            <li><a href="<?=site_url("subjects/add")?>">Add Subject</a></li>
                            <li><a href="<?=site_url("subjects/index")?>">View Subjects</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="ti-support"></i> <span> Handouts </span> </a>
                        <ul class="list-unstyled">
                            <li><a href="<?=site_url("handouts/add")?>">Add Handout</a></li>
                            <li><a href="<?=site_url("handouts/index")?>">View Handouts</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="ti-user"></i> <span> Aptive Panelist </span> </a>
                        <ul class="list-unstyled">
                            <li><a href="<?=site_url("panelist/add")?>">Add Aptive Panelist</a></li>
                            <li><a href="<?=site_url("panelist/index")?>">View Aptive Panelist</a></li>
                        </ul>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->