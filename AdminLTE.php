<?php
  //Connecting, selecting database
  $link = mysql_connect('localhost', 'root', '') or die('Could not connect:'. msql_error());
  mysql_select_db('showroommobil') or die('Could not select database');

  //Menetapkan nama dari button
  $button_name = "btn-tambah";
  $button = "Tambah Data";
  
  //Proses yang dijalankan ketika button edit di klik 
  if (isset($_POST['btn-edit'])) {
      $editt_id = $_POST['0'];
      $editt_merk = $_POST['1'];
      $editt_model = $_POST['2'];
      $editt_tipe = $_POST['3'];
      $editt_pintu = $_POST['4'];
      $editt_tahun_produksi = $_POST['5'];
      $editt_query = "UPDATE mobil SET Id_Mobil='$editt_id',Merk='$editt_merk',Model='$editt_model',Tipe='$editt_tipe',Pintu='$editt_pintu',Tahun_Produksi='$editt_tahun_produksi' WHERE Id_Mobil='$editt_id'";
      $result_editt = mysql_query($editt_query) or die('Query failed: ' . mysql_error());
      if ($result_editt) {
        echo "Data Berhasil Diedit";
        $success = "Diedit";
        header("refresh:3");
      } else {
        echo "Data Gagal Diedit";
        $failed = "Diedit";
        header("refresh:3");
      }
  }

  //Proses yang dijalankan ketika button tambah di klik 
  if (isset($_POST['btn-tambah'])) {
      $tambah_id = $_POST['0'];
      $tambah_merk = $_POST['1'];
      $tambah_model = $_POST['2'];
      $tambah_tipe = $_POST['3'];
      $tambah_pintu = $_POST['4'];
      $tambah_tahun_produksi = $_POST['5'];
      $tambah_query = "INSERT INTO mobil(Id_Mobil,Merk,Model,Tipe,Pintu,Tahun_Produksi)
      VALUES ('$tambah_id','$tambah_merk','$tambah_model','$tambah_tipe','$tambah_pintu','$tambah_tahun_produksi')";
      $result_tambah = mysql_query($tambah_query) or die('Query failed: ' . mysql_error());
      if ($result_tambah) {
        echo "Data Berhasil Ditambah";
        $success = "Ditambah";
        header("refresh:2");
      } else {
        echo "Data Gagal Ditambah";
        $failed = "Ditambah";
        header("refresh:2");
      }
      }   

  if (isset($_POST['action']) && isset($_POST['id'])) {
    //Proses yang dijalankan ketika button Edit di klik 
    if ($_POST['action'] == 'Edit') {
      $id_data = $_POST['id'];
      $edit_query = "SELECT * FROM mobil WHERE Id_Mobil = '$id_data'";
      $result_edit = mysql_query($edit_query) or die('Query failed: ' . mysql_error());
      $get_edit = mysql_fetch_array($result_edit, MYSQL_NUM);
      $edit_id = $get_edit[0];
      $edit_merk = $get_edit[1];
      $edit_model = $get_edit[2];
      $edit_tipe = $get_edit[3];
      $edit_pintu = $get_edit[4];
      $edit_tahun_produksi = $get_edit[5];
      $button_name = "btn-edit";
      $button = "Edit Data";
  } elseif ($_POST['action'] == 'Delete') {
      //Proses yang dijalankan ketika button Delete di klik 
      $id_data = $_POST['id'];
      $delete_query = "DELETE FROM mobil WHERE Id_Mobil = '$id_data'";
      $result_delete = mysql_query($delete_query) or die('Query failed: ' . mysql_error());
      if ($result_delete) {
        echo "Data Berhasil Dihapus";
        $failed = "Dihapus";
        header("refresh:2");
      } else {
        echo "Data Gagal Dihapus";
        $failed = "Dihapus";
        header("refresh:2");
      }
  }
}


?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Thio Van Agusti</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Thio Van Agusti</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Tabel</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Menu</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Menu Saya</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Menu Saya 1</a></li>
            <li><a href="#">Menu Saya 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li class="active"></li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

    <?php 
    if(isset($success))
    {
      ?>
        <div class='alert alert-success'>
        <button class='close' data-dismiss='alert'>&times;</button>
        <strong>Success!</strong> Data Berhasil <?php echo $success ?>
      </div>
    <?php
    }
    ?>

    <?php 
    if(isset($failed))
    {
      ?>
        <div class='alert alert-danger'>
        <button class='close' data-dismiss='alert'>&times;</button>
        <strong>Success!</strong> Data Berhasil <?php echo $failed ?>
      </div>
    <?php
    }
    ?>

     <div class="box box-success container">
  <h2>Data Mobil</h2>
  <hr>
  <form id="edit" method="POST">

        <div class="form-group col-md-6">
          <label>ID Mobil:</label>
          <input name="0" type="text" class="form-control" placeholder="ID Mobil" value="<?php if (isset($edit_id)) { echo "$edit_id"; } ?>">
        </div>
        <div class="form-group col-md-6">
          <label>Merk:</label>
          <input name="1" type="text" class="form-control" placeholder="Merk" value="<?php if (isset($edit_merk)) { echo "$edit_merk"; } ?>">
        </div>
         <div class="form-group col-md-6">
          <label>Model:</label>
          <input name="2" type="text" class="form-control" placeholder="Model" value="<?php if (isset($edit_model)) { echo "$edit_model"; } ?>">
        </div>
         <div class="form-group col-md-6">
          <label>Tipe:</label>
          <input name="3" type="text" class="form-control" placeholder="Tipe" value="<?php if (isset($edit_tipe)) { echo "$edit_tipe"; } ?>">
        </div>
         <div class="form-group col-md-6">
          <label>Pintu:</label>
          <input name="4" type="text" class="form-control" placeholder="Pintu" value="<?php if (isset($edit_pintu)) { echo "$edit_pintu"; } ?>">
        </div>
         <div class="form-group col-md-6">
          <label>Tahun Produksi:</label>
          <input name="5" type="text" class="form-control" placeholder="Tahun Produksi" value="<?php if (isset($edit_tahun_produksi)) { echo "$edit_tahun_produksi"; } ?>">
        </div>

        <button name="<?php if (isset($button_name)) { echo "$button_name"; } ?>" type="submit" class="btn btn-success col-md-offset-4 col-md-4" style="margin-top: 20px; margin-bottom: 40px;"><?php if (isset($button)) { echo "$button"; } ?></button>
      </form>
</div>
<br>

<form method="POST">

<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h2 class=""><center>Data Mobil</center></h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th><center>ID MOBIL</center></th>
                  <th><center>MERK</center></th>
                  <th><center>MODEL</center></th>
                  <th><center>TIPE</center></th>
                  <th><center>PINTU</center></th>
                  <th><center>TAHUN PRODUKSI</center></th>
                  <th><center>OPERASI</center></th>
                </tr>
               
  <?php

  $query = 'SELECT * FROM mobil';
  $result = mysql_query($query) or die('Query failed: ' . mysql_error());
  while ($get = mysql_fetch_array($result, MYSQL_NUM))
  {
      $id = $get[0];
      $merk = $get[1];
      $model = $get[2];
      $tipe = $get[3];
      $pintu = $get[4];
      $tahun_produksi = $get[5];
      echo "<tr>";
        if ($merk == "Toyota") {
          $color_merk = "<span class='badge bg-blue'>$merk</span>";
        } elseif ($merk == "Honda") {
          $color_merk = "<span class='badge bg-yellow'>$merk</span>";
        } elseif ($merk == "Audi") {
          $color_merk = "<span class='badge bg-blue'>$merk</span>";
        } elseif ($merk == "BMW") {
          $color_merk = "<span class='badge bg-green'>$merk</span>";
        } elseif ($merk == "Mercedez Benz") {
          $color_merk = "<span class='badge bg-grey'>$merk</span>";
        } elseif ($merk == "  Lamborghini") {
          $color_merk = "<span class='badge bg-orange'>$merk</span>";
        } else {
          $color_merk = "<span class='badge bg-blue'>$merk</span>";
        }

        if ($pintu == "2") {
          $progress_pintu = "<div class='progress progress-xs progress-striped active'> <div class='progress-bar progress-bar-success' style='width: 40%'></div></div>";
        } elseif ($pintu == "3") {
          $progress_pintu = "<div class='progress progress-xs progress-striped active'> <div class='progress-bar progress-bar-success' style='width: 60%'></div></div>";
        } elseif ($pintu == "4") {
          $progress_pintu = "<div class='progress progress-xs progress-striped active'> <div class='progress-bar progress-bar-success' style='width: 80%'></div></div>";
        } else {
          $progress_pintu = "<div class='progress progress-xs progress-striped active'> <div class='progress-bar progress-bar-success' style='width: 100%'></div></div>";
        }

        echo "<td><center>$id</center></td>";
        echo "<td><center>$color_merk</center></td>";
        echo "<td><center>$model</center></td>";
        echo "<td><center>$tipe</center></td>";
        echo "<td><center>$progress_pintu</center></td>";
        echo "<td><center>$tahun_produksi</center></td>";

        echo "<form method='post' action=''>";
        echo "<td><input class='btn btn-primary' type='submit' name='action' value='Edit'/> ";
        echo "<input class='btn btn-danger' type='submit' name='action' value='Delete'/></td>";
        echo "<input type='hidden' name='id' value='$get[0]'/>";
      echo "</form>";
      echo "</tr>";
    }
  echo "</table>";
  //Free resultset
  mysql_free_result($result);
  //Closing connection
  mysql_close($link);
  ?>
  </table>
  </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
