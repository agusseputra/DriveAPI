<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Oauth2callback extends CI_Controller{
	function __construct(){
        parent::__construct();
        
    }
    function index(){
        echo 'suksess';
    }
}