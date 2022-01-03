<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//model yang terdapat pada SIterpadu untuk mengirim permintaan data ke webservices DINKES
class M_capil extends CI_Model{
//permintaan token ke webservices Dinkes
    function get_token(){
        $ch = curl_init();
        //url webservices pada webservices Dinkes untuk menerima permintaan tokenisasi
        curl_setopt($ch, CURLOPT_URL, "http://localhost/capil/services/rest/token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        //parameter yang diminta untuk permintaan token
        $param = array(
            'user_api' => 'pdm',
            'pass_api'=>'pdm_pass',
            'email_user'=>'agus@gmail.com'
        );
        //permintaan dikirim menggunakan method post
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));
        $response = curl_exec($ch);
        if (!curl_exec($ch)) {
            die("Error CRUL Code: " . curl_error($ch));
            exit();
        }
        curl_close($ch);
        if (isset($response) && $response != NULL) {
            $data = json_decode($response);
        }
        return $data;
    }
    //fungsi untuk melakukan permintaan data penduduk ke webservices dinkes
    function get_penduduk($nik){
        //memanggil fungsi token untuk disisipkan pada header http request
        $token=$this->get_token();
        $token=$token->token;
        $ch = curl_init();
        //alamat services penduduk yang terdapat di webservices dinkes
        curl_setopt($ch, CURLOPT_URL, "http://localhost/capil/services/api/penduduk");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        //permintaan dikirim menggunakan methode post dengan parameter nik
        $param = array(
            'nik' => $nik
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));
        //token disisipkan pada header
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "authorization:".$token
        ));
        $response = curl_exec($ch);
        if (!curl_exec($ch)) {
            die("Error CRUL Code: " . curl_error($ch));
            exit();
        }
        curl_close($ch);
        if (isset($response) && $response != NULL) {
            //data yang diperoleh dari curl di decode terlebih dahulu menjdai array
            $data = json_decode($response);
        }
        //data return kembali ke controller untuk disimpan
        return $data;
    }
}
?>