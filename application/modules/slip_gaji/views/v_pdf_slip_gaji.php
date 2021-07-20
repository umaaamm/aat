<table style="width:100%">
    <tr>
        <td rowspan=2 style="width:60%;text-align:left;">
            <?php
                echo $nama_pt
            ?>
        </td>
        <td style="width:40%;text-align:left;font-size:12px;">
            <?php echo 'Proyek : '.$nama_proyek ?>
        </td>
    </tr>
    <tr>
        <td style="width:40%;text-align:left;font-size:12px;">
            <?php 
                function date_indo($date){
                    $month = array (
                        1 =>   'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                    );
                    $split = explode('-', $date);
                
                    return $split[2].' '.$month[(int)$split[1]].' '.$split[0];
                }
                
                echo "Periode : ".date_indo(date($periode_awal))." - ".date_indo(date($periode_akhir));
            ?>
        </td>
    </tr>
</table>
<table style="width:100%">
    <tr>
        <td colspan="4" style="text-align:center;font-size:20px;text-decoration:underline;padding:20px 0">TANDA TERIMA</td>
    </tr>
</table>
<table style="width:100%">
    <tr>
        <td style="width:25%;padding:20px 0">Nama Karyawan</td>
        <td style="width:5%;padding:20px 0">:</td>
        <td style="width:15%;padding:20px 0"><?php echo $nama_karyawan?></td>
    </tr>
    <tr>
        <td style="width:25%;">Perincian</td>
        <td colspan="2" style="width:5%;">:</td>
    </tr>
    <tr>
        <td style="width:25%;">Gaji Pokok</td>
        <td style="width:5%;">:</td>
        <td style="width:15%;">
            <?php
                $date1=date_create($periode_awal);
                $date2=date_create($periode_akhir);
                $diff=date_diff($date1,$date2);
                echo $diff->format("%a hari");
            ?>
        </td>
        <td style="width:5%;">X</td>
        <td style="width:20%;"><?php echo "Rp. ".number_format($gaji_pokok,0,",","."); ?></td>
        <td style="width:5%;">=</td>
        <td style="width:20%;">
            <?php
                $dateDiff=$diff->format("%a");
                $totalGajiPokok = $gaji_pokok*$dateDiff;
                echo "Rp. ".number_format($totalGajiPokok,0,",",".");
            ?>
        </td>
    </tr>
    <tr>
        <td style="width:25%;">Uang Makan</td>
        <td style="width:5%;">:</td>
        <td style="width:15%;">
            <?php
                echo $diff->format("%a hari");
            ?>
        </td>
        <td style="width:5%;">X</td>
        <td style="width:20%;"><?php echo "Rp. ".number_format($uang_makan,0,",","."); ?></td>
        <td style="width:5%;">=</td>
        <td style="width:20%;">
            <?php
                $totalUangMakan = $uang_makan*$dateDiff;
                echo "Rp. ".number_format($totalUangMakan,0,",",".");
            ?>
        </td>
    </tr>
    <tr>
        <td style="width:25%;">Uang Lembur</td>
        <td style="width:5%;">:</td>
        <td style="width:15%;">
            <?php
                echo $lama_lembur." jam";
            ?>
        </td>
        <td style="width:5%;">X</td>
        <td style="width:20%;"><?php echo "Rp. ".number_format($uang_lembur,0,",","."); ?></td>
        <td style="width:5%;">=</td>
        <td style="width:20%;">
            <?php
                $totalUangLembur = $lama_lembur*$uang_lembur;
                echo "Rp. ".number_format($totalUangLembur,0,",",".");
            ?>
        </td>
    </tr>
    <tr>
        <td style="width:25%;border-top: double;border-bottom: double;font-weight: bold;">Total</td>
        <td style="width:5%;border-top: double;border-bottom: double;font-weight: bold;">:</td>
        <td style="width:15%;border-top: double;border-bottom: double;font-weight: bold;"></td>
        <td style="width:5%;border-top: double;border-bottom: double;font-weight: bold;"></td>
        <td style="width:20%;border-top: double;border-bottom: double;font-weight: bold;"></td>
        <td style="width:5%;border-top: double;border-bottom: double;font-weight: bold;">=</td>
        <td style="width:20%;border-top: double;border-bottom: double;font-weight: bold;">
            <?php
                $totalUpah = $totalGajiPokok+$totalUangMakan+$totalUangLembur;
                echo "Rp. ".number_format($totalUpah,0,",",".");
            ?>
        </td>
    </tr>
</table>
<table style="width:100%;border:1px solid black;margin-top:20px;">
    <tr>
        <td style="width:50%;text-align:center;padding:10px 0 100px 0;border:1px solid black;">
            Pembukuan
        </td>
        <td style="width:50%;text-align:center;padding:10px 0 100px 0;border:1px solid black;">
            Penerima
        </td>
    </tr>
</table>