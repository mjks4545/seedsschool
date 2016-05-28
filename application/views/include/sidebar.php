  <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
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
                <li class="active"><a href="<?= site_url()?>directorcontroller/director_index"><i class="fa fa-circle-o"></i> Director</a></li>
                <li><a href="<?= site_url()?>/receptionistcontroller/reception_index"><i class="fa fa-circle-o"></i> Receptionist</a></li>
                <li><a href="<?= site_url()?>/gatekeepercontroller/gatekeeper_index"><i class="fa  fa-male"></i> Gate Keeper</a></li>
              </ul>
            </li>
            <li>
                <a href="">
                  <i class="fa fa-user"></i> <span>Expanses</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?=  site_url()?>expensecontroller/add_expenses"><i class="fa fa-circle-o"></i> Add Expenses</a></li>
                <li><a href="<?=  site_url()?>expensecontroller/view_expenses"><i class="fa fa-circle-o"></i> View Expenses</a></li>
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-user"></i> <span>Attendance</span>
              </a>
              
            </li>
            <li>
              <a href="#">
                <i class="fa fa-user"></i> <span>Payments</span> 
              </a>
              
            </li>
          
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
