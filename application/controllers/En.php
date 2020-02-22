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

	function booking($value="",$id=""){
		if ($value=='process') {
			$bid = $this->input->post('uid');
			$date = explode(' to ', $this->input->post('date'));
			$date_start = $this->set_date($date[0]);
			$date_end = $this->set_date($date[1]);
			$vehicle = $this->input->post('vehicle');
			$option = $this->input->post('option');
			$pickup = $this->input->post('pickup');
			$dropoff = $this->input->post('dropoff');
			$pickuptime = ltrim($this->input->post('pickuptime'));
			$dropofftime = ltrim($this->input->post('dropofftime'));
			$array = array(
				"id" => md5($bid),
				"date_start" => $date_start,
				"date_end" => $date_end,
				"time_start" => $pickuptime,
				"time_end" => $dropofftime,
				"loc_pickup" => $pickup,
				"loc_drop" => $dropoff,
				"order_type" => 'V',
				"order_number" => $bid,
				"date_insert" => date('Y-m-d G:i:s')
			);
			$this->models->insert('torder',$array);
			$detail = array(
				"order_id" => md5($bid),
				"price_id" => $option,
				"counter"  => '1'
			);
			$this->models->insert('torder_detail',$detail);
			redirect('en/booking/details/'.md5($id));
		} elseif ($value=='details') {
			$data['header'] = 'header-fixed';
			$data['menu'] = $this->get_menu('N','booking');
			$data['page'] = 'booking/booking-details';
			$sql = "SELECT a.* FROM vorder a WHERE id = ?";
			$data['booking'] = $this->models->openquery($sql,array($id));
			$sql = "SELECT * FROM vinvoice WHERE order_id = ?";
			$data['detail'] = $this->models->openquery($sql,array($id));
			$sql = "SELECT * FROM tcountry ORDER BY id";
			$data['country'] = $this->models->openquery($sql,null);
			$this->load->view('frame',$data);
		} else {
			$sql = "SELECT * FROM vorder WHERE id = ?";
			$count = $this->models->countrows($sql,array($id));
			$data['id'] = ($count>0) ? $id : '';
			$data['header'] = 'header-fixed';
			$data['menu'] = $this->get_menu('N','booking');
			$data['page'] = 'booking/booking';
			$sql = "SELECT * FROM vvehicle_start_price";
			$data['vehicle'] = $this->models->openquery($sql,null);
			$this->load->view('frame',$data);
		}
	}

	function set_date($date=''){
		if ($date!='') {
			$date = DateTime::createFromFormat('d/m/Y',$date);
			return $date->format('Y-m-d');
		}
	}

	function unique(){
		$today = date("ymd");
		$string     = '';
	    $vowels     = array(1,2,7,5,3,8,4,9,6,0);  
	    $consonants = array(
	        3,4,6,8,9,0,1,5,2,7
	    );  
	    srand((double) microtime() * 1000000);
	    $max = 4/2;
	    for ($i = 1; $i <= $max; $i++){
	        $string .= $consonants[rand(0,9)];
	        $string .= $vowels[rand(0,9)];
	    }
	    $sql = "SELECT lpad(count(*) + 1,4,0) num FROM torder a WHERE date(a.date_insert) = ?";
	    $num = $this->models->getdata($sql,array($this->set_date(date('d/m/Y'))),'num');
	    return $today.$num.$string;
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
