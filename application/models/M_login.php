<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    
    function cek_login($user,$psw){
      $this->db->where('email',$user)->where('password',$psw);
      return $this->db->get('users')->row_array();
    }
    public function get_by_cookie($cookie)
    {
        $this->db->where('cookie', $cookie);
        return $this->db->get('users');
    }
    public function update($id_user,$data)
    {
        $this->db->where('id', $id_user);
        $this->db->update('users', $data);
    } 
    }
    ?>