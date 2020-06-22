<?php    
	$curr_url = $this->uri->segment(2);
	$active="active";
  $role_id = $this->session->userdata('user_data')['role_id'];
  $outlet_id = DEFAULT_OUTLET;
?>
<!-- sidebar-->
<aside class="aside" >
 <!-- START Sidebar (left)-->
 <div class="aside-inner" >
    <nav data-sidebar-anyclick-close="" class="sidebar">
       <!-- START sidebar nav-->
       <ul class="nav page-sidebar-menu">
          <!-- Iterates over all sidebar items-->
            <?php $permission = false;
              if ($user_data['role'] != 'portal admin')
                  $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'dashboard');
              else  
                  $permission = true; 
              if ($permission){?>
               <li class="<?php if($curr_url == 'dashboard'){echo 'active';}    ?>">
                  <a href="<?php $controller='dashboard'; 
                     echo ADMIN_BASE_URL . $controller ?>">
                     <em class="fa fa-home"></em>
                     <span>Dashboard</span>
                  </a>
                </li>
              <?php
            }?>
            <?php $permission = false;
              if ($user_data['role'] != 'portal admin')
                  $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'customer');
              else
                  $permission = true; 
              if ($permission){?>
                <li class="<?php if($curr_url == 'customer'){echo 'active';}    ?>">
                  <a href="<?php $controller='customer'; 
                     echo ADMIN_BASE_URL . $controller ?>">
                     <em class="fa fa-gamepad"></em>
                     <span>Customer</span>
                  </a>
                </li>
              <?php } ?>

              <?php $permission = false;
              if ($user_data['role'] != 'portal admin')
                  $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'forget_pass');
              else
                  $permission = true; 
              if ($permission){?>
                <li class="<?php if($curr_url == 'forget_pass'){echo 'active';}    ?>">
                  <a href="<?php $controller='forget_pass'; 
                     echo ADMIN_BASE_URL . $controller ?>">
                     <em class="fa fa-lock"></em>
                     <span>Forget Pass</span>
                  </a>
                </li>
            <?php } ?>
       </ul>
       <!-- END sidebar nav-->
    </nav>
 </div>
 <!-- END Sidebar (left)-->
</aside>




