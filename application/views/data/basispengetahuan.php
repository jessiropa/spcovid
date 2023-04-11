                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#basisModal"><i class="fas fa-plus"></i> Tambah Basis Pengetahuan</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <?= $this->session->flashdata('message');?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Aturan</th>
                                            <th>Status</th>
                                            <th>Gejala</th>
                                            <th>Nilai CF</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Aturan</th>
                                            <th>Penyakit</th>
                                            <th>Gejala</th>
                                            <th>Nilai CF</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                            <?php $i = 1;?>
                                            <?php foreach($basis_pengetahuan as $bp):?>
                                        <tr>
                                            <td><?= $i;?></td>
                                            <td><?= $bp['id_basis'];?></td>
                                            <td><?= $bp['nama_status'];?></td>
                                            <td><?= $bp['nama_gejala'];?></td>
                                            <td><?= $bp['nilai_cf'];?></td>
                                            <td>
                                                <button   button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editBasisModal<?php echo $bp['id_basis'];?>" >
                                                <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="<?= base_url('data/hapusbasis/')?><?= $bp['id_basis']?>" class="btn btn-sm btn-danger">
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

<!-- Modal Tambah Basis Pengetahuan-->
<div class="modal fade" id="basisModal" tabindex="-1" aria-labelledby="basisModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="basisModalLabel">Tambah Basis Pengetahuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?=base_url('data/basispengetahuan');?>" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="aturan" name="aturan" placeholder="Kode Aturan">
                </div>
                <div class="form-group">
                    <select name="id_status" id="id_status" class="form-control">
                        <option value="">Pilih Status</option>
                            <?php foreach ($status as $s): ?>
                                <option value="<?= $s['id_status']; ?>"> <?= $s['nama_status'];?></option>
                            <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="id_gejala" id="id_gejala" class="form-control">
                        <option value="">Pilih Gejala</option>
                            <?php foreach ($gejala as $g): ?>
                                <option value="<?= $g['id_gejala']; ?>"> <?= $g['nama_gejala'];?></option>
                            <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nilaicf" name="nilaicf" placeholder="Nilai CF">
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
<!-- Akhir modal tambah Basis Pengetahuan -->


<!-- Modal Hapus Basis Pengetahuan -->
<?php  $no = 0;
    foreach($basis_pengetahuan as $bp): $no++;?>
    <div class="modal fade" id="hapusModal<?php echo $bp['id_basis'];?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel">Yakin ingin hapus gejala ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?=base_url('data/hapusbasis/');?>" method="POST">
                    <div class="modal-body">
                        Klik tombol "hapus" dibawah jika anda ingin hapus gejala.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="<?= base_url('data/hapusbasis/');?><?= $bp['id_basis']?>">Hapus</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Hapus Basis Pengetahuan-->


<!-- Modal Edit Basis Pengetahuan -->
<!-- melakukan perulangan data  -->
<?php  $no = 0;
    foreach($basis_pengetahuan as $bp): $no++;?>
    <div class="modal fade" id="editBasisModal<?php echo $bp['id_basis'];?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="newMenuModalLabel">Edit Basis Pengetahuan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?=base_url('data/editbasis/');?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- <input type="hidden" name="id" value="<?= $p['id']?>"> -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="aturan" name="aturan" value="<?= $bp['id_basis']?>" readonly>
                        </div>
                        <div class="form-group">
                            <select name="id_status" id="id_status" class="form-control">
                                    <?php foreach ($status as $s): ?>
                                        <?php if($s['id_status'] == $bp['id_status']):?>
                                            <option value="<?= $s['id_status']; ?>" selected> <?= $s['nama_status'];?></option>
                                        <?php else : ?>
                                            <option value="<?= $s['id_status']; ?>"> <?= $s['nama_status'];?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="id_gejala" id="id_gejala" class="form-control">
                                    <?php foreach ($gejala as $g): ?>
                                        <?php if($g['id_gejala'] == $bp['id_gejala']):?>
                                            <option value="<?= $g['id_gejala']; ?>" selected> <?= $g['nama_gejala'];?></option>
                                        <?php else : ?>
                                            <option value="<?= $g['id_gejala']; ?>"> <?= $g['nama_gejala'];?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nilaicf" name="nilaicf" value="<?= $bp['nilai_cf']?>">
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