<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
    $this->load->model('M_login');
    $this->load->helper(array('Cookie','String'));
  }
  function index(){
    $cookie = get_cookie('harviacode');
    if ($this->session->userdata('email')) {
      redirect('prodi');
    } else if($cookie <> '') {
      $user = $this->M_login->get_by_cookie($cookie)->row_array();
      unset($user['password']);
      $this->session->set_userdata($user);
      redirect('prodi');
    }else {
      $this->load->view('login');
    }
  }
  function login(){
    $result['error'] = TRUE;
    $result['msg_header'] = 'Lengkapi Data';
    $this->form_validation->set_rules('username', '', 'required', array('required' => 'Username Wajib'));
    $this->form_validation->set_rules('password', '', 'required', array('required' => 'Password Wajib'));
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = TRUE;
            $result['msg_body'] = validation_errors();
        } else {
          $user=$this->M_login->cek_login($_POST['username'],md5($_POST['password']));
            if($user != NULL){
                unset($user['password']);
                $this->session->set_userdata($user);
                $key = random_string('sha1');
                set_cookie('harviacode', $key, 3600*24*30); // set expired 30 hari kedepan
                $update_key = array(
                    'cookie' => $key
                );
                //pre($update_key);exit();
                $this->M_login->update($user['id'],$update_key);
                $result['error'] = FALSE;
                $result['msg_header'] = 'Login berhasil';
                $result['msg_body'] = 'mohon menunggu. halaman akan disegarkan'; 
                $result['redirect_url'] = site_url('prodi'); 
            }else{
                $result['msg_body'] = 'Tidak ditemukan username ataupun password yang cocok !';   
            }
          }
        echo json_encode($result);
  }
  function logout(){
    delete_cookie('harviacode');
    $this->session->sess_destroy();
    redirect('login');
  }
  }