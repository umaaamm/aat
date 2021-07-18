<table style="width:100%">
    <tr>
        <td style="width:65%;text-align:left;padding:20px 0">
            <?php
                $is_aat = strpos($no_kwitansi,'SSM');
                echo $is_aat ? 'CV. ANUGRAH AGUNG TEKNIK' : 'PT. SIDDHAKARYYA SATUHU MUKTI';
            ?>
        </td>
        <td style="width:35%;text-align:center;padding:20px 0">
            <?php echo 'No. '.$no_kwitansi ?>
        </td>
</table>
<table style="width:100%">
    <tr>
        <td colspan="3" style="text-align:center;font-size:20pt;padding:20px 0">K W I T A N S I</td>
    </tr>
</table>
<table style="width:100%">
    <tr>
        <td style="width:30%;padding:20px 0">Sudah Terima Dari</td>
        <td style="width:5%;padding:20px 0">:</td>
        <td style="width:65%;padding:20px 0"><?php echo $sudah_terima_dari?></td>
    </tr>
    <tr>
        <td style="width:30%;padding:20px 0">Banyaknya Uang</td>
        <td style="width:5%;padding:20px 0">:</td>
        <td style="width:65%;padding:20px 0"><?php echo $terbilang_uang?></td>
    </tr>
    <tr>
        <td style="width:30%;padding:20px 0">Untuk Pembayaran</td>
        <td style="width:5%;padding:20px 0">:</td>
        <td style="width:65%;border:1px solid black;padding:20px 10px"><?php echo $untuk_pembayaran?></td>
    </tr>
</table>
<table style="width:100%">
    <tr>
        <td style="padding:20px 0"></td>
    </tr>
</table>
<table style="width:100%">
    <tr>
        <td colspan="3" style="border-top: double;border-bottom: double;text-align:left;padding:20px 0">Jumlah Rp. <?php echo number_format($nominal_uang,"2",",",".");?></td>
    </tr>
</table>
<table style="width:100%">
    <tr>
        <td style="padding:20px 0"></td>
    </tr>
</table>
<table style="width:100%">
    <tr>
        <td style="width:60%;"></td>
        <td style="width:40%;text-align:center">Lampung, 
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
            
            echo date_indo(date($tanggal));
        ?>
        </td>
    </tr>
    <tr>
        <td style="width:60%;padding:75px 0"></td>
        <td style="width:40%;padding:75px 0"></td>
    </tr>
    <tr>
        <td style="width:60%;"></td>
        <td style="width:40%;text-align:center">( SUWITO )</td>
    </tr>
</table>