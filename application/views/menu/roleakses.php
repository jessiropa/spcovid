        <!-- Begin Page Content -->
        <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    Role : <?= $role['role'];?>
                                </div>
                                <div class="card-body">
                                        <?= $this->session->flashdata('message');?>

                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Menu</th>
                                                    <th scope="col">Akses</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;?>
                                                    <?php foreach($menu as $m):?>
                                                    <tr>
                                                        <th scope="row"><?= $i;?></th>
                                                        <td><?= $m['menu'];?></td>
                                                        <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" <?= check_akses($role['id'], $m['id']);?> data-role="<?= $role['id']?>" data-menu="<?= $m['id']?>">
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <?php $i++;?>
                                                    <?php endforeach;?>
                                                </tbody>
                                        </table>
                                </div>
                        </div>
            </div>

        <!-- </div> -->

    <!-- </div> -->
        <!-- /.container-fluid -->

</div>
    <!-- End of Main Content -->