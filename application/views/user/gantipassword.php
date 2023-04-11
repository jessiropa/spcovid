        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow mb-4">
                            <!-- CARD UNTUK JUDUL TABEL -->
                            <div class="card-header py-3">
                            <?= $title;?>
                                <!-- <h6 class="m-0 font-weight-bold text-primary">Profil</h6> -->
                            </div>
                            <!-- CARD UNTUK CONTENT -->
                            <div class="card-body">
                                <?= $this->session->flashdata('message');?>
                                <form action="<?= base_url('user/gantipassword');?>" method="post">
                                <div class="form-group">
                                    <label for="passwordlama">Kata Sandi Sebelumnya</label>
                                    <input type="password" class="form-control" id="passwordlama" name="passwordlama" placeholder="Kata sandi sebelumnya...">
                                    <?= form_error('passwordlama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="passwordbaru1">Kata Sandi Baru</label>
                                    <input type="password" class="form-control" id="passwordbaru1" name="passwordbaru1" placeholder="Kata sandi baru...">
                                    <?= form_error('passwordbaru1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="passwordbaru2">Password Baru</label>
                                    <input type="password" class="form-control" id="passwordbaru2" name="passwordbaru2" placeholder="Ulangi kata sandi...">
                                    <?= form_error('passwordbaru2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"> Ganti Kata sandi </button>
                                </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
