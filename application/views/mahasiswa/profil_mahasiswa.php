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


    <div class="content-wrapper" style="min-height: 1419.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <?php foreach($mahasiswa as $mhs) { ?>
            <div class="col-md-4">
                <div class="card card-warning card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid" src="<?php echo base_url().'assets/adminLTE/dist/img/'.$mhs->photo ?>" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center"><?php echo $mhs->name ?></h3>

                    <p class="text-muted text-center"><?php echo $mhs->study_program ?></p>

                    <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Project Terdaftar</b> <a class="float-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Project Dijalankan</b> <a class="float-right">543</a>
                    </li>
                    </ul>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                    <p class="text-muted">
                    <?php echo $mhs->study_program ?><br><?php echo $mhs->educational_program ?>
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted"><?php echo $mhs->address ?></p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                    <p class="text-muted">
                    <?php echo $mhs->skill ?>
                    </p>

                    <hr>

                    <strong><i class="fas fa-smile-beam mr-1"></i> Interest</strong>

                    <p class="text-muted"><?php echo $mhs->interest ?></p>
                    
                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                    <p class="text-muted"><?php echo $mhs->profile_description ?></p>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <div class="card">
                <div class="card-header p-2">
                </div><!-- /.card-header -->
                <div class="card-body">
                        <?php echo form_open_multipart('mahasiswa/update_profile'); ?>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                            <input type="hidden" name="npm" class="form-control"
                             value="<?php echo $mhs->npm ?>">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                            value="<?php echo $mhs->name ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number"
                            value="<?php echo $mhs->phone_number ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address"
                            value="<?php echo $mhs->address ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="skill" class="col-sm-2 col-form-label">Kemampuan</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" name="skill" id="skill" placeholder="Skills"
                            ><?php echo $mhs->skill ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="interest" class="col-sm-2 col-form-label">Ketertarikan</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" name="interest" id="interest" placeholder="Interest"
                            ><?php echo $mhs->interest ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile_description" class="col-sm-2 col-form-label">Deskripsi Profile</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" name="profile_description" id="profile_description" placeholder="Profile Description"
                            ><?php echo $mhs->profile_description ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="col-sm-2 col-form-label">Profile Picture</label>
                            <div class="col-sm-10">
                            <input type="file" name="photo" id="photo" class="form-control">
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
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
            </div>
            <?php } ?>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>