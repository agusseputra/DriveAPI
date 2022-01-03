<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!isset($_SESSION)) @session_start();

class Fn{

    protected $_ci;

    function __construct() {
        $this->_ci =& get_instance();
      //  $this->_ci->load->model('fn_model', 'doom');
    }
    function ref_fakultas($id=NULL){
    $fakultas=$this->_ci->db->get('ref_fakultas')->result_array();
    if($fakultas != NULL){
        foreach($fakultas as $val){
            $fak[$val['id_fakultas']]=$val;
        }
    if($id != NULL){
        return $fak[$id];
    }else{
        return $fak;
    }
    }else{
        return NULL;
    }
   }
   function ref_jurusan($id=NULL){
    $jurusan=$this->_ci->db->get('ref_jurusan')->result_array();
    if($jurusan != NULL){
        foreach($jurusan as $val){
            $jur[$val['id_jurusan']]=$val;
        }
    if($id != NULL){
        return $jur[$id];
    }else{
        return $jur;
    }
    }else{
        return NULL;
    }
   }
   function ref_status($id=NULL){
    $jurusan=$this->_ci->db->get('ref_status_mahasiswa')->result_array();
    if($jurusan != NULL){
        foreach($jurusan as $val){
            $jur[$val['id_status']]=$val;
        }
    if($id != NULL){
        return $jur[$id];
    }else{
        return $jur;
    }
    }else{
        return NULL;
    }
   }
   function home($type,$nim=NULL){
    if($type=='mahasiswa'){
        return site_url('mahasiswa/profile/');
    }elseif($type=='fakultas'){
        return site_url('admin/kemahasiswaan/');
    }elseif($type=='lembaga'){
        return site_url('admin/lembaga/');
    }elseif($type=='admin'){
        return site_url('admin/lembaga/');
    }elseif($type=='ortu'){
        return site_url($nim);
    }
   }
   function get_ss_mahasiswa($ss=''){
   $session = $_SESSION;
		if (isset($session["mahasiswa"])){
			if ($ss==""){
				return $session["mahasiswa"];
			}elseif (isset($session["mahasiswa"][$ss])){
				return $session["mahasiswa"][$ss];
			}else{
				return false;
			}
		}else{
			return false;
		}
   }
   function get_ss_kemahasiswaan($ss=''){
   $session = $_SESSION;
		if (isset($session["fakultas"])){
			if ($ss==""){
				return $session["fakultas"];
			}elseif (isset($session["fakultas"][$ss])){
				return $session["fakultas"][$ss];
			}else{
				return false;
			}
		}else{
			return false;
		}
   }
   function get_ss_lembaga($ss=''){
   $session = $_SESSION;
		if (isset($session["lembaga"])){
			if ($ss==""){
				return $session["lembaga"];
			}elseif (isset($session["lembaga"][$ss])){
				return $session["lembaga"][$ss];
			}else{
				return false;
			}
		}else{
			return false;
		}
   }
   function get_ss_ortu($ss=''){
   $session = $_SESSION;
		if (isset($session["ortu"])){
			if ($ss==""){
				return $session["ortu"];
			}elseif (isset($session["ortu"][$ss])){
				return $session["ortu"][$ss];
			}else{
				return false;
			}
		}else{
			return false;
		}
   }
   function set_ss_user($array){
    $this->_ci->session->unset_userdata($array['type']);
	$_SESSION[$array['type']] = $array;
   }
   function get_setting(){
    return $this->_ci->db->get('setting_program')->row_array();
   }
}?>