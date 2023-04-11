                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#gejalaModal"><i class="fas fa-plus"></i> Tambah Gejala</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <?= $this->session->flashdata('message');?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Gejala</th>
                                            <th>Nama Gejala</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Penyakit</th>
                                            <th>Nama Penyakit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                            <?php $i = 1;?> 
                                            <?php foreach($gejala as $g):?>
                                        <tr>
                                            <td><?= $i;?></td>
                                            <td><?= $g['id_gejala'];?></td>
                                            <td><?= $g['nama_gejala'];?></td>
                                            <td>
                                                <button   button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editGejalaModal<?php echo $g['id_gejala'];?>" >
                                                <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="<?= base_url('data/hapusgejala/')?><?= $g['id_gejala']?>" class="btn btn-sm btn-danger">
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

<!-- Modal Tambah Gejala -->
<div class="modal fade" id="gejalaModal" tabindex="-1" aria-labelledby="gejalaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="gejalaModalLabel">Tambah Gejala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="<?=base_url('data/gejala/');?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="id_gejala" name="id_gejala" placeholder="Kode Gejala">
                        <?= form_error('id_gejala', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" placeholder="Nama Gejala">
                        <?= form_error('nama_gejala', '<small class="text-danger pl-3">', '</small>'); ?>
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
    foreach($gejala as $g): $no++;?>
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel">Yakin ingin hapus gejala ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?=base_url('data/hapusgejala/');?>" method="POST">
                    <div class="modal-body">
                        Klik tombol "hapus" dibawah jika anda ingin hapus gejala.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="<?= base_url('data/hapusgejala/');?><?= $g['id_gejala']?>">Hapus</a>
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
    foreach($gejala as $g): $no++;?>
    <div class="modal fade" id="editGejalaModal<?php echo $g['id_gejala'];?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="newMenuModalLabel">Edit Gejala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?=base_url('data/editgejala/');?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_gejala" name="id_gejala" value="<?= $g['id_gejala']?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" value="<?= $g['nama_gejala']?>">
                        </div>
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
