        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title;?></h1>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                <?= $this->session->flashdata('message');?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                <div class="card shadow mb-4">
                        <!-- CARD UNTUK JUDUL TABEL -->
                        <div class="card-header py-3">
                            <h4>Hasil Diagnosa</h4>
                        </div>
                        <!-- CARD UNTUK CONTENT -->
                        <div class="card-body">
                            <h5 style="color: black;"><b>Data Pengguna</b>
                            <hr>
                            </h5>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                    <th scope="row">Nama</th>
                                    <td>:</td>
                                    <td><?= $user['nama'];?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Email</th>
                                    <td>:</td>
                                    <td><?= $user['email'];?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <h5 style="color: black;"><b>Gejala yang dimiliki: </b></h5>
                            <hr>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th scope="row">1.</th>
                                        <td class="col-lg">Batuk 80%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="mb-4">2.</th>
                                        <td class="col-lg-0">Batuk 80%</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h5 style="color: black;"><b>Hasil Diagnosa</b></h5>
                            <hr>
                            <p>Hasil diagnosa yang dihasilkan adalah</p>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th scope="row">Penyakit</th>
                                        <td>:</td>
                                        <td>Coronavirus Disease (COVID-19)</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Persentase</th>
                                        <td>:</td>
                                        <td>0.9887 (98.87%)</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>Hasil diagnosa lainnya adalah</p>
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                        <th scope="row">Penyakit</th>
                                        <td>:</td>
                                        <td>Coronavirus Disease (COVID-19)</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Persentase</th>
                                        <td>:</td>
                                        <td>0.9887 (98.87%)</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h5 style="color: black;"><b>Saran</b></h5>
                            <hr>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th scope="row">Hubungi rumah sakit terdekat untuk mendapatkan pemeriksaan lebih lanjut.</th>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary">Selesai</a>
                            <button type="submit" class="btn btn-success" name="btnkonsul">Cetak</button>
                        </div>
                </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
 