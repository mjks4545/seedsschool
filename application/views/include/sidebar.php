  <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <?php $session = $this->session->userdata('session_data');
            $id= $session['id']; $role = $session['role'];

                                ?> 
            <?php if($role=='admin'){?> 
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <?php }?>
          <!-- sidebar menu: : style can be found in sidebar.less -->
         
          <ul class="sidebar-menu">
           <?php if($role=='admin'){?> 
            <li class="header">SEEDS SCHOOL OF EXCELLENCE</li>

            <li>
              <a href="<?= site_url()?>admin">
            <i class="fa fa-tachometer"></i>   <span>Dashboard</span> 
              </a>
            </li>

            <li>
              <a href="">
                  <i class="fa fa-user"></i> <span>Expanses</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?=  site_url()?>expenses/addexpenses"><i class="fa fa-circle-o"></i> Add Expenses</a></li>
                <li><a href="<?= site_url()?>expenses/index"><i class="fa fa-circle-o"></i> View Expenses</a></li>
                <!-- <li><a href="<?=  site_url()?>expensecontroller/view_expenses"><i class="fa fa-circle-o"></i> View Expenses</a></li> -->
              </ul>
            </li>

			<li>
                <a href="">
                  <i class="fa fa-table"></i> <span>Classes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?=  site_url()?>classcontroller/add_class"><i class="fa fa-circle-o"></i> Add class</a></li>
                <li><a href="<?= site_url()?>classcontroller/view_class"><i class="fa fa-circle-o"></i> View Expenses</a></li>
              </ul>
            </li>

            <li>
              <a href="<?= site_url()?>teacher/index">
                <i class="fa fa-user"></i> <span>Teacher</span>
              </a>
            </li>
            <li>
              <a href="<?= site_url()?>academic/index">
                <i class="fa fa-university"></i> <span>Academic Section</span>
              </a>
            </li>

             <li>
                <a href="<?= site_url()?>otherstaff/index">
                <i class="fa fa-user"></i> <span>Other Staff</span>
              </a>
            </li>

             <li>
                <a href="<?= site_url()?>reports/index">
                <i class="fa fa-newspaper-o"></i> <span>Reports</span>
              </a>
            </li>

           <!--   <li>
                <a href="<?= site_url()?>attendancecontroller/find_teacher">
                <i class="fa fa-user"></i> <span>Attendance</span>
              </a>
            </li> -->

            <li>
              <a href="<?= site_url()?>admin/admin_setting">
                <i class="fa fa-cog"></i> <span>Setting</span> 
              </a> 
            </li>

            <li>
              <a href="<?php echo base_url();?>search">
                <i class="fa fa-search"></i> <span>Searches</span> 
              </a> 
            </li> 
          <?php } elseif($role=="teacher") {?>

            <li>
              <a href="<?php echo base_url();?>teacher/index">
                <i class="fa fa-user"></i> <span>Teacher</span> 
              </a> 
            </li> 
         <?php }elseif($role=="receptionist"){?>
            <li>
              <a href="<?php echo base_url();?>reception/index">
                <i class="fa fa-user"></i> <span>Receptionist</span> 
              </a> 
            </li>
            <?php }elseif($role=="gatekeeper"){?>
            <li>
              <a href="<?php echo base_url();?>gatekeeper/index">
                <i class="fa fa-user"></i> <span>Gatekeeper</span> 
              </a> 
            </li>
            <?php }?>
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>
