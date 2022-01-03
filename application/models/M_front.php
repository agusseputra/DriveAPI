<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_front extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function rekap_apbn_jk(){
        return $this->db->select('*, sum(total) as jml')->group_by('jk')->get('rekap_apbn')->result();
    }
    function rekap_apbn_desa(){
        return $this->db->select('*,sum(total) as jml')
        ->join('desa_capil','desa_capil.id = rekap_apbn.id_desa')
        ->join('kec_capil','kec_capil.id = desa_capil.id_kec')
        ->group_by('id_desa')->get('rekap_apbn')->result();
    }
    function rekap_apbd_desa(){
        return $this->db->select('*,sum(total) as jml')
        ->join('desa_capil','desa_capil.id = rekap_apbd.id_desa')
        ->join('kec_capil','kec_capil.id = desa_capil.id_kec')
        ->group_by('id_desa')->get('rekap_apbd')->result();
    }
    function tampil_kec_apbn($permalink,$tb){
        $this->db->where('kec_capil.permalink',$permalink);
        $this->db->join('desa_capil','rekap.id_desa=desa_capil.id');
        $this->db->join('kec_capil','desa_capil.id_kec=kec_capil.id');
        return $this->db->get("$tb as rekap")->result_array();
    }
    function tampil_apbn($tb){
        $this->db->select('kec_capil.permalink,id_kec,jk, NM_KECCAPIL,NM_DESACAPIL, sum(u1) as u1,sum(u2) as u2,sum(u3) as u3,sum(u4) as u4,sum(u5) as u5,sum(u6) as u6,sum(u7) as u7, sum(total) as total');
        $this->db->join('desa_capil','rekap.id_desa=desa_capil.id');
        $this->db->join('kec_capil','desa_capil.id_kec=kec_capil.id');
        $this->db->group_by('id_kec,jk');
        return $this->db->get("$tb as rekap")->result_array();
    }
    }
    ?>