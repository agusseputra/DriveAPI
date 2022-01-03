<?php
require APPPATH . '../vendor/autoload.php'; 
require APPPATH . '/libraries/REST_Controller.php';
use \Firebase\JWT\JWT;
class Rest extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('M_api');
    }
		private $secretkey = 'sulaimanmarule'; 
		private $auth_username = 'pdm';
		private $auth_password = 'pdm_pass';

       // method untuk melihat token pada user
        public function token_post(){
            
            $date = new DateTime();
            $username = $this->post('user_api',TRUE); 
            $pass = $this->post('pass_api',TRUE);
			$email = $this->post('email_user',TRUE);
			
			if($username==$this->auth_username AND $pass==$this->auth_password ){
				$user = $this->M_api->get_user($email);
                if ($user){
					if (password_verify($this->post('email_user'),password_hash($user->email, PASSWORD_DEFAULT))) {
						$payload['email'] = $user->email;
						$payload['iat'] = $date->getTimestamp(); //waktu di buat
						$payload['exp'] = $date->getTimestamp() + 3600; //satu jam
						$output['token'] = JWT::encode($payload,$this->secretkey);
						return $this->response($output,REST_Controller::HTTP_OK);
					}else{
						$this->viewtokenfail_email($email);
					}
				}else{
					$this->viewtokenfail_email($email);
				}
				
			}else{
				$this->viewtokenfail_user();
			}
        }
        // method untuk jika generate token diatas salah
        public function viewtokenfail_user($email){
            $this->response([
              'status'=>'0',
              'message'=>'Invalid Username Or Password'
              ],REST_Controller::HTTP_BAD_REQUEST);
        }
		
        public function viewtokenfail_email($email){
            $this->response([
              'status'=>'0',
              'email'=>$email,
              'message'=>'Invalid User Email'
              ],REST_Controller::HTTP_BAD_REQUEST);
        }

        // method untuk mengecek token setiap melakukan post, put, etc
        public function cektoken(){
            $jwt = $this->input->get_request_header('Authorization');
            try {
                $decode = JWT::decode($jwt,$this->secretkey,array('HS256'));
                if ($this->M_api->is_valid_email($decode->email)>0) {
                    return true;
                }
            } catch (Exception $e) {
                exit(json_encode(array('status' => '0' ,'message' => 'Invalid Token',)));
            }
        }

    
 }  
?>