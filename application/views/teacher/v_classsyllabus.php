 

 <style>
    td, th {
        text-align: center;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard
            <small><a href="<?= site_url()?>teacher/get_all_classes/">Subject Syllabus</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View Class
            </small>
        </h1>
    </section>
    <!-- Main content -->
 <section class="content">
 <div class="row">
 <div class="box-body">
    <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                <tr>
                                     
                                    <th>Title</th>
                                    <th>Description</th>
                                     
                                </tr>
                                </thead>
                                <?php foreach($syllabus as $syllabus): ?>
                                <tbody>
                                <tr>
                                <th><?php echo $syllabus->syllabus_title ?></th>
                                <th><?php echo $syllabus->syllabus_description; ?> </th>
                                </tr>
                                </tbody>
                            <?php endforeach; ?>
                            </table>
                         
            </div><!-- /.md 12 -->
          </div>  <!-- /.box -->
          </div><!-- row-->
    </section>
</div>