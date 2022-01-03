<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pbi extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function kecamatan(){
        return $this->db->get('kec_capil')->result();
    }
    function data($limit, $page,$tipe){
        if($tipe=='apbn'){
            $this->db->join('apbn','apbn.id_peserta = peserta.id_peserta');
        }else if($tipe=='apbd'){
            $this->db->join('apbd','apbd.id_peserta = peserta.id_peserta');
        }else{
            $this->db->join('apbn','apbn.id_peserta = peserta.id_peserta');
        }
        $return=$this->db->join('desa_capil','desa_capil.id = peserta.id_desa')
            ->join('kec_capil','kec_capil.id = desa_capil.id_kec')->limit($limit, $page)->get('peserta')->result();            
        return $return;
    }
    function num_data($tipe){
        if($tipe=='apbd'){
            $this->db->join('apbd','apbd.id_peserta = peserta.id_peserta');
        }else{
            $this->db->join('apbn','apbn.id_peserta = peserta.id_peserta');
        }
        $return=$this->db->get('peserta')->num_rows();            
        return $return;
    }
    function ganda($limit, $page){
        $this->db->select('*,apbn.nama_penerima as nama_apbn,apbd.nama_penerima as nama_apbd');
        $this->db->join('apbd','apbd.id_peserta = peserta.id_peserta');
        $this->db->join('apbn','apbn.id_peserta = peserta.id_peserta');
        $return=$this->db->join('desa_capil','desa_capil.id = peserta.id_desa')
            ->join('kec_capil','kec_capil.id = desa_capil.id_kec')->limit($limit, $page)->get('peserta')->result();            
        return $return;
    }
    function num_ganda(){
        $this->db->join('apbd','apbd.id_peserta = peserta.id_peserta');
        $this->db->join('apbn','apbn.id_peserta = peserta.id_peserta');
        $return=$this->db->get('peserta')->num_rows();            
        return $return; 
    }
    
    }
    ?>