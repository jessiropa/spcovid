<?php
    // CODINGAN SEBELUMNYA TANPA HEADER DAN FOOTER
    $pdf = new Pdf('P', 'mm', 'A5', true, 'UTF-8', false);
    $pdf->SetTitle('HASIL KONSULTASI');
    // $pdf->SetTopMargin(20);
    // $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetAuthor('Sistem Pakar Covid-19');
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // set image scale factor
    // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    $pdf->SetDisplayMode('real', 'default');
    $pdf->AddPage();
    foreach($detail->result_array() as $hasil){
        $kodehasil = $hasil['id_rm'];
        $tglhasil = $hasil['tgl'];
        $hasilstatus = unserialize($hasil['caristatus']);
        $hasilgejala = unserialize($hasil['carigejala']);
    }
    $html ='<h2 align="center"> HASIL KONSULTASI </h2>
    <h5 align="center"> '.$tglhasil.' </h5> <br>';
    $html.='<h4 class="text-center">DATA KONSULTASI</h4>
    <br>
    <table class="table table-borderless">
        <tbody>
            <tr>
                <th scope="row">Nama Lengkap</th>
                <td>:   '.$user['nama'].'   </td>
                <td></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td>:   '.$user['email'].'   </td>
                <td> </td>
            </tr>
        </tbody>
    </table>
    <br>';
    $html.='
    <h4>GEJALA YANG DIMILIKI</h4>
    <br>';
    $n = 0;
    foreach($hasilgejala as $kodegejala => $nilaicf){
        $n++;
        $cfgejala = $nilaicf;
        $cfpersen = $nilaicf*100;
        $kdgejala = $kodegejala;
        $this->db->where('id_gejala', $kdgejala);
        $get_gejala = $this->db->get('gejala');
        foreach($get_gejala->result_array() as $dgejala){
        $html.='<table class="table table-borderless">
            <tbody>
                <tr>
                <th scope="row">'.$n.'. '.$dgejala['nama_gejala'].' ('.$cfpersen.'%)</th>
                </tr>
            </tbody>
        </table>
        <br>';
        }
    }
    foreach($status->result_array() as $rystatus){
        $arrst[$rystatus['id_status']] = $rystatus['nama_status']; // array menampung nama status
        // $arrsts[$rystatus['id_status']] = $rystatus['solusi']; // array menampung solusi penyakit
    }
    $np = 0;
    foreach($hasilstatus as $kodestatus => $cfstatus){
    $np++;
    $kdstatus[$np] = $kodestatus;
    $namastatus[$np] = $arrst[$kodestatus];
    // $solusistatus[$np] = $arrsts[$kodestatus];
    $nilaicfstatus[$np] = $cfstatus;
    }
    $nilaistatus1 = $nilaicfstatus[1]*100;
    $nilaistatus2 = $nilaicfstatus[2]*100;
    $html .='<h4>HASIL DIAGNOSA</h4>
    <p>Hasil konsultasi yang diperoleh kemungkinan hasil diagnosa sebagai berikut :</p>
    <table class="table table-borderless">
        <tbody>                                    
        <tr>
            <th scope="row">Status Pasien</th>
            <td>: '.$namastatus[1].'</td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">Persentase</th>
            <td>: '.$nilaistatus1.'%</td>
            <td></td>
        </tr>
        </tbody>
    </table>';
    $html.= '<br><h4>SARAN</h4> 
    <p><b>Hubungi rumah sakit atau puskesmas terdekat untuk mendapatkan pemeriksaan lebih lanjut</b></p>
    ';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('hasil_konsultasi.pdf', 'I');
?>