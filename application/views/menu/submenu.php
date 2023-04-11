        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

                <div class="card shadow mb-4">
                        <!-- CARD UNTUK JUDUL TABEL -->
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Tabel Submenu</h6> -->
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newSubMenuModal"><i class="fas fa-plus"></i> Tambah Submenu</a>
                        </div>

                        <!-- CARD UNTUK CONTENT -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>');?>
                                <?= $this->session->flashdata('message');?>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Judul Submenu</th>
                                            <th scope="col">Menu</th>
                                            <th scope="col">Url</th>
                                            <th scope="col">Icon</th>
                                            <th scope="col">Aktif</th>
                                            <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;?>
                                            <?php foreach($subMenu as $sm):?>
                                            <tr>
                                                <th scope="row"><?= $i;?></th>
                                                <td><?= $sm['judul'];?></td>
                                                <td><?= $sm['menu'];?></td>
                                                <td><?= $sm['url'];?></td>
                                                <td><?= $sm['icon'];?></td>
                                                <td><?= $sm['is_active'];?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editSubmenuModal<?php echo $sm['id'];?>" ><i class="fas fa-edit"></i></button>
                                                    <a href="<?= base_url('menu/hapussubmenu/')?><?= $sm['id']?>" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapussubmenuModal"><i class="fas fa-trash-alt"></i></a>
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

<!-- Modal Tambah Submenu-->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?=base_url('menu/submenu');?>" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Submenu title">
                </div>
                <div class="form-group">
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="">Pilih Menu</option>
                            <?php foreach ($menu as $m): ?>
                                <option value="<?= $m['id']; ?>"> <?= $m['menu'];?></option>
                            <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                        <label for="defaultCheck" class="form-check-label">Active ?</label>
                    </div>
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
<!-- Akhir modal tambah submenu -->

<!-- Modal hapus submenu -->
<div class="modal fade" id="hapussubmenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin hapus menu ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <form action="<?=base_url('menu/hapussubmenu/');?>" method="POST"> 
                    <div class="modal-body">Klik tombol "hapus" dibawah jika anda ingin hapus menu.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="<?= base_url('menu/hapussubmenu/');?><?= $sm['id']?>">Hapus</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Akhir hapus submenu -->


<!-- melakukan perulangan data  -->
<?php  $no = 0;
    foreach($subMenu as $sm): $no++;;?>
    <div class="modal fade" id="editSubmenuModal<?php echo $sm['id'];?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="newMenuModalLabel">Edit Submenu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?=base_url('menu/editsubmenu/');?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- <input type="hidden" name="id" value="<?= $sm['id']?>"> -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="id" name="id" value="<?= $sm['id']?>" readonly>
                        </div>
                        <div class="form-group">
                            <select name="menu" id="menu" class="form-control">
                                    <?php foreach ($menu as $m): ?>
                                        <?php if($m['id'] == $sm['menu_id']):?>
                                            <option value="<?= $m['id']; ?>" selected> <?= $m['menu'];?></option>
                                        <?php else : ?>
                                            <option value="<?= $m['id']; ?>"> <?= $m['menu'];?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $sm['judul']?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon']?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="aktif" name="aktif" value="<?= $sm['is_active']?>" readonly>
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
 