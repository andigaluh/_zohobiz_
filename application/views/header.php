<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse "> 
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="navbar-inner">
    <div class="header-seperation"> 
        <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">    
          <li class="dropdown"> 
          <a id="main-menu-toggle" href="#main-menu"  class="" > <div class="iconset top-menu-toggle-white"></div> </a> 
        </li>        
        </ul>
      <!-- BEGIN LOGO -->   
      <a href="index.html">
        <img src="<?php echo assets_url('img/logo.png'); ?>" class="logo"  data-src="<?php echo assets_url('img/logo.png'); ?>" data-src-retina="<?php echo assets_url('img/logo2x.png'); ?>" width="106" height="21"/>
      </a>
      <!-- END LOGO --> 
      <ul class="nav pull-right notifcation-center">    
        <li class="dropdown" id="header_task_bar"> 
          <a href="index.html" class="dropdown-toggle active" data-toggle=""> <div class="iconset top-home"></div> </a> 
        </li>              
      </ul>
    </div>
    <!-- END RESPONSIVE MENU TOGGLER --> 
    <div class="header-quick-nav" > 
      <!-- BEGIN TOP NAVIGATION MENU -->
      <div class="pull-left"> 
          <ul class="nav quick-section">
            <li class="quicklinks"> 
              <a href="#" class="" id="layout-condensed-toggle" ><div class="iconset top-menu-toggle-dark"></div> </a> 
            </li>        
          </ul>
      </div>
      <!-- END TOP NAVIGATION MENU -->
      <!-- BEGIN CHAT TOGGLER -->
      <div class="pull-right">
        <div class="chat-toggler">
          <a data-toggle="dropdown" class="dropdown-toggle  pull-right" href="#">           
            <div class="user-details"> 
              <div class="username">
      
                <span class="bold"><?php echo $this->session->userdata('username')?></span>
              </div>            
            </div> 
            <div class="iconset top-down-arrow"></div> 
          </a>
          <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="dropdownMenu">
            <li class="divider"></li>                
            <li><?php echo anchor(site_url('auth/logout'), '<i class="icon-off"></i>&nbsp;&nbsp;'.lang('logout_link_label'), array('title' => lang('logout_link_label')));?></li>
          </ul>      
        </div>
      </div>
    <!-- END CHAT TOGGLER -->
    </div> 
    <!-- END TOP NAVIGATION MENU --> 
  </div>
  <!-- END TOP NAVIGATION BAR --> 
</div>
<!-- END HEADER -->