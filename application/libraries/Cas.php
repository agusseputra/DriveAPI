<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function cas_show_config_error(){
    show_error("CAS authentication is not properly configured.<br /><br />
    Please, check your configuration for the following file:
    <code>config/cas.php</code>
    The minimum configuration requires:
    <ul>
       <li><em>cas_server_url</em>: the <strong>URL</strong> of your CAS server</li>
       <li><em>phpcas_path</em>: path to a installation of
           <a href=\"https://wiki.jasig.org/display/CASC/phpCAS\">phpCAS library</a></li>
        <li>and one of <em>cas_disable_server_validation</em> and <em>cas_ca_cert_file</em>.</li>
    </ul>
    ");
}

class Cas {

    public function __construct(){
        if (!function_exists('curl_init')){
            show_error('<strong>ERROR:</strong> You need to install the PHP module <strong>curl</strong>
                to be able to use CAS authentication.');
        }
        $CI =& get_instance();
        $this->CI = $CI;
        $CI->config->load('cas');

        $this->phpcas_path = $CI->config->item('phpcas_path');
        $this->cas_server_url = $CI->config->item('cas_server_url');

        if (empty($this->phpcas_path) 
            or filter_var($this->cas_server_url, FILTER_VALIDATE_URL) === FALSE) {
            cas_show_config_error();
        }
        $cas_lib_file = $this->phpcas_path . '/CAS.php';
        if (!file_exists($cas_lib_file)){
            show_error("Could not find file: <code>" . $cas_lib_file. "</code>");
        }
        require_once $cas_lib_file;

        if ($CI->config->item('cas_debug')) {
            phpCAS::setDebug();
        }

        // init CAS client
        $defaults = array('path' => '', 'port' => 443);
        $cas_url = array_merge($defaults, parse_url($this->cas_server_url));

        phpCAS::client(CAS_VERSION_3_0, $cas_url['host'],
            $cas_url['port'], $cas_url['path'],false);

        // configures SSL behavior
        if ($CI->config->item('cas_disable_server_validation')){
            phpCAS::setNoCasServerValidation();
        } else {
            $ca_cert_file = $CI->config->item('cas_server_ca_cert');
            if (empty($ca_cert_file)) {
                cas_show_config_error();
            }
            phpCAS::setCasServerCACert($ca_cert_file);
        }
    }

    /**
      * Trigger CAS authentication if user is not yet authenticated.
      */
    public function force_auth()
    {
        phpCAS::forceAuthentication();
    }

    /**
     *  Return an object with userlogin and attributes.
     *  Shows aerror if called before authentication.
     */
    public function user()
    {
        if (phpCAS::isAuthenticated()) {
            $userlogin = phpCAS::getUser();
            $attributes = phpCAS::getAttributes();
            //echo "has attributes? ";
            //var_dump(phpCAS::hasAttributes());
            return (object) array('userlogin' => $userlogin,
                'attributes' => $attributes);
        } 
    }

    /**
     *  Logout and redirect to the main site URL,
     *  or to the URL passed as argument
     */
        public function logout2()
    {

        phpCAS::logout();
    }
    public function logout($url = '')
    {
        if (empty($url)) {
            $this->CI->load->helper('url');
            $url = 'http://sso.undiksha.ac.id/logout/';
        }
        phpCAS::logoutWithRedirectService($url);
    }
}