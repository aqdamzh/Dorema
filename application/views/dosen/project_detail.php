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

<div class="content-wrapper" style="min-height: 2206.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $detail->nama_project ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects Detail</h3>

          <div class="card-tools">
                <a href="<?php echo base_url() ?>dosen/dashboard" class="btn btn-sm btn-info">Kembali ke Dashboard</a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"> Deskripsi</h3>
              <p class="text-muted"><?php echo $detail->deskripsi ?></p>
              
              

              <h5 class="mt-5 text-muted">Prasyarat</h5>
              <ul class="list-unstyled">
              <?php echo $detail->prasyarat ?>
              </ul>
            </div>
              <div class="row">
                
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Batas Pendaftaran</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $detail->batas_pendaftaran ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Kuota</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $detail->kuota ?> <span>
                    </span></span></div>
                  </div>
                </div>


              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Pendaftar</h4>
                    <?php foreach ($pendaftar as $pdr) : ?>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo base_url() ?>assets/adminLTE/dist/img/<?php echo $pdr->photo ?>" alt="user image">
                        <span class="username">
                          <a href="<?php echo base_url() ?>dosen/detail_pendaftar/<?php echo $pdr->register_id ?>"><?php echo $pdr->name ?></a>
                        </span>
                      </div>
                      <!-- /.user-block -->
                      <h6><strong>Curriculum vitae:</strong></h6>
                      <?php echo anchor('dosen/download_cv/'.$pdr->cv,'<button class="btn btn-link btn-sm">
                            <i class="fas fa-file-download mr-1"></i>Download</button>') ?>
                      <h6><strong>Jurusan:</strong></h6>
                      <p><?php echo $pdr->study_program ?></p>
                      <h6><strong>Skill:</strong></h6>
                      <p><?php echo $pdr->skill ?></p>

                      <p class="mt-4">
                            <?php if($pdr->status_pendaftar=="Diterima"){ ?>
                                <button class="btn btn-info">
                                <i class="fas fa-check-double"></i> Telah Diterima</button>
                            <?php }else{
                            echo anchor('dosen/terima/'.$pdr->register_id,'<button class="btn btn-success">
                            <i class="fas fa-check-square"></i> Terima</button>'); }?>
                      </p>
                    </div>
                    <?php endforeach; ?>
                </div>
              </div>
            </div>
            

          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>