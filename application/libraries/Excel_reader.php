<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_reader {
	protected $_ci;
	function __construct(){
		$this->_ci =& get_instance();
		$this->_ci->load->database();
	}
	
	public function read($file_path){
		require_once (dirname(__FILE__)."/Excel/reader.php");
		
		// ExcelFile($filename, $encoding);
		$data = new Spreadsheet_Excel_Reader();
		// Set output Encoding.
		$data->setOutputEncoding('CP1251');
		//$data->read('jxlrwtest.xls');
		
		$data->read("media/excel/$file_path");
		
		if (isset($data->sheets[0])){
			$sheet_0 = $data->sheets[0];
			return $sheet_0;
		}else{
			return false;
		}
	}
    
	public function read_spc($file_path){
		require_once (dirname(__FILE__)."/Excel/reader.php");
		
		// ExcelFile($filename, $encoding);
		$data = new Spreadsheet_Excel_Reader();
		// Set output Encoding.
		$data->setOutputEncoding('CP1251');
		//$data->read('jxlrwtest.xls');
		
		$data->read("media/photo/$file_path");
		
		if (isset($data->sheets[0])){
			$sheet_0 = $data->sheets[0];
			return $sheet_0;
		}else{
			return false;
		}
	}
}
?>