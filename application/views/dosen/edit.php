  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>" class="brand-link">
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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Project</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dosen</a></li>
              <li class="breadcrumb-item active">Edit Project</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <?php foreach($project as $pjt) { ?>
        <div class="col-md-6">
          <div class="card card-dark">
            <div class="card-header">

              <div class="card-tools">
              <?php echo anchor('dosen/dashboard/', '<button class="btn btn-info">Batal</button>') ?>
              </div>
            </div>
            <form method="post" action="<?php echo base_url().'dosen/update'; ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nama Project</label>
                <input type="hidden" name="project_id" class="form-control"
                value="<?php echo $pjt->project_id ?>">
                <input type="text" name="nama_project" class="form-control" 
                value="<?php echo $pjt->nama_project ?>" disabled>
              </div>
              <div class="form-group">
                <label for="inputDescription">Deskripsi Project</label>
                <textarea name="deskripsi" class="form-control" rows="4" 
                disabled><?php echo $pjt->deskripsi ?></textarea> 
              </div>
              <div class="form-group">
                <label for="inputDescription">Prasyarat</label>
                <textarea class="textarea form-control" name="prasyarat" placeholder="Place some text here" 
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; 
                border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;" 
                ><?php echo $pjt->prasyarat ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Batas Pendaftaran</label>
                <input type="date" name="batas_pendaftaran" class="form-control" 
                value="<?php echo $pjt->batas_pendaftaran ?>">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Kuota</label>
                <input type="number" name="kuota" class="form-control" 
                value="<?php echo $pjt->kuota ?>">
              </div>
              <button type="reset" class="btn btn-secondary"
                data-dismiss="modal">Reset</button>
              <button type="submit", class="btn btn-primary">Simpan
              </button>
            </div>
            </form>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php } ?>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->