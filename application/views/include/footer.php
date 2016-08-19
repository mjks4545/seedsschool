<footer class="main-footer no-print">
    <strong>Copyright &copy; 2015-<?php echo date("Y"); ?> <a href="">SS Technologies</a>.</strong> All rights reserved.
</footer>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url();?>public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script src="<?=base_url();?>public/custom/home/template.js"></script>
    <script src="<?=base_url();?>public/custom/home/events.js"></script>
    <script src="<?=base_url();?>public/custom/home.js"></script>
    <script>
    
        $(function (){
            //Init home application
            var home = new Home();
        });

    </script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url();?>public/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?=base_url();?>public/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?=base_url();?>public/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?=base_url();?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=base_url();?>public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?=base_url();?>public/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?=base_url();?>public/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?=base_url();?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?=base_url();?>public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?=base_url();?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?=base_url();?>public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <!-- AdminLTE App -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?=base_url();?>public/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->

<script src="<?php echo site_url() ?>public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo site_url() ?>public/bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo site_url() ?>public/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="<?php echo site_url() ?>public/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url() ?>public/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url() ?>public/dist/js/demo.js"></script>
<script src="<?php echo site_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo site_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url();?>public/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?=base_url();?>public/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script>
        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
    </script>
<script src="<?=base_url();?>public/js/validator.js"></script>
<!-- for charts-->

<?php $this->load->view('include/partial_events'); ?>
<!-- end of charts-->
<?php $this->load->view("include/graph"); ?>
<script type="text/javascript">
    $(".alert").fadeOut(5000);
    $(".alert").fadeIn(5000);
    $(".alert").fadeOut(5000);
</script>
  </body>
</html>