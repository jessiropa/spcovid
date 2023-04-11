
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
                            <form  class="form-inline" id="Filterdata">
                            <select class="custom-select col-lg-3" name="" id="status">
                                <option value="0" selected>Pilih Status Pasien</option>
                                <?php foreach ($status as $s): ?>
                                    <option value="<?= $s['id_status'];?>"> <?= $s['nama_status'];?></option>
                                <?php endforeach;?>
                            </select>
                            <button type="submit" class="btn btn-primary ml-3" name="btnPilihan">Tampilkan</button>
                            </form>
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
                                            <?php foreach($filter as $rm):?>
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
 