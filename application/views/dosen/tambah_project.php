  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>" class="brand-link border-warning">
      <img src="<?php echo base_url() ?>assets/adminLTE/dist/img/DoremaLogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dorema</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-gradient-dark">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url() ?>dosen/dashboard" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url() ?>dosen/add" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tambah Project
              </p>
            </a>
          </li>
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
            <h1>Buat Project</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dosen</a></li>
              <li class="breadcrumb-item active">Buat Project</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-dark">
            <div class="card-header">

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="post" action="<?php echo base_url().'dosen/tambah_project'; ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nama Project</label>
                <input type="text" name="namaProject" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Deskripsi Project</label>
                <textarea name="deskripsi" class="form-control" rows="4"></textarea> 
              </div>
              <div class="form-group">
                <label for="inputDescription">Prasyarat</label>
                <textarea class="textarea form-control" name="prasyarat" placeholder="Place some text here" 
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; 
                border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"></textarea>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Batas Pendaftaran</label>
                <input type="date" name="batasPendaftaran" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Kuota</label>
                <input type="number" name="kuota" class="form-control">
              </div>
              <button type="reset" class="btn btn-danger"
                data-dismiss="modal">Reset</button>
              <button type="submit", class="btn btn-primary">Simpan
              </button>
            </div>
            </form>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->