<?php
    // CODINGAN SEBELUMNYA TANPA HEADER DAN FOOTER
    $pdf = new Pdf('P', 'mm', 'A5', true, 'UTF-8', false);
    $pdf->SetTitle('HASIL KONSULTASI');
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
    $pdf->SetDisplayMode('real', 'default');
    $pdf->AddPage();
    $html='<h2 align="center">DAFTAR LAPORAN RIWAYAT HASIL KONSULTASI</h2><br />
    <table border="1px" style="margin-left:auto;margin-right:auto;">
    <thead>
        <tr>
            <th align="center"><b>No</b></th>
            <th align="center"><b>Nama Pasien</b></th>
            <th align="center"><b>Tanggal</b></th>
            <th align="center"><b>Status</b></th>
            <th align="center"><b>Persentase</b></th>
        </tr>
    </thead>
    ';
    $i = 0;
    foreach($cetak as $hasil){
        $i++;
        $persen = $hasil['cfhasil']*100;
        $html.='
        <tbody>
            <tr>
                <td align="center">'.$i.'</td>
                <td>'.$hasil['nama'].'</td>
                <td align="center">'.$hasil['tgl'].'</td>
                <td align="center">'.$hasil['nama_status'].'</td>
                <td align="center">'.$persen.'%</td>
            </tr>
        </tbody>
        ';
    }
    $html .='
    </table>
    ';

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('Daftar_konsultasi.pdf', 'I');
?>