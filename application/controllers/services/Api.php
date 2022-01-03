<?php

require APPPATH . 'controllers/services/Rest.php';
 
class Api extends Rest {
 
     function __construct($config = 'rest') {
        parent::__construct($config);
		$this->cektoken();
        $this->load->model('M_api');
    }
    function rujukan_post(){
        $data['status']=0;
        $data['msg']='nik Not Found';
        $row=$this->M_api->save_rujukan($_POST);
        if($row >0){
            $data['status']=1;
            $data['msg']='data saved';
        }else{
            $data['msg']='data not saved';
        }
        $this->response($data, 200);
    }
    
 }  
?>