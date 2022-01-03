<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dokumen extends CI_Controller{
	function __construct(){
        parent::__construct();
        $this->load->model(array('M_drive','M_prodi'));
    }
    public function index(){
        $data['title']='Beranda';
        $data['prodi']=$this->db->get('prodi')->result_array();
        $data['content'] = 'prodi';
        $this->load->view('template_old', $data);
    }
    function index2($permalink){
        //$this->rps();
        if(isset($_GET['f'])){
            $this->folder($permalink);
        }else{
        $id_prodi=3;
        $fileId='1eZsOfz5_7R-aeF3oBvgeQmm_LdyVtcCP';
        $detail=$this->M_drive->get_detail($fileId);
        $data['title']=$detail['name'];
        $data['folderparent']['id_drive']=0;
        $data['folderparent']['path']="media/";
        $data['folderparent']['file']=null;
        $folder=$this->M_prodi->get_menu($id_prodi);
        $data['folder']=$folder['menu'];
        $data['file']=$this->M_drive->get_files_and_folders($fileId);
        $data['content'] = 'front/dokumenpanduan';
        $data['permalink']=$permalink;
        $this->load->view('template', $data);
        }
    }
    function folder($permalink, $id=null){      
        $id_prodi=3;
        $data['folderparent']['id_folder']=0;
        $data['folderparent']['path']="media/";
        $data['folderparent']['file']=null;
        $data['folderparent']['nama_folder']="";
        $fileId='15QRuT50rHt-dwEOr4K1ao05xEKzFMkUZ';
        $data['title']="Dokumen prodi";
        $data['permalink']=$permalink;
        $folder=$this->M_prodi->get_menu($id_prodi);
        $data['folder']=$folder['menu'];
        if(isset($_GET['f'])){
            if($_GET['f']!=''){
                $parent= $this->db->where('id_prodi',$id_prodi)->where('permalink',$_GET['f'])->or_where('id_folder',$_GET['f'])->get('folder')->row_array();
                if($parent != NULL){
                    $data['folderparent']=$parent;
                    $fileId=$parent['id_drive'];
                }
                $data['title']=$data['folderparent']['nama_folder'];                
            }
            $data['file']=$this->M_drive->get_files_and_folders($fileId);
            $data['content'] = 'front/dokumen';
            $this->load->view('template', $data);
        }else{
            $parent= $this->db->where('id_prodi',$id_prodi)->where('permalink',$id)->or_where('id_folder',$id)->get('folder')->row_array();
            if($parent != NULL){
                $data['folderparent']=$parent;
                $fileId=$parent['id_drive'];
            }
            $data['file']=$this->M_drive->get_files_and_folders($fileId);
            $data['title']=$data['folderparent']['nama_folder'];
            $this->load->view('front/dokumen', $data);
        }
    }
    public function standar ($permalink,$std=null){
        $data['permalink']=$permalink;
        $this->db->where('permalink',$permalink);
            $prodi=$this->db->get('prodi')->row_array();
            if($prodi!=NULL){
                if($prodi['permalink']=='mi'){
                    $this->index2($permalink);
                }else{            
                    $data['title']=$prodi['nama_prodi'];
                    $versi=$prodi['versi'];
                    $this->db->where('versi',$versi);
                    $data['standar']=$this->db->get('standar')->result_array();
                    $detail=null;
                    $item=null; 
                    if(isset($_GET['dok']) && $_GET['dok'] != null){
                        $judul=$_GET['dok'];
                        if($_GET['std']!= NULL){
                            $this->db->where('left(no_item,1)',$_GET['std']);
                        }
                    }  else{           
                    if(isset($std)){
                        $this->db->where('left(no_item,1)',$std);
                    }}
                    if(isset($_GET['dok']) && $_GET['dok'] != null){
                    $this->db->where("( nama_dokumen like '%$judul%' or no_item like '%$judul%')");
                    }
                    $this->db->where('id_prodi',$prodi['idprodi']);
                    $dok=$this->db->order_by('no_item','asc')->get('dokumenbaru')->result_array();                    
                    if($dok != null){
                        foreach($dok as $val){
                            $detail[$val['jenis']][]=$val;
                        }
                    }
                    $data['standar']=$this->db->where('versi',$versi)->get('standar')->result_array();
                    $data['detail']=$detail;
                    $data['prodi']=$prodi;
                    $data['content'] = 'berandanew';
                    //echo '<pre>';print_r($data);echo '</pre>';
                    $this->load->view('template_old', $data);
                }
            }
    }
}
?>