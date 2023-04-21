<?php
session_start();
  require_once("../../autoload/autoload.php");
  if(isset($_SESSION['id']) && isset($_SESSION['role_id']))
    {
      $id = $_SESSION['id'] ;
      
    }
      
   checkLogin($id);
?>
<!DOCTYPE html>
<html>
<head>
    <?php require_once('../template/head.php') ?>
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <?php require_once ('../template/header.php') ?>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
            <?php require_once ('../template/sidebar.php') ?>
        <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <?php 
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
                switch ($action) {
                    case 'add':
                    # code...
                    include_once("add.php");
                    break;

                    case 'edit':
                    # code...
                    include_once("edit.php");
                    break;

                    default:
                    # code...
                    include_once("list.php");
                    break;
            }
            } else {

                include_once("list.php");

            }
        ?>
        <!-- /.content-wrappeontent Wrapper. Contains page content -->

        <footer class="main-footer">
            <?php require_once ('../template/footer.php') ?>
        </footer>

        <!-- Control Sidebar -->

        <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- link java script  -->
        <?php require_once ('../template/link-java-script.php') ?>
    <!-- end link java script -->
</body>
</html>
