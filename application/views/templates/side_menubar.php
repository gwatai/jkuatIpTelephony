  <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">     
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <div class="user">
            <div class="avatar-sm float-left mr-2">
              <img src="<?php echo base_url()?>assets/img/logo.jpeg" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
              <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                <span>
                Admin
                  <span class="user-level">Administrator</span>
                  <span class="caret"></span>
                </span>
              </a>
              <div class="clearfix"></div>

              <div class="collapse in" id="collapseExample">
                <ul class="nav">
                  <li>
                    <a href="#profile">
                      <span class="link-collapse">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a href="#edit">
                      <span class="link-collapse">Edit Profile</span>
                    </a>
                  </li>
                  <li>
                    <a href="#settings">
                      <span class="link-collapse">Settings</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <ul class="nav nav-primary">
            <li class="nav-item active">
              <a  href="<?php echo base_url()?>dashboard/dash" class="collapsed" aria-expanded="false">
                <i class="fas fa-home"></i>
                <p>Dashboard</p>
                <!-- <i class="caret"></i> -->
              </a>
              <div class="collapse" id="dashboard">
                
              </div>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Components</h4>
            </li>
            <li class="nav-item">
              <a data-toggle="collapse" href="#base">
                <!-- <i class="fa fa-user"></i> -->
                <i class="fa-solid fa-list-check"></i>
                <p>Manage Extensions </p>
                <i class="caret"></i>
              </a>
              <div class="collapse" id="base">
                <ul class="nav nav-collapse">
                <li>
                    <a href="<?php echo base_url()?>dashboard/manage_admins">
                      <span class="sub-item">Manage Admins</span>
                    </a>
                  </li>
                
                  <li>
                </ul>
              </div>
            </li> 
           
              
            <li class="mx-4 mt-2">
              <a href="<?php echo base_url()?>auth/logout" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fa-solid fa-power-off"></i></span>Log out</a> 
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->
    <div class="main-panel">
      <div class="content">
        <div class="page-inner">

          <div class="page-header">
            <h4 class="page-title"><?php echo $title ? $title : '';?></h4>
            <ul class="breadcrumbs">
              <li class="nav-home">
                <a href="<?php echo base_url()?>">
                  <i class="flaticon-home"></i>
                </a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#"><?php echo ucfirst($this->uri->segment(1))?></a>
              </li>
              <?php if($this->uri->segment('2')){?>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#"><?php echo ucfirst($this->uri->segment(2)) ?></a>
              </li>
            <?php }?>
            </ul>
          </div>
    
