
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
                            <h4><?= $title;?></h4>
                        </div>
                        <!-- CARD UNTUK CONTENT -->
                        <div class="card-body">
                            <div class="row mt-4">
                               <div class="col">
                                   <form action="<?=base_url('pasien');?>" method="POST" class="form-inline" >
                                            <input type="date" name="tgl_awal" class="form-control">
                                            <input type="date" name="tgl_akhir" class="form-control ml-3">
                                            <button type="submit" class="btn btn-primary ml-3" name="btnFilter">Tampilkan</button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <form action="#" method="POST">
                                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="table-info">
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Pasien</th>
                                                <th scope="col" class="text-center">Tanggal</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Persentase</th>
                                                <!-- <th scope="col" class="text-center">Aksi</th> -->
                                            </tr>
                                        </thead> 
                                        <tfoot>
                                            <tr class="table-info">
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Pasien</th>
                                                <th scope="col" class="text-center">Tanggal</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Persentase</th>
                                                <!-- <th scope="col" class="text-center">Aksi</th> -->
                                            </tr>
                                        </tfoot> 
                                        <tbody>
                                            <?php $i = 1;?>
                                            <?php foreach($rekammedis as $rm):?>
                                            <tr>
                                                <th scope="row" class="text-center"><?= $i;?></th>
                                                    <td ><?= $rm['nama'];?></td>
                                                    <td class="text-center"><?= $rm['tgl'];?></td>
                                                    <td class="text-center"><?= $rm['nama_status'];?></td>
                                                    <td class="text-center"><?= $rm['cfhasil']*100;?>%</td>
                                                </th>
                                            </tr>
                                            <?php $i++;?>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                    <br>
                                    <a href="<?= base_url('laporan/cetak_rpall/')?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Keseluruhan</a>
                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#gejalaModal"><i class="fas fa-print"></i> Cetak Periode</a>
                                    <hr>
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

    <!-- Modal Tambah Gejala -->
<div class="modal fade" id="gejalaModal" tabindex="-1" aria-labelledby="gejalaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="gejalaModalLabel">Cetak Riwayat Konsultasi Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="<?= base_url('laporan/cetak_tgl/')?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" >Dari Tanggal</label>
                        <input type="date" class="form-control" id="awal" name="awal" required>
                        <?= form_error('id_gejala', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="" >Dari Tanggal</label>
                        <input type="date" class="form-control" id="akhir" name="akhir" required>
                        <?= form_error('nama_gejala', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-print"></i> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Tambah -->
 