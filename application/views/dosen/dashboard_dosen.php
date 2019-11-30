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
          <li class="nav-item">
            <a href="<?php echo base_url() ?>dosen/dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url() ?>dosen/add" class="nav-link">
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
  <div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Project Saya
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dosen</a></li>
              <li class="breadcrumb-item active">Project Saya</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <?php foreach ($project as $pjt) : ?>
            <div class="card card-primary card-outline">
              <div class="card-header">
                <div class="row">
                <div class="col-md-8">
                  <h3 class="card-title">
                    <i class="fas fa-tasks"></i>
                    <strong><?php echo $pjt->nama_project ?></strong>
                  </h3>
                </div>
                <div class="col-md-2 ml-auto row">
                  <div class="col-md-4">
                  <?php echo anchor('dosen/detail/'.$pjt->project_id,'<button class="btn btn-success">
                  <i class="fas fa-search-plus"></i></button>') ?>
                  </div>
                  <div class="col-md-4">
                  <?php echo anchor('dosen/edit/'.$pjt->project_id,'<button class="btn btn-primary">
                  <i class="fas fa-edit"></i></button>') ?>
                  </div>
                  <div class="col-md-4" onclick="javascript: return confirm('Anda yakin hapus?')">
                  <?php echo anchor('dosen/delete/'.$pjt->project_id,
                  '<button class="btn btn-danger"><i class="fas fa-trash"></i></button>') ?>
                  </div>
                </div>
                </div>
              </div>
              <div class="card-body">
              <div class="row">
                <div class="col-md-7">
                  <h6><strong>Deskripsi:</strong></h6>
                  <p><?php echo $pjt->deskripsi ?></p>
                  <h6><strong>Prasyarat:</strong></h6>
                  <p><?php echo $pjt->prasyarat ?></p>
                  <h6><strong>Batas Pendaftaran:</strong> <?php echo $pjt->batas_pendaftaran ?></h6>
                  <h6><strong>Kuota:</strong> <?php echo $pjt->kuota ?></h6>
                </div>
              </div>
              </div>
              <!-- /.card -->
            </div>
          <?php endforeach; ?>
          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>