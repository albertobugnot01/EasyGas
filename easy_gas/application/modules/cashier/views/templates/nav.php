<nav class="main-header sticky-top navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link"  href="<?php echo site_url('cashier/logout');?>">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;"">
    <!-- Brand Logo -->
    <a href="<?php echo base_url("cashier");?>" class="brand-link">
      <img src="<?php echo site_url("assets/images/easy.png");?>" alt="Cashier-Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">EasyGas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="<?php echo site_url("assets/images/easy.png");?>" class="img-fluid" alt="Responsive image">
        </div>
        <div class="info">
          <a href="<?php echo base_url("cashier");?>" class="d-block"><?php echo ucfirst($this->session->userdata('name')) ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                        <a href="<?php echo base_url("cashier");?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard v1</p>
                        </a>
                </li>
                <li class="nav-item">
                        <a href="<?php echo base_url("cashier/client");?>" class="nav-link ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Client List</p>
                        </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>
                      Mailbox
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url("cashier/message/inbox");?>" class="nav-link">
                        <!-- <i class="far fa-circle nav-icon"></i> -->
                        <p>Inbox</p>
                        <span class="badge badge-info right">2</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/mailbox/compose.html" class="nav-link">
                        <!-- <i class="far fa-circle nav-icon"></i> -->
                        <p>Compose</p>
                      </a>
                    </li>
                  </ul>
                </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>