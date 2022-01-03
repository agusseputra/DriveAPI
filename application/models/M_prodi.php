<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_prodi extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_mk($id_prodi){
        $return= $this->db->where('id_prodi',$id_prodi)
                ->join('rps','rps.id_mk=matakuliah.id_mk')
                ->join('dosen','dosen.id_dosen=rps.id_dosen')                
                ->get('matakuliah');
                return $return;
    }
    function get_mk_only($id_prodi){
        $return= $this->db->where('id_prodi',$id_prodi)
                ->get('matakuliah');
                return $return;
    }
    function get_dosen(){
        $return= $this->db->get('dosen');
                return $return;
    }
    function get_rps($id){
        $return= $this->db->where('id_rps',$id)->get('pertemuan');
        return $return;
    }
    public function get_menu($id_prodi)
    {
        $data=null;
        $this->db->order_by('nama_folder','asc');
        $folder= $this->db->where('id_prodi',$id_prodi)->get('folder')->result_array();
        foreach($folder as $val){
            if($val['parent']==null){
                $val['parent']=0;
            }
            $data[$val['parent']][]=$val;
        }
        $return['menu']=$data;
        $return['folder']=$folder;
        return $return;
    }
    function pertemuan_simpan($post){
        unset($post['_wysihtml5_mode']);
        $post['pertemuan']=json_encode($post['pertemuan']);
        $post['metode']=json_encode($post['metode']);
        if(isset($post['id_pertemuan'])){
            $idp=$post['id_pertemuan'];
            $idrs=$post['id_rps'];
            unset($post['id_pertemuan']);
            unset($post['id_rps']);            
            $this->db->where('md5(id_pertemuan)',$idp);
            $this->db->where('id_rps',$idrs);
            $this->db->update('pertemuan',$post);
            return 2;
        }else{
            $this->db->insert('pertemuan',$post);
            return $this->db->affected_rows();
        }        
    }
    function pertemuan_delete($id_rps,$id)
    {
        $this->db->where('md5(id_rps)',$id_rps)->where('md5(id_pertemuan)',$id)->delete('pertemuan');
    }
    function rps_simpan($post){
        $this->db->where('id_mk',$post['id_mk'])->where('id_prodi',$post['id_prodi'])->update('matakuliah',array('deskripsi'=>$post['deskripsi']));
        if($post['id_rps'] != ''){
            $this->db->where('md5(id_rps)',$post['id_rps']);
            $this->db->update('rps',array('id_mk'=>$post['id_mk'],'id_dosen'=>$post['id_dosen']));
            return 2;
        }else{
            $this->db->insert('rps',array('id_mk'=>$post['id_mk'],'id_dosen'=>$post['id_dosen']));
            return $this->db->affected_rows();
        }
        
    }
    function rps_delete($id_rps,$id_prodi)
    {
        $this->db->query("delete a from db_aps.rps as a join matakuliah as b on a.id_mk=b.id_mk where md5(a.id_rps)='$id_rps' and b.id_prodi='$id_prodi'");
    }
}
?>