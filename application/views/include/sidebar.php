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
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Visitors</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?= site_url()?>visitorcontroller/add_visitor"><i class="fa fa-circle-o"></i> Add Visitor</a></li>
                <li><a href="<?= site_url()?>/visitorcontroller/view_visitor"><i class="fa fa-circle-o"></i> View Visitors</a></li>
              </ul>
            </li>
          
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
