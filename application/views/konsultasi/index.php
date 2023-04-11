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
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading"><i class="fas fa-exclamation-triangle"></i> Perhatian</h4>
                    <hr>
                    <p class="text-justify"> 
                        Dalam melakukan konsultasi, silahkan memilih gejala berdasarkan gejala yang sedang anda alami dan anda dapat memilih kepastian kondisi anda dimulai dari <b>sangat yakin</b>, <b>yakit</b>, <b>cukup yakin</b>, <b>sedikit yakin</b>, <b>kurang yakin</b>, dan <b>tidak yakin</b>. <b> Anda tidak perlu menjawab semua pertanyaannya, pilihlah sesuai kondisi anda. </b> Setelah selesai silahkan klik tombol <b>Konsultasi</b>.
                    </p>
                </div>
                <?= $this->session->flashdata('message');?>
                <div class="card shadow mb-4">
                        <!-- CARD UNTUK JUDUL TABEL -->
                        <div class="card-header py-3">
                            <h4>Diagnosis Penyakit</h4>
                        </div>
                        <!-- CARD UNTUK CONTENT -->
                        <div class="card-body">
                            <form action="<?=base_url('konsultasi/konsul/');?>" method="POST">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="table-info">
                                            <th scope="col">#</th>
                                            <!-- <th scope="col">Kode</th> -->
                                            <th scope="col">Gejala</th>
                                            <!-- <th scope="col"><i class="fas fa-square"></i></th> -->
                                            <th scope="col">Kondisi</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                            <?php $i = 1;?> 
                                            <?php foreach($gejala as $kg):?>
                                        <tr>
                                            <th scope="row"><?= $i;?></th>
                                                <!-- <td>
                                                    <div class="form-group">
                                                            <input type="checkbox" class="form-control-sm" name="jawaban[]" id="jawaban" value="<?= $kg['id'];?>">
                                                    </div>
                                                </td> -->
                                                <input  name="id_gejala" value="<?= $kg['id_gejala'];?>" type="hidden"/>
                                                <!-- <td><?= $kg['id'];?></td> -->
                                                <td>
                                                    <div class="row">
                                                            <div class="col-lg-10">
                                                    Apakah anda mengalami <?= $kg['nama_gejala'];?> ?
                                                            </div>
                                                    </div>
                                                
                                                </td>

                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <select name="cfpasien[]" id="cfpasien" class="form-control">
                                                                <option value="">Pilih Kondisi</option>
                                                                <?php foreach($kondisi as $kn): ?>
                                                                <option value="<?= $kg['id_gejala'].'_'. $kn['nilaik'];?>"><?= $kn['kondisin'];?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </th>
                                        </tr>
                                        <?php $i++;?>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <a href="<?= base_url('general/index')?>" class="btn btn-danger">Batal </a>
                                <button type="submit" class="btn btn-primary" name="btnkonsul"><i class="far fa-users-medical"></i>Konsultasi</button>
                            </form>
                        </div>
                </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
 