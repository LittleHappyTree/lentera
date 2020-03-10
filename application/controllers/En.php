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
		$data['header'] = 'header-fixed';
		$data['menu'] = $this->get_menu('N','booking');
		if ($value=='process') {
			$bid = ($this->input->post('uid')=='') ? $this->unique() : $this->input->post('uid');
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
				"date_start" => $date_start,
				"date_end" => $date_end,
				"time_start" => $pickuptime,
				"time_end" => $dropofftime,
				"loc_pickup" => $pickup,
				"loc_drop" => $dropoff,
				"order_type" => 'V',
				"order_number" => $bid,
				"date_insert" => $this->get_date('now')
			);
			$detail = array(
				"price_id" => $option,
				"counter"  => '1'
			);
			$arrayid = array(
				"id" => md5($bid)
			);
			$detailarr = array(
				"order_id" => md5($bid)
			);
			if ($this->input->post('uid')=='') {
				$array = array_merge($arrayid,$array);
				$this->models->insert('torder',$array);
				$detail = array_merge($detailarr,$detail);
				$this->models->insert('torder_detail',$detail);
			} else {
				$this->models->update('torder',$array,$arrayid);
				$this->models->update('torder_detail',$detail,$detailarr);
			}
			redirect('en/booking/details/'.md5($bid));
		} elseif ($value=='place') {
			$array = array(
				"email" => $this->input->post('email'),
				"name" => $this->input->post('name'),
				"phone_code" => $this->input->post('phonecode'),
				"phone_number" => $this->input->post('phone'),
				"booking_status" => 'S',
				"citizenship" => $this->input->post('citizen'),
				"notes" => $this->input->post('notes')
			);
			$where = array(
				"id" => $this->input->post('bid')
			);
			$this->models->update('torder',$array,$where);
			if ($this->db->affected_rows() > 0){
				$arraytoken = array(
					"order_id" => $this->input->post('bid'),
					"counter" => 1,
					"token" => $this->token(),
					"date_expire" => $this->get_date('nowone')
				);
				$this->models->insert('torder_link',$arraytoken);
				if ($this->db->affected_rows() > 0){
					$this->send($this->input->post('bid'));
					redirect('en/booking/success');
				} else {
					redirect('en/booking/details/'.$this->input->post('bid'));
				}
			} else {
				redirect('en/booking/details/'.$this->input->post('bid'));
			}
		} elseif ($value=='details') {
			$data['page'] = 'booking/booking-details';
			$data['id'] = $id;
			$sql = "SELECT a.* FROM vorder a WHERE id = ?";
			$data['booking'] = $this->models->openquery($sql,array($id));
			$sql = "SELECT * FROM vinvoice WHERE order_id = ?";
			$data['detail'] = $this->models->openquery($sql,array($id));
			$sql = "SELECT * FROM tcountry ORDER BY id";
			$data['country'] = $this->models->openquery($sql,null);
			$this->load->view('frame',$data);
		} elseif ($value=='success') {
			$data['page'] = 'booking/success';
			$this->load->view('frame',$data);
		} else {
			$sql = "SELECT * FROM vorder WHERE id = ? AND booking_status = '' ";
			$count = $this->models->countrows($sql,array($id));
			$data['count'] = $count;
			$sqlinvoice = "SELECT * FROM vinvoice WHERE order_id = ?";
			$data['id'] = ($count > 0) ? $this->models->getdata($sql,array($id),'order_number') : '';
			$date_start = ($count > 0) ? $this->models->getdata($sql,array($id),'date_start_rev') : '' ;
			$date_end = ($count > 0) ? $this->models->getdata($sql,array($id),'date_end_rev') : '' ;
			$data['date'] = ($count > 0) ? $date_start.' to '.$date_end : '';
			$data['date'] = (!empty($this->input->post('date-book'))) ? $this->input->post('date-book') : $data['date'];
			$data['loc_pickup'] = ($count > 0) ? $this->models->getdata($sql,array($id),'loc_pickup') : '' ;
			$data['loc_drop'] = ($count > 0) ? $this->models->getdata($sql,array($id),'loc_drop') : '' ;
			$data['time_start'] = ($count > 0) ? $this->models->getdata($sql,array($id),'time_start') : '' ;
			$data['time_end'] = ($count > 0) ? $this->models->getdata($sql,array($id),'time_end') : '' ;
			if ($count > 0) {
				$data['sel_vehicle'] = $this->models->getdata($sqlinvoice,array($id),'vehicle_id');
				$data['sel_option'] = $this->models->getdata($sqlinvoice,array($id),'id');
				$sqloption = "SELECT * FROM tprice WHERE vehicle_id = ?";
				$data['option'] = $this->models->openquery($sqloption,array($data['sel_vehicle']));
			} else {
				if (!empty($this->input->post('book-vehicle'))) {
					$data['sel_vehicle'] = $this->input->post('book-vehicle');
					$data['sel_option'] = '';
					$sqloption = "SELECT * FROM tprice WHERE vehicle_id = ?";
					$data['option'] = $this->models->openquery($sqloption,array($data['sel_vehicle']));
				} else {
					$data['sel_vehicle'] = '';
				}
			}
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

	function token(){
		$string     = '';
	    $vowels     = array('q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m','Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M');  
	    $consonants = array(
	       'q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m','Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M'
	    );  
	    srand((double) microtime() * 1000000);
	    $max = 32/2;
	    for ($i = 1; $i <= $max; $i++){
	        $string .= $consonants[rand(0,51)];
	        $string .= $vowels[rand(0,51)];
	    }
	    return $string;
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

	function get_date($type){
		if ($type=='now') {
			$sql = "SELECT now() now_time FROM dual";
			return $this->models->getdata($sql,null,'now_time');
		} elseif ($type=='nowone') {
			$sql = "SELECT date_add(now(), interval 1 hour) now_time FROM dual";
			return $this->models->getdata($sql,null,'now_time');
		}
	}

	function test(){
		echo date('Y-m-d h:i:s');
	}

	function send($id=''){
		$config['mailtype'] = 'html';
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.littlehappytree.com';
		$config['smtp_user'] = 'wayanaditya@littlehappytree.com';
		$config['smtp_pass'] = 'Littletoothfairy24689';
		$config['smtp_port'] = 25;
		$config['newline'] = "\r\n";

		$this->load->library('email', $config);

		$sql = 'SELECT * FROM torder_link WHERE order_id = ?';
		$count = $this->models->countrows($sql,array($id));
		$sql = 'SELECT * FROM vorder WHERE id = ?';
		if ($count > 0) {
			$details 	  = $this->models->openquery($sql,array($id));
			$nama 		  = $this->models->getdata($sql,array($id),'name');
			$order_number = $this->models->getdata($sql,array($id),'order_number');
			$email		  = $this->models->getdata($sql,array($id),'email');

			$sql 		  = 'SELECT * FROM vinvoice WHERE order_id = ?';
			$invoice 	  = $this->models->openquery($sql,array($id));

			$order = '<table width="100%">';
			$ttl_days = 0;

			foreach ($details as $key) {
				$order .=  '<tr>
								<td style="text-align: left; color:#0b1126; font-weight: bold" width="40%">Name <span style="float: right">:</span></td>
								<td style="text-align: left; color:#0b1126" width="60%">'.$key->name.'</td>
							</tr>
							<tr>
								<td style="text-align: left; color:#0b1126; font-weight: bold" width="40%">Email <span style="float: right">:</span></td>
								<td style="text-align: left; color:#0b1126" width="60%">'.$key->email.'</td>
							</tr>
							<tr>
								<td style="text-align: left; color:#0b1126; font-weight: bold" width="40%">Citizenship <span style="float: right">:</span></td>
								<td style="text-align: left; color:#0b1126" width="60%">'.$key->country.'</td>
							</tr>
							<tr>
								<td style="text-align: left; color:#0b1126; font-weight: bold" width="40%">Phone Number <span style="float: right">:</span></td>
								<td style="text-align: left; color:#0b1126" width="60%">'.$key->phone_code.''.$key->phone_number.'</td>
							</tr>
							<tr>
								<td style="text-align: left; color:#0b1126; font-weight: bold" width="40%">Notes <span style="float: right">:</span></td>
								<td style="text-align: left; color:#0b1126" width="60%">'.$key->notes.'</td>
							</tr>
							<tr>
								<td style="text-align: left; color:#0b1126; font-weight: bold" width="40%">Booking Date <span style="float: right">:</span></td>
								<td style="text-align: left; color:#0b1126" width="60%">'.$key->date_start_for.' to '.$key->date_end_for.' for '.$key->days.' days</td>
							</tr>
							<tr>
								<td style="text-align: left; color:#0b1126; font-weight: bold" width="40%">Pickup Location <span style="float: right">:</span></td>
								<td style="text-align: left; color:#0b1126" width="60%">'.$key->loc_pickup.' at '.$key->time_start.'</td>
							</tr>
							<tr>
								<td style="text-align: left; color:#0b1126; font-weight: bold" width="40%">Drop Location <span style="float: right">:</span></td>
								<td style="text-align: left; color:#0b1126" width="60%">'.$key->loc_drop.' at '.$key->time_end.'</td>
							</tr>';
				$ttl_days = $key->days;
			}

			$order_detail = '<tr style="vertical-align: top">
								<td style="text-align: left; color:#0b1126; font-weight: bold" width="40%">Order Description <span style="float: right">:</span></td>
								<td style="text-align: left; color:#0b1126" width="60%">
									<table width="100%">';
			$ttl_price = 0;
			foreach ($invoice as $keys) {
				$silinder = ($keys->kind=="M") ? '- '.$keys->silinder.'cc' : '';
				$order_detail .= 	'<tr>
										<td width="70%" style="line-height: 1">'.$keys->type_name.' '.$keys->vehicle_series.' '.$silinder.'<br> <small><i>'.$keys->price_name.' '.$keys->price_description.'</i></small> </td>
										<td width="30%">'.number_format($keys->price).'</td>
									</tr>';
				$ttl_price = $ttl_price + $keys->price;
			}
			$order_detail .= '<tr style="border-top: solid 1px #0b1126;">
								<td width="70%" style="line-height: 1; text-align: center">Total('.$ttl_days.' days)   </td>
								<td width="30%">'.number_format($ttl_price * $ttl_days).'</td>
							</tr>
						</table>
					</td>
					</tr>';
			
			$order .= $order_detail;
			$order .= '</table>';
	
			$message = '<!DOCTYPE html>
						<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
						<head>
							<meta charset="utf-8">
							<meta name="viewport" content="width=device-width">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="x-apple-disable-message-reformatting"> 
							<title>Booking Confirmation</title>
	
							<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
	
						'.$this->css().'
	
						</head>
	
						<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #222222;">
							<center style="width: 100%; background-color: #f1f1f1;">
							<div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
							  &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
							</div>
							<div style="max-width: 600px; margin: 0 auto;" class="email-container">
							  <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
								  <tr>
								  <td valign="middle" class="bg_white" style="padding: 1em 2.5em;">
									  <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
										  <tr>
											  <td valign="middle" class="logo" style="text-align: center;">
												<img style="height: 50px" src="http://littlehappytree.com/demo/lentera/assets/img/logo-reverse.png" alt="">
											  </td>
										  </tr>
									  </table>
								  </td>
								  </tr>
								  <tr>
								  <td valign="middle my-white" class="hero bg_white" style="background-image: url(http://littlehappytree.com/demo/lentera/assets/img/intro-email-2.jpg); background-size: cover; height: 400px;">
									  <div></div>
									<table style="color: #fff">
										<tr>
											<td>
												<div class="text" style="padding: 0 4em; text-align: center;">
													<h2 style="font-weight: bold">ORDER <span style="color: #f82249;">CONFIRMATION</span></h2>
													<p>Hi <span style="color: #f82249;"><b>'.$nama.'</b></span>, thank you for booking on Lentera Travel. There is one more step to complete your booking, please choose one of two confirm method below.</p>
													<p><a href="#" style="  background: #f82249; border: 0; padding: 6px 22px; color: #fff; transition: 0.4s; border-radius: 50px;" class="btn btn-primary">Confirm by Website</a></p>
													<p>or</p>
													<p><a href="#" style="  background: #f82249; border: 0; padding: 6px 22px; color: #fff; transition: 0.4s; border-radius: 50px;" class="btn btn-primary">Confirm by Whatsapp</a></p>
												</div>
											</td>
										</tr>
									</table>
								  </td>
								  </tr>
								  <tr>
									  <td class="bg_white" style="background: #fff">
										<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
										  <tr>
											<td class="bg_white email-section">
												<div class="heading-section" style="text-align: center; padding: 0 30px;">
												  <h2 style="line-height: 1">
													  <b>BOOKING DETAILS</b><br>
													  <small style="font-weight: 400; font-size: 18px">Order number #'.$order_number.'</small>
												  </h2>
												  '.$order.'
												</div>
												
											</td>
										  </tr>
										</table>
	
									  </td>
									</tr>
									<tr>
										<td style="background: transparent; color: #0b1126; text-align: center; line-height: 1">
											<p>Lentera Bali Travel</p>
											<small>Copyright &copy; 2020 Lenter Bali Jaya Travel. <br> All rights reserved</small>
											<br>
											<br>
											<br>
										</td>
									</tr>
							  </table>
	
							</div>
						  </center>
						</body>
						</html>';
			$this->email->from('wayanaditya@littlehappytree.com', 'Lentera Bali Travel');
			$this->email->to($email);
			$this->email->subject('Booking Confirmation');
			$this->email->message($message);
			$this->email->set_mailtype("html");
	
			if($this->email->send()) {
			   return 'berhasil';
			}
			else {
			   return 'gagal';
			}
		}
		
	}

	function css(){
		return $css = '<style>
						html,
						body {
							margin: 0 auto !important;
							padding: 0 !important;
							height: 100% !important;
							width: 100% !important;
							background: #f1f1f1;
						}

						* {
							-ms-text-size-adjust: 100%;
							-webkit-text-size-adjust: 100%;
						}

						div[style*="margin: 16px 0"] {
							margin: 0 !important;
						}

						table,
						td {
							mso-table-lspace: 0pt !important;
							mso-table-rspace: 0pt !important;
						}

						table {
							border-spacing: 0 !important;
							border-collapse: collapse !important;
							table-layout: fixed !important;
							margin: 0 auto !important;
						}

						img {
							-ms-interpolation-mode:bicubic;
						}

						a {
							text-decoration: none;
						}

						*[x-apple-data-detectors], 
						.unstyle-auto-detected-links *,
						.aBn {
							border-bottom: 0 !important;
							cursor: default !important;
							color: inherit !important;
							text-decoration: none !important;
							font-size: inherit !important;
							font-family: inherit !important;
							font-weight: inherit !important;
							line-height: inherit !important;
						}

						.a6S {
							display: none !important;
							opacity: 0.01 !important;
						}

						.im {
							color: inherit !important;
						}

						img.g-img + div {
							display: none !important;
						}

						@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
							u ~ div .email-container {
								min-width: 320px !important;
							}
						}

						@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
							u ~ div .email-container {
								min-width: 375px !important;
							}
						}

						@media only screen and (min-device-width: 414px) {
							u ~ div .email-container {
								min-width: 414px !important;
							}
						}


						</style>
						<style>

						.primary{
							background: #ea168e;
						}
						.bg_white{
							background: #ffffff;
						}
						.bg_light{
							background: #fafafa;
						}
						.bg_black{
							background: #000000;
						}
						.bg_dark{
							background: rgba(0,0,0,.8);
						}
						.email-section{
							padding:2.5em;
						}

						.btn{
							padding: 5px 15px;
							display: inline-block;
						}
						.btn.btn-primary{

						}
						.btn.btn-white{
							border-radius: 5px;
							background: #ffffff;
							color: #000000;
						}
						.btn.btn-white-outline{
							border-radius: 5px;
							background: transparent;
							border: 1px solid #fff;
							color: #fff;
						}

						h1,h2,h3,h4,h5,h6{
							font-family: "Raleway", sans-serif;
							color: #ffffff;
							margin-top: 0;
							font-weight: 800;
						}

						body{
							font-family: "Raleway", sans-serif;
							font-weight: 500;
							font-size: 16px;
							line-height: 1.8;
							color: rgba(0,0,0,.4);
						}

						a{
							color: #ea168e;
						}

						table{
						}

						.logo h1{
							margin: 0;
							line-height: 1;
						}
						.logo h1 a{
							color: #000000;
							font-size: 20px;
							font-weight: 700;
							text-transform: uppercase;
							font-family: "Raleway", sans-serif;
							padding-top: 0;
						}

						.logo img {
						height: 50px;
						margin-bottom: -10px;
						}

						.hero{
							position: relative;
							z-index: 0;
						}
						.hero .overlay{
							position: absolute;
							top: 0;
							left: 0;
							right: 0;
							bottom: 0;
							content: "";
							width: 100%;
							background: #000000;
							z-index: -1;
						}

						.hero .text{
							color: rgba(255,255,255,.9);
						}
						.hero .text h2{
							color: #fff;
							font-size: 32px;
							margin-bottom: 0;
							font-weight: 500;
						}
						.hero .text h2 span{
							font-weight: 600;
							color: #ea168e;
						}

						.hero .text p {
						font-size: 16px;
						line-height: 1.5;
						}

						ul.social{
							padding: 0;
							margin: 0;
						}
						ul.social li{
							display: inline-block;
							margin-right: 10px;
						}
						ul.social li a{
							border: 1px solid red;
							display: block;
							margin-bottom: 0;
						}

						.heading-section{
						}
						.heading-section h2{
							color: #000000;
							font-size: 28px;
							margin-top: 0;
							line-height: 1.4;
							font-weight: 400;
						}
						.heading-section .subheading{
							margin-bottom: 20px !important;
							display: inline-block;
							font-size: 13px;
							text-transform: uppercase;
							letter-spacing: 2px;
							color: rgba(0,0,0,.4);
							position: relative;
						}
						.heading-section .subheading::after{
							position: absolute;
							left: 0;
							right: 0;
							bottom: -10px;
							content: "";
							width: 100%;
							height: 2px;
							background: #ea168e;
							margin: 0 auto;
						}

						.heading-section-white{
							color: rgba(255,255,255,.8);
						}
						.heading-section-white h2{
							font-family: 
							line-height: 1;
							padding-bottom: 0;
						}
						.heading-section-white h2{
							color: #ffffff;
						}
						.heading-section-white .subheading{
							margin-bottom: 0;
							display: inline-block;
							font-size: 13px;
							text-transform: uppercase;
							letter-spacing: 2px;
							color: rgba(255,255,255,.4);
						}

						.project-entry{
							position: relative;
						}
						.text-project{
							padding-top: 10px;
							position: absolute;
							bottom: 10px;
							left: 0;
							right: 0;
						}
						.text-project h3{
							margin-bottom: 0;
							font-size: 16px;
							font-weight: 600;
						}
						.text-project h3 a{
							color: #fff;
						}
						.text-project span{
							font-size: 13px;
							color: rgba(255,255,255,.8);
						}


						.footer{
							color: rgba(0,0,0,.8);
						}
						.footer a{
							
						}

						.my-white {
							color: #ffffff !important;
						}

						@media (prefers-color-scheme: light) {
							.my-white {
								color: #ffffff !important;
							}
						}

						@media (prefers-color-scheme: dark) {
							.my-white {
								color: #ffffff !important;
							}
						}

						@media screen and (max-width: 500px) {


						}


						</style>';
	}
}
