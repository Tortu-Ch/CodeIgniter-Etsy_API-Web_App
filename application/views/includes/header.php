<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> KISP </title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="<?php echo $url->assets ?>img/favicon.png">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $url->assets ?>bootstrap/css/Chart.min.css">


    <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/bootstrap-daterangepicker/daterangepicker.css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/Ionicons/css/ionicons.min.css">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/datatables.net-bs/css/dataTables.bootstrap.min.css" />
  
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/select2/dist/css/select2.min.css" />


  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  <!-- Uncomment the below code if you want to use official AdminLte Theme -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="<?php //echo $url->assets ?>css/AdminLTE.min.css"> -->

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>/css/app.css" />
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- jQuery 3 -->
  <script src="<?php echo $url->assets ?>js/jquery/jquery.min.js"></script>


  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo $url->assets ?>plugins/jqueryUi/jquery-ui.min.js"></script>

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
  $.widget.bridge('uibutton', $.ui.button);
  </script>

  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo $url->assets ?>bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo $url->assets ?>bootstrap/js/Chart.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo $url->assets ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>

  <!-- FastClick -->
  <script src="<?php echo $url->assets ?>plugins/fastclick/lib/fastclick.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo $url->assets ?>css/jquery.datetimepicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $url->assets ?>css/jquery.datepicker.css"/>
    <script src="<?php echo $url->assets ?>js/jquery/jquery.js"></script>
    <script src="<?php echo $url->assets ?>js/jquery/jquery.datetimepicker.full.js"></script>
    <script src="<?php echo $url->assets ?>js/jquery/jquery.datepicker.js"></script>
    <script src="<?php echo $url->assets ?>js/jquery/jquery.blockUI.js"></script>
    <style>
    .img-avtar{
      border-radius: 50%;
    }

    aside.main-sidebar
    {
        scroll-padding: 20px;
    }
    input.font{
        margin-top: 12px;
        font-size: 15px;
        border: 0px;
    }
    ul.mylog
    {
        text-align: center;
        margin-top: 12px;
        width: 120px;
    }

    level{

    }

    .content-header {
        padding: 20px 25px 0px 30px;;
    }
  </style>
  <script>

      function form_submit() {
          $.blockUI({ css: {
                  border: 'none',
                  padding: '15px',
                  backgroundColor: '#fff',
                  '-webkit-border-radius': '10px',
                  '-moz-border-radius': '10px',
                  opacity: .5,
                  color: '#000'
              } });
          $('.navbar-form').submit();
      }

      function UtC_4_Time(utc_4Offsetval=-4) {
          // create Date object for current location
          d = new Date();

          // convert to msec
          // add local time zone offset
          // get UTC time in msec
          utc = d.getTime() + (d.getTimezoneOffset() * 60000);

          // create new Date object for different city
          // using supplied offset
          nd = new Date(utc + (3600000*utc_4Offsetval));
          // return time as a string
          return nd;
      }
        /*jslint browser:true*/
        /*global jQuery, document*/
     jQuery(document).ready(function () {

        $('.select2').select2();
         jQuery('#bdate,#edate').datetimepicker({
             maxDate:moment,
             timepicker:false,
             format:'Y-m-d'
         });

        $('#bdate,#edate').change(function () {
            if($('#bdate').val() > $('#edate').val())
            {
                $('#edate').val($('#bdate').val());
                form_submit();
            }
            else if($('#bdate').val() != '' && $('#edate').val() != '')
            {
                form_submit();
            }
        });
     });
    </script>
</head>
<body class="hold-transition skin-custom sidebar-mini">
<input hidden id = 'maxdate' value = "<?php echo $page->maxdate;?>">
<input hidden id = 'mindate' value="<?php echo $page->mindate;?>">
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
                <!-- Logo -->
        <a href="<?php echo url('/') ?>" class="logo">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="<?php echo url('/') ?>assets/img/logo2.png"></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->

        <nav class="navbar navbar-static-top" id="top_head">
            <form action="#" method="post" class="navbar-form" autocomplete="off" style="border: 0px; margin-top: 0px">
                <input hidden name="topItem" value="<?php echo $page->topItem?>">
                <input hidden name="subItem" value = "<?php echo $page->subItem?>">
                <input hidden name="subsubItem" value = "<?php echo $page->subsubItem?>">
                <input hidden id = "curdatetime" value="<?php echo $page->curdatetime?>">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if ($page->menu=='main'){
                    ?>
                    <div class="input-group">
                        <input readonly class = "font" value="Keyword:" style="width:60px">
                        <select  name="sh_keyword" id="sh_keyword" onchange="javascript:form_submit()"
                                 class="form-control select2" style="width:210px;">
                            <option value="">Select keyword</option>
                            <?php
                            $search_Item = $this->Reservation_model->getkeyword(0);
                            var_dump($search_Item);
                            if($search_Item) {
                                foreach ($search_Item as $row): ?>
                                    <?php $sel = ($row->id == $page->keywordId) ? 'selected' : '' ?>
                                    <option value="<?php echo $row->id ?>" <?php echo $sel; ?>><?php echo $row->keyword ?></option>
                                <?php endforeach;
                            }
                            ?>
                        </select>
                    </div>
                    <?php if($page->keywordId > 0) { ?>
                        <div class="input-group">
                            <input readonly class="font text-right" value="Date:" style="width:100px">
                            <input type="text" class='search_date text-center' readonly id="bdate" name="bdate"
                                   placeholder="Select datetime" value="<?php echo $page->bdate; ?>"
                                   style="width:120px; height:32px;">
                            <input readonly class="font text-center" value="to" style="width:50px">
                            <input type="text" class='search_date text-center' readonly id="edate" name="edate"
                                   placeholder="Select datetime" value="<?php echo $page->edate; ?>" style="width:120px; height:32px;">
                        </div>
                        <?php
                    }
                }
                ?>
            <div class="navbar-custom-menu">
                <ul class="mylog nav navbar-nav align-text-bottom" style="font-size: medium;">
                    <a href="<?php echo url('profile') ?>">Profile</a>                    &nbsp;&nbsp;
                    <a href="<?php echo url('/logout') ?>">Logout</a>                    &nbsp;&nbsp;
                </ul>
            </div>
            </form>
         </nav>

    </header>

    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar" id="left_menu">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
             <!-- search form -->
            <form action="#" method="post" class="sidebar-form" autocomplete="off" style="border: 0px">
                <input hidden name = 'bdate' id = 'bdate' value="<?php echo $page->bdate?>">
                <input hidden name = 'edate' id = 'edate' value="<?php echo $page->edate?>">
                <input hidden name="topItem" id="topItem" value="">
                <input hidden name="subItem" id="subItem" value = "">
                <input hidden name="subsubItem" id="subsubItem" value = "">
                <input hidden value = <?php echo $page->keywordId;?> name = 'sh_keyword' id = 'sh_keyword'>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php include 'nav.php' ?>
            </form>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <?php include 'notifications.php'; ?>

