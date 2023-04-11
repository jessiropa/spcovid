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
                        <?php 
                            foreach($detail->result_array() as $hasil){
                            $kodehasil = $hasil['id_rm'];
                            $tglhasil = $hasil['tgl'];
                            $hasilstatus = unserialize($hasil['caristatus']);
                            $hasilgejala = unserialize($hasil['carigejala']);
                        }
                        ?>
                        <!-- CARD UNTUK JUDUL TABEL -->
                        <div class="card-header py-3">
                            <h4>Hasil Diagnosa</h4>
                        </div>
                        <!-- CARD UNTUK CONTENT -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 ">
                                <h5 style="color: black;"><b>Data Pengguna</b> </h5>
                                </div>
                                <div class="col-lg-4">
                                <p><b><?= $tglhasil?></b> </p>
                                </div>
                            </div>
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
                                    <?php

                                    foreach($kondisi->result_array() as $arraykondisi){
                                        $namakondisi[$arraykondisi['id_kondisi']] = $arraykondisi['kondisin'];
                                        // $nilaikondisi[$arraykondisi['kondisin']] = $arraykondisi['nilaik'];
                                    }
                                    // var_dump($namakondisi[$arraykondisi['id_kondisi']] = $arraykondisi['kondisin']);
                                    // var_dump($nilaikondisi[$arraykondisi['id_kondisi']] = $arraykondisi['nilaik']);

                                    /* ======= Codingan untuk mengambil data dari tabel rekam medis khusus untuk kolom penyakit dan gejala =========*/
                                    // var_dump($detail->result_array);

                                    //  var_dump($kodehasil);
                                    //  var_dump($hasilgejala);
                                     // menampilkan gejala 
                                     $n = 0;
                                     foreach($hasilgejala as $kodegejala => $nilaicf){
                                         $n++;
                                         $cfgejala = $nilaicf;
                                         $cfpersen = $nilaicf*100;
                                        //  var_dump($cfgejala);
                                         $kdgejala = $kodegejala;
                                        //  var_dump($kdgejala);
                                         $this->db->where('id_gejala', $kdgejala);
                                         $get_gejala = $this->db->get('gejala');
                                         foreach($get_gejala->result_array() as $dgejala){
                                            echo '<tr> <th scope="row">'.$n.'</th>';
                                            echo '<td class="col-lg">'.$dgejala['nama_gejala'].'. Nilai kepercayaan gejala sebesar =>  '.$cfgejala.' ('.$cfpersen.'%)</td>';
                                            echo '</tr>';
                                         }
                                     }
                                    ?>
                                </tbody>
                            </table>
                            <h5 style="color: black;"><b>Hasil Diagnosa</b></h5>
                            <hr>
                            <p>Hasil konsultasi yang diperoleh kemungkinan hasil diagnosa sebagai berikut :</p>
                            <table class="table table-borderless">
                                <tbody>
                                    <?php
                                    /* ========= MENAMPUNG DATA PENYAKIT DARI TABEL PENYAKIT ========= */
                                    foreach($status->result_array() as $rystatus){
                                            $arrst[$rystatus['id_status']] = $rystatus['nama_status']; // array menampung nama status
                                    }
                                    $np = 0;
                                    foreach($hasilstatus as $kodestatus => $cfstatus){
                                        $np++;
                                        $kdstatus[$np] = $kodestatus;
                                        $namastatus[$np] = $arrst[$kodestatus];
                                        $nilaicfstatus[$np] = $cfstatus;
                                    }
                                    $nilaistatus1 = $nilaicfstatus[1]*100;
                                    // $nilaistatus2 = $nilaicfstatus[2]*100;
                                    // var_dump($solusipenyakit[1]*100);
                                    // var_dump($namapenyakit[1]);
                                    // var_dump($solusipenyakit[1]);
                                    echo '
                                        <tr>
                                            <th scope="row">Status</th>
                                            <td>:</td>
                                            <td>'.$namastatus[1].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Persentase</th>
                                            <td>:</td>
                                            <td>'.$nilaistatus1.'%</td>
                                        </tr>
                                    ';
                                    ?>

                                </tbody>
                            </table>
                            <h5 style="color: black;"><b>Saran</b></h5>
                            <hr>
                            <p><b>Hubungi rumah sakit atau puskesmas terdekat untuk mendapatkan pemeriksaan lebih lanjut</b></p>
                            <a href="<?= base_url('konsultasi')?>" class="btn btn-primary">Selesai</a>
                            <a href="<?= base_url('laporan/cetak_rm/')?><?= $kodehasil?>" class="btn btn-success"><i class="fas fa-print"></i> Cetak</a>
                            <!-- <button type="submit" class="btn btn-success" name="btnkonsul">Cetak</button> -->
                        </div>
                </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
 