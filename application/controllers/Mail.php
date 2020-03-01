<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

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
	public function index()
	{
		redirect('en','refresh');
	}

	function success(){
		echo 'confirmed';
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

		$message = '<!DOCTYPE html>
					<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
					<head>
					    <meta charset="utf-8">
					    <meta name="viewport" content="width=device-width">
					    <meta http-equiv="X-UA-Compatible" content="IE=edge">
					    <meta name="x-apple-disable-message-reformatting"> 
					    <title>Booking Confirmation</title>

					    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

					<style>
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
						color: #000000;
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
						color: #fff;
					}

					@media (prefers-color-scheme: dark) {
						.my-white {
							color: #fff;
						}
					}

					@media screen and (max-width: 500px) {


					}


					</style>


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
					          <td valign="middle" class="hero bg_white" style="background-image: url(http://littlehappytree.com/demo/lentera/assets/img/intro-email-2.jpg); background-size: cover; height: 400px;">
					          	<div class="overlay" style="background-color: #060c22; opacity: 0.8;"></div>
					            <table>
					            	<tr>
					            		<td>
					            			<div class="text" style="padding: 0 4em; text-align: center; color:#fff !important;">
					            				<h2 style="font-weight: bold">ORDER <span style="color: #f82249;">CONFIRMATION</span></h2>
					            				<p>Hi <span style="color: #f82249;"><b>Ruben Kowalski</b></span>, thank you for booking on Lentera Travel. There is one more step to complete your booking, please choose one of two confirm method below.</p>
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
							              		<small style="font-weight: 400; font-size: 18px">Order number #00000000</small>
							              	</h2>
							              	<table width="100%">
							              		<tr>
							              			<td style="text-align: left; color:#0b1126; font-weight: bold" width="40%">Booking Date <span style="float: right">:</span></td>
							              			<td style="text-align: left; color:#0b1126" width="60%">Booking Date</td>
							              		</tr>
							              		<tr>
							              			<td style="text-align: left; color:#0b1126; font-weight: bold" width="40%">Booking Date <span style="float: right">:</span></td>
							              			<td style="text-align: left; color:#0b1126" width="60%">Booking Date</td>
							              		</tr>

							              		<tr style="vertical-align: top">
							              			<td style="text-align: left; color:#0b1126; font-weight: bold" width="40%">Order Description <span style="float: right">:</span></td>
							              			<td style="text-align: left; color:#0b1126" width="60%">
							              				<table width="100%">
							              					<tr>
							              						<td width="70%" style="line-height: 1">Daihatsu Ayla <br> <small><i>MT Self Drive</i></small> </td>
							              						<td width="30%">200.000</td>
							              					</tr>
							              					<tr style="border-top: solid 1px #0b1126;">
							              						<td width="70%" style="line-height: 1; text-align: center">Total   </td>
							              						<td width="30%">200.000</td>
							              					</tr>
							              				</table>
							              			</td>
							              		</tr>
							              	</table>
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
					</html>
    ';
		$this->email->from('wayanaditya@littlehappytree.com', 'Testing Email');
		$this->email->to(array('wayanaditya27@yahoo.com','wayanaditya27@gmail.com'));
		$this->email->subject('Testing Email');
		$this->email->message($message);
		$this->email->set_mailtype("html");

		if($this->email->send()) {
		   echo 'Email berhasil dikirim';
		}
		else {
		   echo 'Email tidak berhasil dikirim';
		   echo '<br />';
		   echo $this->email->print_debugger();
		}
	}
}
