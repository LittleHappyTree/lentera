<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function index(){
		redirect('en','refresh');
	}

	function get_option(){
		$id = $this->input->post('id');
		$sql = "SELECT * FROM tprice WHERE vehicle_id = ?";
		$data = $this->models->openquery($sql,array($id));
		echo json_encode($data);
	}

	function get_phcode(){
		$id = $this->input->post('id');
		$sql = "SELECT phonecode FROM tcountry WHERE iso = ?";
		$data = $this->models->getdata($sql,array($id),'phonecode');
		echo json_encode($data);
	}
}
