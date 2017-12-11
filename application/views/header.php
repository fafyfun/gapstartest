<?php
/**
 * Created by PhpStorm.
 * User: fawaz
 * Date: 4/1/16
 * Time: 3:43 PM
 */

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Marketing Dashboard</title>

    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="<?php echo base_url() ?>assets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url() ?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="<?php echo base_url() ?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

</head>

<body>
<div id="wrapper">


    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">


                          <?php if(isset($_SESSION['logo'])&&!empty($_SESSION['logo'])){ ?>
                          <span>
                                              <img src="<?php echo base_url()."uploads/logo/".$_SESSION['logo'] ?>"/>
                                               </span>
                        <?php } ?>


                    </div>
                    <div class="logo-element">
                       FJ
                    </div>
                </li>
                <!--                <li <?php /*echo   ( $this->router->class =='dashboard')?  'class="active"':'' */ ?> >
                    <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li <?php var_dump() /*echo ( $this->router->class =='dashboard' && $this->router->method == 'index')?  'class="active"':'' */ ?> ><a href="/">Dashboard</a></li>
                        
                    </ul>
                </li>-->

                <li <?php echo ($this->router->class == 'insta' && ($this->router->method == 'authenticate' || $this->router->method == 'index' || $this->router->method == 'generate_report')) ? 'class="active"' : '' ?>>
                    <a href="#"><i class="fa fa-instagram"></i> <span class="nav-label">Instagram</span><span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li <?php echo ($this->router->class == 'insta' && $this->router->method == 'index') ? 'class="active"' : '' ?>>
                            <a href="/gapstar/insta/">Dashboard</a></li>
                        <li <?php echo ($this->router->class == 'insta' && $this->router->method == 'generate_report') ? 'class="active"' : '' ?>>
                            <a href="/gapstar/insta/generate_report">Hashtag Report</a></li>

                            <li <?php echo ($this->router->class == 'insta' && $this->router->method == 'authenticate') ? 'class="active"' : '' ?>>
                                <a href="/gapstar/insta/authenticate">Settings</a>
                            </li>

                    </ul>
                </li>







            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <!--                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                                        <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                                            <div class="form-group">
                                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                                            </div>
                                        </form>-->
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span
                            class="m-r-sm text-muted welcome-message">Welcome <?php echo ucfirst($_SESSION['first_name']); echo (isset($_SESSION['superadmin_fname']))?" - Logged in to: ".$_SESSION['superadmin_fname']:""; echo (isset($_SESSION['admin_fname']))?" > ".$_SESSION['admin_fname']:""; ?> </span>
                    </li>
                    <!--                    <li class="dropdown">
                                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                                <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-messages">
                                                <li>
                                                    <div class="dropdown-messages-box">
                                                        <a href="profile.html" class="pull-left">
                                                            <img alt="image" class="img-circle" src="img/a7.jpg">
                                                        </a>
                                                        <div class="media-body">
                                                            <small class="pull-right">46h ago</small>
                                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="dropdown-messages-box">
                                                        <a href="profile.html" class="pull-left">
                                                            <img alt="image" class="img-circle" src="img/a4.jpg">
                                                        </a>
                                                        <div class="media-body ">
                                                            <small class="pull-right text-navy">5h ago</small>
                                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="dropdown-messages-box">
                                                        <a href="profile.html" class="pull-left">
                                                            <img alt="image" class="img-circle" src="img/profile.jpg">
                                                        </a>
                                                        <div class="media-body ">
                                                            <small class="pull-right">23h ago</small>
                                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="text-center link-block">
                                                        <a href="mailbox.html">
                                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                                <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-alerts">
                                                <li>
                                                    <a href="mailbox.html">
                                                        <div>
                                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="profile.html">
                                                        <div>
                                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                                            <span class="pull-right text-muted small">12 minutes ago</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="grid_options.html">
                                                        <div>
                                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="text-center link-block">
                                                        <a href="notifications.html">
                                                            <strong>See All Alerts</strong>
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>-->


                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <div class="col-lg-6">
                            <h2 id="header-dropdowniD">
                                <i class="fa <?php echo $breadcrumb['icon'] ?>"></i>
                                <?php if (!empty($breadcrumb['head_url'])) { ?>
                                    <a href="<?php echo base_url().$breadcrumb['head_url'] ?>"/> <?php echo $breadcrumb['title'] ?> </a>
                                    <?php }else{
                                            echo $breadcrumb['title'];
                                    }
                                if (!empty($breadcrumb['sub'])) { ?>
                                <i class="fa fa-angle-double-right"></i> <?php echo $breadcrumb['sub'] ?> 

                            <?php } ?>

                                <?php if (!empty($breadcrumb['otherpages'])) { ?>
                                    <button aria-expanded="false" type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                    <?php

                                        foreach($breadcrumb['otherpages'] as $item){
                                            echo '
                                                    <li><a href="'.$item['url'].'">'.$item['name'].'</a></li>

                                                ';
                                        }

                                    } ?></ul>
</h2>
                        </div>
                        <?php if (!empty($breadcrumb['date'])) { ?>
                            <div class="col-lg-6">
                                <div class="pull-right">
                                    <?php

                                    $attributes = array('class' => 'form-inline', 'id' => 'myform');

                                    echo form_open('', $attributes) ?>
                                    <div class="form-group" id="data_5">
                                        <label class="font-noraml">Date Range</label>

                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" id="from" class="input-sm form-control" name="start"
                                                   value="<?php echo $showStart ?>">
                                            <span class="input-group-addon">to</span>
                                            <input type="text" id="to" class="input-sm form-control" name="end"
                                                   value="<?php echo $showEnd ?>">
                                        </div>
                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                    </div>

                                    </form>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="wrapper wrapper-content">
