<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newMenuModal"><i class="fas fa-plus"></i> Tambah Menu</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>');?>
                                <?= $this->session->flashdata('message');?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Menu</th>
                                            <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;?>
                                            <?php foreach($menu as $m):?>
                                            <tr>
                                                <th scope="row"><?= $i;?></th>
                                                <td><?= $m['menu'];?></td>
                                                <td>
                                                    <button   button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?php echo $m['id'];?>" >
                                                    <i class="fas fa-edit"></i>
                                                    </button>

                                                    <a href="<?= base_url('menu/hapusmenu/')?><?= $m['id']?>" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal">
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

    <!-- Modal Tambah Menu -->
    <div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="newMenuModalLabel">Tambah Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?=base_url('menu');?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
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
    
    <!-- Modal Hapus-->
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin hapus menu ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=base_url('menu/hapusmenu/');?>" method="POST">
                    <div class="modal-body">Klik tombol "hapus" dibawah jika anda ingin hapus menu.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <!-- <button type="submit" class="btn btn-primary">Hapus</button> -->
                        <a class="btn btn-primary" href="<?= base_url('menu/hapusmenu/');?><?= $m['id']?>">Hapus</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End modal hapus -->
 

        <!-- Modal Edit Menu -->
        <!-- melakukan perulangan data  -->
        <?php  $no = 0;
        foreach($menu as $m): $no++;?>
        <div class="modal fade" id="editModal<?php echo $m['id'];?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="newMenuModalLabel">Edit Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?=base_url('menu/editmenu/');?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $m['id']?>">
                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name" value="<?= $m['menu']?>">
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