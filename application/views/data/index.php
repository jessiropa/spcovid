                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambahStatusModal"><i class="fas fa-plus"></i> Tambah Status</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?= $this->session->flashdata('message');?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Status</th>
                                            <th>Nama Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Status</th>
                                            <th>Nama Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                            <?php $i = 1;?>
                                            <?php foreach($status as $s):?>
                                        <tr>
                                            <td><?= $i;?></td>
                                            <td><?= $s['id_status'];?></td>
                                            <td><?= $s['nama_status'];?></td>
                                            <td>
                                                <button   button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editPenyakitModal<?php echo $s['id_status'];?>" >
                                                <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="<?= base_url('data/hapusstatus/')?><?= $s['id_status']?>" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++;?>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
    
    <!-- Modal Tambah Penyakit -->
    <div class="modal fade" id="tambahStatusModal" tabindex="-1" aria-labelledby="tambahStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="tambahStatusModalLabel">Tambah Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?=base_url('data');?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_status" name="id_status" placeholder="Kode Status">
                            <?= form_error('id_status', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_status" name="nama_status" placeholder="Nama Status">
                            <?= form_error('nama_status', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah -->

<!-- Modal Hapus Gejala -->
<?php  $no = 0;
    foreach($status as $s): $no++;?>
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel">Yakin ingin hapus status ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?=base_url('data/hapusstatus/');?>" method="POST">
                    <div class="modal-body">
                        Klik tombol "hapus" dibawah jika anda ingin hapus status.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="<?= base_url('data/hapusstatus/');?><?= $s['id_status']?>">Hapus</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Hapus -->
    

<!-- Modal Edit Penyakit -->
<!-- melakukan perulangan data  -->
<?php  $no = 0;
    foreach($status as $s): $no++;?>
    <div class="modal fade" id="editPenyakitModal<?php echo $s['id_status'];?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="newMenuModalLabel">Edit Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?=base_url('data/editstatus/');?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_status" name="id_status" value="<?= $s['id_status']?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_status" name="nama_status" value="<?= $s['nama_status']?>">
                        </div>
                        <!-- <div class="form-group">
                            <input type="text" class="form-control" id="solusi" name="solusi" value="<?= $s['solusi']?>">
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Edit -->