<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['cas_server_url'] = 'https://sso.undiksha.ac.id/cas';
$config['phpcas_path'] = '/home/mahasiswa/public_html/CAS/CAS';
//$config['phpcas_path'] = 'D:\xampp\htdocs\adminpdd\CAS\CAS';
$config['cas_disable_server_validation'] = TRUE;
//$config['cas_server_ca_cert'] = '/home/pdd/public_html/adminpdd/crt/sso.crt';
$config['cas_debug'] = TRUE; // <--  use this to enable phpCAS debug mode
?>