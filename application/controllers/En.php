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
		$data['menu'] = $this->get_menu('Y','home');
		for ($i = 0; $i < 2; $i++) {
			$sql = "SELECT * FROM vvehicle_start_price WHERE kind = ? LIMIT 3";
			if ($i==0) {
				$data['motor'] = $this->models->openquery($sql,array('M'));
			} else {
				$data['mobil'] = $this->models->openquery($sql,array('C'));	
			}
		}
		$data['page'] = 'home';
		$this->load->view('frame',$data);
	}

	function fleet($detail='',$type='',$id=''){
		$data['header'] = 'header-fixed';
		$data['menu'] = $this->get_menu('N','catalog');
		$data['type'] = ($type=='M') ? 'Motorcycle' : 'Car';
		if ($detail=='detail') {
			$sql = "SELECT * FROM vvehicle_start_price WHERE id = ?";
			$data['load'] = $this->models->openquery($sql,array($id));
			$sql = "SELECT * FROM tprice WHERE addon_price_id = ? AND vehicle_id = ?";
			$data['loadmaster'] = $this->models->openquery($sql,array(0,$id));
			$data['countmaster'] = $this->models->countrows($sql,array(0,$id));
			$sql = "SELECT DISTINCT vehicle_id, price_name, price, duration FROM tprice WHERE addon_price_id != ? AND vehicle_id = ?";
			$data['loaddetail'] = $this->models->openquery($sql,array(0,$id));
			$data['countdetail'] = $this->models->countrows($sql,array(0,$id));
			$data['page'] = 'fleet/fleet-detail';
		} else {
			$sql = "SELECT * FROM vvehicle_start_price WHERE kind = ? ";
			$data['title'] = $detail;
			if ($detail=='motorcycle') {
				$data['vehicle'] = $this->models->openquery($sql,array('M'));
			} elseif ($detail=='car') {
				$data['vehicle'] = $this->models->openquery($sql,array('C'));
			} else {
				$sql = "SELECT * FROM vvehicle_start_price ";
				$data['vehicle'] = $this->models->openquery($sql,array(null));	
			}
			$data['page'] = 'fleet/fleet';
		}
		$this->load->view('frame',$data);
	}

	function get_menu($ishome='',$active=''){
		$menu = array(
			array(
				"menu"   => "Home",
				"url"    => ($ishome=='Y') ? '#intro' : base_url(),
				"active" => ($active=='home') ? 'menu-active' : ''
			),
			array(
				"menu"   => "Catalog",
				"url"    => ($ishome=='Y') ? '#speakers' : base_url().'en/fleet',
				"active" => ($active=='catalog') ? 'menu-active' : ''
			),
			array(
				"menu"   => "FAQ",
				"url"    => ($ishome=='Y') ? '#' : base_url().'en/faq',
				"active" => ($active=='faq') ? 'menu-active' : ''
			),
			array(
				"menu"   => "Terms & Conditions",
				"url"    => ($ishome=='Y') ? '#' : base_url().'en/terms',
				"active" => ($active=='terms') ? 'menu-active' : ''
			),
			array(
				"menu"   => "Contact",
				"url"    => ($ishome=='Y') ? '#venue' : base_url().'en/contact',
				"active" => ($active=='contact') ? 'menu-active' : ''
			)
		);
		return $menu;
	}
}
