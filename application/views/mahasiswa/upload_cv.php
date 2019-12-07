    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo base_url() ?>mahasiswa/list" class="brand-link">
        <img src="<?php echo base_url() ?>assets/adminLTE/dist/img/DoremaLogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Dorema</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <div class="content-wrapper" style="min-height: 1419.6px;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
                <div class="card">
                <div class="card-header p-2">
                </div><!-- /.card-header -->
                <div class="card-body">
                        <?php echo form_open_multipart('mahasiswa/daftar'); ?>
                        <div class="form-group row">
                            <label for="cv" class="col-sm-2 col-form-label">Silahkan upload CV</label>
                            <div class="col-sm-10">
                            <input type="hidden" name="project_id" class="form-control" value="<?php echo $project ?>">
                            <input type="file" name="cv" id="cv" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </div>

                        <?php echo form_close(); ?>
                </div><!-- /.card-body -->
                </div>
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>