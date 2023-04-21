
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Q</b>T</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b> Quản </b>Trị</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if (isset($_SESSION['image']) && !empty($_SESSION['image'])): ?>
                <img src="../../upload/admin/<?php echo (isset($_SESSION['image']))?$_SESSION['image']:"" ?>" alt="" width="30">
              <?php else : ?>
              <img src="../../public/dist/img/avatar.png" class="user-image" alt="User Image">
              <?php endif ?>
              <span class="hidden-xs"><?php echo isset($_SESSION['id']) ? $_SESSION['name'] :"" ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="../../controller/admin/Logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>

          </li>
        </ul>
      </div>
    </nav>
