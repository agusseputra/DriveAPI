<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_api extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function get_user($u){
        $this->db->select('username as email');
        $this->db->where('username', $u)->where('akses','api');
        $query = $this->db->get('data_login');
        return $query->row();
    }
    public function is_valid_email($email){
            $this->db->where('username',$email)->where('akses','api');;
            $query = $this->db->get('data_login');
            return $query->num_rows();
    }
    function get_penduduk($nik){
        $this->db->where('nik',$nik);
        return $this->db->get('data_penduduk_capil')->row_array();
    }
    function save_rujukan($post){
        $data =array(
            'nik'=> $post['nik'],
            'nama'=>$post['nama'],
            'norujukan'=> $post['norujukan'],
            'rujukdari'=>$post['rujukdari'],
            'catatanrujukan'=> $post['catatanrujukan'],
            'norujukanbpjs'=>$post['norujukanbpjs'],
            'diagnosa'=> $post['diagnosa'],
            'tanggal_rujukan'=>date('y-m-d'),
            'status'=>'baru'
        );
        $this->db->insert('data_rujukan',$data);
        return $this->db->affected_rows();
    }
    }
?>