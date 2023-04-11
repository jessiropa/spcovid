        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

            <div class="row">
                <div class="col-lg-8">
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                <div class="card shadow mb-4">
                        <!-- CARD UNTUK JUDUL TABEL -->
                        <div class="card-header py-3">
                            <h4>Riwayat Hasil Konsultasi</h4>
                        </div>
                        <!-- CARD UNTUK CONTENT -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="#" method="POST">
                                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="table-info">
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Tanggal</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Persentase</th>
                                                <th scope="col" class="text-center">Aksi</th>
                                            </tr>
                                        </thead> 
                                        <tfoot>
                                            <tr class="table-info">
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Tanggal</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Persentase</th>
                                                <th scope="col" class="text-center">Aksi</th>
                                            </tr>
                                        </tfoot> 
                                        <tbody>
                                            <?php $i = 1;?>
                                            <?php foreach($riwayat as $r):?>
                                            <tr>
                                                <th scope="row" class="text-center"><?= $i;?></th>
                                                    <td ><?= $r['tgl'];?></td>
                                                    <td class="text-center"><?= $r['nama_status'];?></td>
                                                    <td class="text-center"><?= $r['cfhasil']*100;?>%</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-primary" href="<?= base_url('konsultasi/detail/');?><?= $r['id_rm']?>"><i class="fas fa-info-circle"></i> Detail</a>
                                                    </td>
                                                </th>
                                            </tr>
                                            <?php $i++;?>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
 