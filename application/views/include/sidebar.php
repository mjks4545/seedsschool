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
          <!-- sidebar menu: : style can be found in sidebar.less -->
         
          <ul class="sidebar-menu">
            <li class="header">SEEDS SCHOOL OF EXCELLENCE</li>
            <li>
              <a href="#">
                <i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?= site_url()?>admin/"><i class="fa fa-circle-o"></i> Director</a></li>
                <li><a href="<?= site_url()?>/reception/index"><i class="fa fa-circle-o"></i> Receptionist</a></li>
                <li><a href="<?= site_url()?>/gatekeeper/index"><i class="fa  fa-male"></i> Gate Keeper</a></li>
              </ul>
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
                  <i class="fa fa-user"></i> <span>Classes</span> <i class="fa fa-angle-left pull-right"></i>
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
                <i class="fa fa-user"></i> <span>Academic Section</span>
              </a>
            </li>

             <li>
                <a href="<?= site_url()?>otherstaff/index">
                <i class="fa fa-user"></i> <span>Other Staff</span>
              </a>
            </li>

             <li>
                <a href="<?= site_url()?>reports/index">
                <i class="fa fa-user"></i> <span>Reports</span>
              </a>
            </li>

             <li>
                <a href="<?= site_url()?>attendancecontroller/find_teacher">
                <i class="fa fa-user"></i> <span>Attendance</span>
              </a>
            </li>

<!--             <li>
              <a href="#">
                <i class="fa fa-user"></i> <span>Payments</span> 
              </a> 
            </li> -->

            <li>
              <a href="<?php echo base_url();?>search">
                <i class="fa fa-user"></i> <span>Searches</span> 
              </a> 
            </li> 

          </ul>
          <?php }?>
        </section>
        <!-- /.sidebar -->
      </aside>
