<?php 


require_once __DIR__ . '/../../vendor/autoload.php';
use Mpdf\Mpdf;

$mpdf = new Mpdf();
require_once '../app/models/DataBuku.php';
require_once '../app/models/DataAnggota.php';
require_once '../app/models/DataPinjam.php';


class cetak extends Controller {
    
    public function cetakDataAnggota() {
        $dataAnggota = new DataAnggota();
        $AnggotaList = $dataAnggota->getAllAnggota();
        $mpdf = new Mpdf();
        $header = '
                <img src="https://images2.imgbox.com/5f/ad/60CnBI80_o.png" alt="logo" style="width: 250px; height: auto; margin-right: 8px;">
            ';

        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter('
            <div style="text-align: right; font-weight: light; font-size: 10pt;">
                SISPUS Data Anggota Halaman : {PAGENO}
            </div>
        ');
        $html = '<!DOCTYPE html>
                    <head>
                        <title>Data Anggota</title>
                    </head>
                    <style>
                body {
                    font-family: Arial, sans-serif;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 20px 0;
                    font-size: 12px
                }
                th, td {
                    border: 1px solid rgb(193, 193, 193);
                    text-align: left;
                    padding: 8px;
                }
                th {
                    background-color: #f2f2f2;
                }
            </style><body><br><br> <h1 style="text-align:center;">Data Anggota</h1> <table><thead>
                    <tr>
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">Nim</th>
                        <th style="text-align: center">Tanggal Masuk</th>
                        <th style="text-align: center">Nama</th>
                        <th style="text-align: center">Program Studi</th>
                    </tr>
                </thead><tbody>';

        $lit = 1;
        foreach ($AnggotaList as $anggota) {
            $html .= '<tr>
                        <td style="text-align: center">' . $lit . '</td>
                        <td style="text-align: center">' . $anggota['nomor'] . '</td>
                        <td style="text-align: center">' . $anggota['tanggal_masuk'] . '</td>
                        <td>' . $anggota['nama'] . '</td>
                        <td>' . $anggota['jurusan'] . '</td>
                    </tr>';
                    $lit++;
        }

        $html .= '</tbody></table></body></html>';
        $mpdf->WriteHTML($html);
        $mpdf->Output('Daftar_Buku.pdf', 'I');
    }
    public function cetakDataBuku() {
        $dataBuku = new DataBuku();
        $bukuList = $dataBuku->getAllBuku();
        $mpdf = new Mpdf();
        $header = '
                <img src="https://images2.imgbox.com/5f/ad/60CnBI80_o.png" alt="logo" style="width: 250px; height: auto; margin-right: 8px;">
            ';

        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter('
            <div style="text-align: right; font-weight: light; font-size: 10pt;">
                SISPUS Data Buku Halaman : {PAGENO}
            </div>
        ');
        $html = '<!DOCTYPE html>
                    <head>
                        <title>Data Buku</title>
                    </head>
                    <style>
                body {
                    font-family: Arial, sans-serif;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 20px 0;
                    font-size: 12px
                }
                th, td {
                    border: 1px solid rgb(193, 193, 193);
                    text-align: left;
                    padding: 8px;
                }
                th {
                    background-color: #f2f2f2;
                }
            </style><body><br><br> <h1 style="text-align:center;">Data Buku</h1> <table><thead>
                    <tr>
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">Kode</th>
                        <th style="text-align: center">Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th style="text-align: center">Tahun Terbit</th>
                        <th style="text-align: center">Jumlah</th>
                        <th style="text-align: center">Stock</th>
                    </tr>
                </thead><tbody>';
        $lit = 1;
        $jumlah = 0;
        $stock = 0;
        foreach ($bukuList as $buku) {
            $html .= '<tr>
                        <td style="text-align: center">' . $lit . '</td>
                        <td style="text-align: center">' . $buku['kode'] . '</td>
                        <td>' . $buku['judul'] . '</td>
                        <td>' . $buku['pengarang'] . '</td>
                        <td>' . $buku['penerbit'] . '</td>
                        <td style="text-align: center">' . $buku['tahun_terbit'] . '</td>
                        <td style="text-align: center">' . $buku['jumlah'] . '</td>
                        <td style="text-align: center">' . $buku['stock'] . '</td>
                    </tr>';
                    $lit++;
            $jumlah += $buku['jumlah'];
            $stock += $buku['stock'];
        }   $html .= '<tr>
                        <td colspan="8" style="text-align: center; font-weight:bold; background-color: #f2f2f2"> Total Jumlah Buku: ' . $jumlah . ' item && Jumlah Buku Tersedia : '. $stock  .' item</td>
                        </tr>';

        $html .= '</tbody></table></body></html>';
        $mpdf->WriteHTML($html);
        $mpdf->Output('Daftar_Buku.pdf', 'I');
    }

    public function cetakDataPeminjaman() {
        $dataPeminjaman = new DataPinjam();
        $listPeminjaman = $dataPeminjaman->getAllPeminjaman();
        $mpdf = new Mpdf();
        $header = '
                <img src="https://images2.imgbox.com/5f/ad/60CnBI80_o.png" alt="logo" style="width: 250px; height: auto; margin-right: 8px;">
            ';

        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter('
            <div style="text-align: right; font-weight: light; font-size: 10pt;">
                SISPUS Data Peminjaman Halaman : {PAGENO}
            </div>
        ');
        $html = '<!DOCTYPE html>
                    <head>
                        <title>Data Peminjaman</title>
                    </head>
                    <style>
                body {
                    font-family: Arial, sans-serif;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 20px 0;
                    font-size: 12px
                }
                th, td {
                    border: 1px solid rgb(193, 193, 193);
                    text-align: left;
                    padding: 8px;
                }
                th {
                    background-color: #f2f2f2;
                }
            </style><body><br><br> <h1 style="text-align:center;">Data Peminjaman</h1> <table><thead>
                    <tr>
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">Nim</th>
                        <th>Nama</th>
                        <th style="text-align: center">Kode Buku</th>
                        <th style="text-align: center">Tanggal Peminjaman</th>
                        <th style="text-align: center">Tanggal Pengembalian</th>
                        <th style="text-align: center">Denda</th>
                    </tr>
                </thead><tbody>';
                $lit = 1;
                $totalDenda = 0;
                
                foreach ($listPeminjaman as $list) {
                    // Tangani nilai null dan format denda
                    $denda = !empty($list['denda']) ? $list['denda'] : 'Rp. 0,-';
                    $denda = str_replace(['Rp.', '.', ',-', ' '], '', $denda); // Hapus simbol Rupiah, titik, dan koma
                    $denda = (int)$denda; // Konversi menjadi angka
                    
                    // Tambahkan ke total denda
                    $totalDenda += $denda;
                
                    $html .= '<tr>
                                <td style="text-align: center">' . $lit . '</td>
                                <td style="text-align: center">' . $list['nomor_anggota'] . '</td>
                                <td>' . $list['nama_anggota'] . '</td>
                                <td style="text-align: center">' . $list['kode_buku'] . '</td>
                                <td style="text-align: center">' . $list['tanggal_peminjaman'] . '</td>
                                <td style="text-align: center">' . (!empty($list['tanggal_pengembalian']) ? $list['tanggal_pengembalian'] : 'belum dikembalikan') . '</td>
                                <td style="text-align: center">' . (!empty($list['denda']) ? $list['denda'] : 'belum dikembalikan') . '</td>
                            </tr>';
                    $lit++;
                }
                
                $html .= '<tr>
                            <td colspan="6" style="text-align: right"><strong>Total Denda:</strong></td>
                            <td style="text-align: center">Rp. ' . number_format($totalDenda, 0, ',', '.') . ',-</td>
                        </tr>';
                   

        $html .= '</tbody></table></body></html>';
        $mpdf->WriteHTML($html);
        $mpdf->Output('Daftar_Buku.pdf', 'I');
    }
}
    
