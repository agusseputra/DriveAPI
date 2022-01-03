<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Prodi extends CI_Controller{
	function __construct(){
        parent::__construct();
        // if (!$this->session->userdata('email')) {
        //     redirect('login');
            $user['id_prodi']=3;
            $user['id']=3;
            $user['name']='Proposal TRPL';
            $user['email']='';
            $this->session->set_userdata($user);
         // }
        $this->load->model(array('M_drive','M_prodi'));

    }
    function index(){
        //$this->rps();
        if(isset($_GET['f'])){
            $this->folder();
        }else{
        $id_prodi=$this->session->userdata('id_prodi');  
        $fileId='1Aj-ylDQOLlUx_zpYsvTTqGx3D7azheR3';
        $detail=$this->M_drive->get_detail($fileId);
        $data['title']=$detail['name'];
        $data['folderparent']['id_drive']=0;
        $data['folderparent']['path']="media/";
        $data['folderparent']['file']=null;
        $folder=$this->M_prodi->get_menu($id_prodi);
        $data['folder']=$folder['menu'];
        $data['file']=$this->M_drive->get_files_and_folders($fileId);
        $data['content'] = 'admin/dokumenpanduan';
        $this->load->view('admin/template', $data);
        }
    }
    // function index(){
    //     $id_prodi=3;
    //     $data['folder']=$this->M_prodi->get_menu($id_prodi);
    //     $data['folderparent']['id_folder']=0;
    //     $data['folderparent']['path']="media/";
    //     $data['folderparent']['file']=null;
    //     $data['title']="Dokumen prodi";
    //     if(isset($_GET['f'])){
    //         $parent= $this->db->where('id_prodi',$id_prodi)->where('permalink',$_GET['f'])->or_where('id_folder',$_GET['f'])->get('folder')->row_array();
    //         if($parent != NULL){
    //             $data['folderparent']=$parent;
    //             $data['title']=$data['folderparent']['nama_folder'];
    //         }
    //     }
    //     $data['content'] = 'admin/dokumen';
    //     $this->load->view('admin/template', $data);
    // }
    
    function folder($id=null){      
        $id_prodi=$this->session->userdata('id_prodi');  
        $data['folderparent']['id_folder']=0;
        $data['folderparent']['path']="media/";
        $data['folderparent']['file']=null;
        $data['folderparent']['nama_folder']="";
        $fileId='1Aj-ylDQOLlUx_zpYsvTTqGx3D7azheR3';
        $data['title']="Dokumen prodi";
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
            $data['content'] = 'admin/dokumen';
            $this->load->view('admin/template', $data);
        }else{
            $parent= $this->db->where('id_prodi',$id_prodi)->where('permalink',$id)->or_where('id_folder',$id)->get('folder')->row_array();
            if($parent != NULL){
                $data['folderparent']=$parent;
                $fileId=$parent['id_drive'];
            }
            $data['file']=$this->M_drive->get_files_and_folders($fileId);
            $data['title']=$data['folderparent']['nama_folder'];
            $this->load->view('admin/dokumen', $data);
        }
    }
    function folder_search(){      
        $id_prodi=$this->session->userdata('id_prodi');
        $data['folderparent']['id_folder']=0;
        $data['folderparent']['path']="media/";
        $data['folderparent']['file']=null;
        $fileId='1Aj-ylDQOLlUx_zpYsvTTqGx3D7azheR3';
        $data['title']="Dokumen prodi";
        $folder=$this->M_prodi->get_menu($id_prodi);
        $data['folder']=$folder['menu'];
        $array = array('nama_folder' => $_GET['s'],'file'=> $_GET['s']);
        $parent= $this->db->where('id_prodi',$id_prodi)->like($array)->get('folder')->row_array();
        if($parent != NULL){
            $data['folderparent']=$parent;
            $data['title']=$data['folderparent']['nama_folder'];
            $fileId=$parent['id_drive'];            
        }
        $data['file']=$this->M_drive->get_files_and_folders($fileId);
        if(isset($_GET['f'])){
            $data['content'] = 'admin/dokumen';
            $this->load->view('admin/template', $data);
        }else{
            $this->load->view('admin/dokumen', $data);
        }
    }
    function upload(){
        $id_prodi=$this->session->userdata('id_prodi');
        $id_user=$this->session->userdata('id'); 
        $result['error'] = true;
        $result['msg_header'] = 'Lengkapi Data';
        $result['msg_body'] = "Data not saved";
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('berkas[]', 'FIle', 'required');
        // if ($this->form_validation->run() == FALSE) {
        //     $result['msg_body'] = validation_errors();
        // } else {
            //print_r($_FILES);exit();
            $new_path=0;
            $folder= $this->db->where('id_prodi',$id_prodi)->where('id_folder',$_POST['id'])->get('folder')->row_array();
            if($_POST['id']==0){
                $folder['id_folder']=NULL;
                $folder['path']='media';
                $folder['id_prodi']=$id_prodi;
                $folder['permalink']='';
                $folder['id_drive']="1Aj-ylDQOLlUx_zpYsvTTqGx3D7azheR3";
            }
            if($folder !=NULL){
                if($_POST['folder_new'] != ''){
                   $folder_new=seo_title($_POST['folder_new']);
                   //$folder_new=$_POST['folder_new'];
                   $exits= $this->db->where('id_prodi',$id_prodi)->where('permalink',$folder_new)->get('folder')->num_rows();
                    if ($exits==0) {
                        //mkdir($folder['path'].'/'.$folder_new, 755, true);   
                        $path=$folder['path'].'/'.$folder_new;
                        $new_path=1;
                        $folder_id = $this->M_drive->create_folder($_POST['folder_new'],$folder['id_drive']);
                    }                    
                }else{
                    $path=$folder['path'];
                    $folder_id = $folder['id_drive'];
                }
                if (isset($path)) {       
                        $result['msg_body'] = "folder create";        
                        $config['upload_path']          = './'.$path;
                        $config['allowed_types']        = 'gif|jpg|png|mp4|MP4|mp3|JPG|jpeg|JPEG|doc|docx|xls|xlsx|ppt|pptx|pdf';
                        $config['max_size']             = 15120;              
                        //$this->load->library('upload', $config);  
                        foreach ($_FILES['berkas']['name'] as $i => $image) {
                            $_FILES['file']['name'] = $_FILES['berkas']['name'][$i];
                            $_FILES['file']['type'] = $_FILES['berkas']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
                            $_FILES['file']['error'] = $_FILES['berkas']['error'][$i];
                            $_FILES['file']['size'] = $_FILES['berkas']['size'][$i];       
                            if($_FILES["file"]["tmp_name"]!=null){
                                $success = $this->M_drive->insert_file_to_drive( $_FILES["file"]["tmp_name"] , $_FILES['file']['name'], $folder_id);
                                if($success){
                                    $drive[]= $_FILES['file']['name'];  
                                }
                                $file[]=$_FILES['file']['name'];    
                            }                       
                        }                                                 
                        if($new_path==1){
                            $dt['nama_folder']=$_POST['folder_new'];
                            $dt['parent']=$folder['id_folder'];
                            $dt['id_prodi']=$folder['id_prodi'];
                            $dt['permalink']=$folder_new;
                            $dt['path']=$path;
                            if(isset($file)){
                            $dt['file']=json_encode($file);
                            }
                            $dt['id_drive']=$folder_id;
                            $dt['id_user']=$id_user;
                            $this->db->insert('folder',$dt);
                            $result['redirect_ajax'] = site_url('prodi/folder/'.$folder_new);
                            $result['f']=$folder_new;
                        }else{
                            if($folder['file']!=NULL){
                                $dt['file']=json_decode($folder['file']);
                                if(isset($file)){
                                    $dt['file']=@array_merge($dt['file'],$file);
                                }
                                $dt['file']=json_encode($dt['file']);
                            }else{
                                $dt['file']=json_encode($file);
                            }
                            $dt['id_user']=$id_user;
                            $this->db->where('id_folder',$folder['id_folder'])->update('folder',$dt);
                            $result['redirect_ajax'] = site_url('prodi/folder/'.$folder['permalink']);
                            $result['f']=$folder['permalink'];
                        }
                        $result['error'] = false;
                        $result['msg_header'] = 'Success';
                        if(isset($file)){
                            $result['msg_body'] = "File Uploaded";
                        }else{
                            $result['msg_body'] = "Tidak ada file diunggah";
                        }                       
                        $result['div']='#cont';                        
                }else{
                    $result['msg_body'] = "Cek kembali nama folder, kemungkinan nama folder telah ada";
                }
            }
      //  }
        echo json_encode($result);
    }
    function upload_with_lokal(){
        $id_prodi=$this->session->userdata('id_prodi');
        $result['error'] = true;
        $result['msg_header'] = 'Lengkapi Data';
        $result['msg_body'] = "Data not saved";
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('berkas[]', 'FIle', 'required');
        // if ($this->form_validation->run() == FALSE) {
        //     $result['msg_body'] = validation_errors();
        // } else {
            //print_r($_FILES);exit();
            $new_path=0;
            $folder= $this->db->where('id_prodi',$id_prodi)->where('id_folder',$_POST['id'])->get('folder')->row_array();
            if($_POST['id']==0){
                $folder['id_folder']=0;
                $folder['path']='media';
                $folder['id_prodi']=$id_prodi;
                $folder['permalink']='';
                $folder['id_drive']="1Aj-ylDQOLlUx_zpYsvTTqGx3D7azheR3";
            }
            if($folder !=NULL){
                if($_POST['folder_new'] != ''){
                   $folder_new=seo_title($_POST['folder_new']);
                   $exits= $this->db->where('id_prodi',$id_prodi)->where('permalink',$folder_new)->get('folder')->num_rows();
                    if (!is_dir($folder['path'].'/'.$folder_new)&&$exits==0) {
                        mkdir($folder['path'].'/'.$folder_new, 755, true);   
                        $path=$folder['path'].'/'.$folder_new;
                        $new_path=1;
                        $folder_id = $this->M_drive->create_folder($folder_new,$folder['id_drive']);
                    }                    
                }else{
                    $path=$folder['path'];
                    $folder_id = $folder['id_drive'];
                }
                if (isset($path) && is_dir($path)) {       
                    $result['msg_body'] = "folder create";             
                    $config['upload_path']          = './'.$path;
                    $config['allowed_types']        = 'gif|jpg|png|mp4|MP4|mp3|JPG|jpeg|JPEG|doc|docx|xls|xlsx|ppt|pptx|pdf';
                    $config['max_size']             = 5120;              
                    $this->load->library('upload', $config);  
                    foreach ($_FILES['berkas']['name'] as $i => $image) {
                        $_FILES['file']['name'] = $_FILES['berkas']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['berkas']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['berkas']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['berkas']['size'][$i];       
                        if($this->upload->do_upload('file')){
                            $success = $this->M_drive->insert_file_to_drive( $_FILES["file"]["tmp_name"] , $_FILES['file']['name'], $folder_id);
                            if($success){
                                $drive[]= $_FILES['file']['name'];  
                            }
                            $file[]=$this->upload->data('file_name');    
                        }else{
                            $result['msg_body'] =  $this->upload->display_errors();
                        }                        
                        }
                        if(isset($file)){                         
                        if($new_path==1){
                            $dt['nama_folder']=$_POST['folder_new'];
                            $dt['parent']=$folder['id_folder'];
                            $dt['id_prodi']=$folder['id_prodi'];
                            $dt['permalink']=$folder_new;
                            $dt['path']=$path;
                            $dt['file']=json_encode($file);
                            $dt['id_drive']=$folder_id;
                            $this->db->insert('folder',$dt);
                            $result['redirect_ajax'] = site_url('prodi/folder/'.$folder_new);
                            $result['f']=$folder_new;
                        }else{
                            if($folder['file']!=NULL){
                                $dt['file']=json_decode($folder['file']);
                                $dt['file']=array_merge($dt['file'],$file);
                                $dt['file']=json_encode($dt['file']);
                            }else{
                                $dt['file']=json_encode($file);
                            }
                            $this->db->where('id_folder',$folder['id_folder'])->update('folder',$dt);
                            $result['redirect_ajax'] = site_url('prodi/folder/'.$folder['permalink']);
                            $result['f']=$folder['permalink'];
                        }
                        $result['error'] = false;
                        $result['msg_header'] = 'Success';
                        $result['msg_body'] = "File Uploaded";                       
                        $result['div']='#cont';
                    }
                }else{
                    $result['msg_body'] = "Cek kembali nama folder, kemungkinan nama folder telah ada";
                }
            }
      //  }
        echo json_encode($result);
    }
    
    function folder_delete($fileId){
        $result['error'] = true;
        $result['msg_header'] = 'Gagal';
        $folder=$this->db->where('id_drive',$fileId)->get('folder')->row_array();
        if($folder != NULL){
        $res=$this->M_drive->deleteFile($fileId);
        if($res['success']==1){
             $this->db->where('id_folder',$folder['id_folder'])->delete('folder');
            // $this->deleteDirectory($folder['path']);
            $result['error'] = false;
            $folder=$this->db->where('id_folder',$folder['parent'])->get('folder')->row_array();
            $result['redirect_ajax'] = site_url('prodi/folder');
            $result['f']=' ';
            if($folder != NULL){
                $result['redirect_ajax'] = site_url('prodi/folder/'.$folder['permalink']);
                $result['f']=$folder['permalink'];
            }
            $result['div']='#cont';
            
        }else{
            $result['msg_body'] = "Gagal Terhapus";
        }
        }else{
            $result['msg_body'] = "Folder Tidak Ditemukan";
        } 
        echo json_encode($result);          
    }
    function file_delete($fileId,$id_drive){
        $files=$this->M_drive->get_files_and_folders($id_drive);
        foreach($files as $k =>$val){
           if($val['id']==$fileId){
               $filename=$val['name'];
           }
        }
        $result['error'] = true;
        $result['msg_header'] = 'Gagal';
        $folder=$this->db->where('id_drive',$id_drive)->get('folder')->row_array();
        if($folder != NULL){
        $res=$this->M_drive->deleteFile($fileId);
        if($res['success']==1){
            $fl=json_decode($folder['file']);
            if (($key = @array_search(urldecode($filename),$fl )) !== false) {
                unset($fl[$key]);
            }
            $fl2=null;
            if($fl !=NULL){
                foreach($fl as $v){
                    $fl2[]=$v;
                }
            }
            $this->db->where('id_drive',$id_drive)->update('folder',array('file'=>json_encode($fl2)));
            $result['error'] = false;
            $result['redirect_ajax'] = site_url('prodi/folder');
            $result['f']=' ';
            if($folder != NULL){
                $result['redirect_ajax'] = site_url('prodi/folder/'.$folder['permalink']);
                $result['f']=$folder['permalink'];
            }
            $result['div']='#cont';
            
        }else{
            $result['msg_body'] = "Gagal Terhapus";
        }
        }else{
            $result['msg_body'] = "Folder Tidak Ditemukan";
        } 
        echo json_encode($result);          
    }
    function deleteDirectory($dirname) {
        if (is_dir($dirname))
        $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while($file = readdir($dir_handle)) {
                if ($file != "." && $file != "..") {
                    if (!is_dir($dirname."/".$file))
                        unlink($dirname."/".$file);
                    else
                    $this->deleteDirectory($dirname.'/'.$file);
                }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }
    function get_drive($fileId="1Aj-ylDQOLlUx_zpYsvTTqGx3D7azheR3"){
        $drive=$this->M_drive->get_files_and_folders($fileId);
        if($drive != NULL){
            $no=105;$id=1;
            foreach($drive as $val){
                $split=explode(' ',$val['name']);
                $dt[]=array(
                    'no'=>$no,
                    'id'=>$id,
                    'no_item'=>$split[0],
                    'nama_dokumen'=>$val['name'],
                    'file'=>$val['webViewLink'],
                    'url'=>'',
                    'embed'=>$val['id'],
                    'id_prodi'=>4,
                    'jenis'=>'prodi'
                );
                $no++;$id++;
            }
            echo json_encode($dt);
        }
    }
}