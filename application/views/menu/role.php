        <!-- Begin Page Content -->
        <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambahroleModal"><i class="fas fa-plus"></i> Tambah Role</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>');?>
                                        <?= $this->session->flashdata('message');?>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;?>
                                                    <?php foreach($role as $r):?>
                                                    <tr>
                                                        <th scope="row"><?= $i;?></th>
                                                        <td><?= $r['role'];?></td>
                                                        <td>
                                                            <a href="<?= base_url('menu/roleakses/'). $r['id'];?>" class="btn btn-warning btn-sm" >Akses</a>
                                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?php echo $r['id'];?>"><i class="fas fa-edit"></i></button>
                                                            <a href="<?= base_url('menu/hapusmenu/')?><?= $r['id']?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal"><i class="fas fa-trash-alt"></i></a>
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

        <!-- </div> -->

    <!-- </div> -->
        <!-- /.container-fluid -->

</div>
    <!-- End of Main Content -->

    <!-- Modal Tambah Role -->
    <div class="modal fade" id="tambahroleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="tambahroleModalLabel">Tambah Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?=base_url('menu/role');?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama role">
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
