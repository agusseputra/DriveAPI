<?php
	
	function pre($str){
		echo "<pre>";
		print_r($str);
		echo "</pre>";
	}
	
	function pre_exit($str){
		echo "<pre>";
		print_r($str);
		echo "</pre>";
		exit();
	}
if ( ! function_exists('bulan'))
{
    function bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}

//format tanggal yyyy-mm-dd
if ( ! function_exists('tgl_indo'))
{
    function tgl_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
        $tanggal = $pecah[2];
        $tanggal = ltrim($tanggal, '0');
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun; //hasil akhir
    }
}
function  array_transform($var,$primary){
    foreach($var as $val){
        $data[$val[$primary]]=$val;
    }
    return $data;
}

function getPangkat(){
    $pg['I A, Juru Muda'] = 'I A, Juru Muda';
    $pg['I B, Juru Muda Tingkat I'] = 'I B, Juru Muda Tingkat I';
    $pg['I C, Juru'] = 'I C, Juru';
    $pg['I D, Juru Tingkat I'] = 'I D, Juru Tingkat I';
    $pg['II A, Pengatur Muda'] = 'II A, Pengatur Muda';
    $pg['II B, Pengatur Muda Tingkat I'] = 'II B, Pengatur Muda Tingkat I';
    $pg['II C, Pengatur'] = 'II C, Pengatur';
    $pg['II D, Pengatur Tingkat I'] = 'II D, Pengatur Tingkat I';
    $pg['III A, Penata Muda'] = 'III A, Penata Muda';
    $pg['III B, Penata Muda Tingkat I'] = 'III B, Penata Muda Tingkat I';
    $pg['III C, Penata'] = 'III C, Penata';
    $pg['III D, Penata Tingkat I'] = 'III D, Penata Tingkat I';
    $pg['IV A, Pembina'] = 'IV A, Pembina';
    $pg['IV B, Pembina Tingkat I'] = 'IV B, Pembina Tingkat I';
    $pg['IV C, Pembina Utama Muda'] = 'IV C, Pembina Utama Muda';
    $pg['IV D, Pembina Utama Madya'] = 'IV D, Pembina Utama Madya';
    $pg['IV E, Pembina Utama'] = 'IV E, Pembina Utama';

    return $pg;
}

function getJenisPindah(){
    $dt['in'] = 'Antar Lembaga';
    $dt['ek'] = 'Luar Lembaga';
    return $dt;
}
function seo_title($s) {
    $c = array (' ');
    $d = array ('/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}

?>
