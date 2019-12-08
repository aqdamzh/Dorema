    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo base_url() ?>dosen/dashboard" class="brand-link">
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
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Pendaftar</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dosen/detail/<?php echo $pendaftar->id_project ?>">Kembali</a></li>
                <li class="breadcrumb-item active">Detail pendaftar</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-4">
                <div class="card card-warning card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid" src="<?php echo base_url().'assets/adminLTE/dist/img/'.$pendaftar->photo ?>" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center"><?php echo $pendaftar->name ?></h3>

                    <p class="text-muted text-center"><?php echo $pendaftar->study_program ?></p>

                    <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Project Terdaftar</b> <a class="float-right"><?php echo $terdaftar->jumlah ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Project Dijalankan</b> <a class="float-right"><?php echo $dijalankan->jumlah ?></a>
                    </li>
                    </ul>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
            <!-- About Me Box -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-address-book mr-1"></i> Contact</strong>

                        <p class="text-muted"><?php echo $pendaftar->phone_number ?></p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted"><?php echo $pendaftar->address ?></p>

                        <hr>

                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <p class="text-muted">
                        <?php echo $pendaftar->study_program ?><br><?php echo $pendaftar->educational_program ?>
                        </p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                        <p class="text-muted">
                        <?php echo $pendaftar->skill ?>
                        </p>

                        <hr>

                        <strong><i class="fas fa-smile-beam mr-1"></i> Interest</strong>

                        <p class="text-muted"><?php echo $pendaftar->interest ?></p>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
 
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>