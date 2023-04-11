        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

            <div class="row">
                <div class="col-lg-8">
                    <?= $this->session->flashdata('message');?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                <div class="card shadow mb-4">
                        <!-- CARD UNTUK JUDUL TABEL -->
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Profil</h6> -->
                        </div>
                        <!-- CARD UNTUK CONTENT -->
                        <div class="card-body">

                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                    <img src="<?= base_url('assets/admin/img/profile/'). $user['image'];?>" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                    <div class="card-body"> 
                                        <h5 class="card-title"><?= $user['nama'];?></h5>
                                        <p class="card-text"><?= $user['email'];?></p>
                                        <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created']);?></small></p>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
 