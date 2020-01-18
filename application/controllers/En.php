<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class En extends CI_Controller {

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
		$data['header'] = '';
		$data['page'] = 'home';
		$this->load->view('frame',$data);
	}

	function fleet($detail='',$type='',$id=''){
		$data['header'] = 'header-fixed';
		$data['type'] = ucfirst($type);
		if ($detail=='detail') {
			$data['page'] = 'fleet/fleet-detail';
		} else {
			$data['page'] = 'fleet/fleet';
		}
		$this->load->view('frame',$data);
	}
}
