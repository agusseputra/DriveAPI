<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Template{
   private $_ci;
   function __construct(){
      $this->_ci = & get_instance();
   }   
    function mahasiswa($view,$data=NULL){
       $data["content"] =$view;
       $data["menu"] ="back/menu_mahasiswa";
       $data["topmenu"] ="back/top_menu";
       $this->_ci->load->view("back/template", $data);
    }
   function kemahasiswaan($view,$data=NULL){
       $data["content"] =$view;
       $data["menu"] ="back/kemahasiswaan/menu_kemahasiswaan";
       $data["topmenu"] ="back/kemahasiswaan/top_menu";
       $this->_ci->load->view("back/template", $data);
    }
    function lembaga($view,$data=NULL){
       $data["content"] =$view;
       $data["menu"] ="back/lembaga/menu";
       $data["topmenu"] ="back/lembaga/top_menu";
       $this->_ci->load->view("back/template", $data);
    }
}
?>
