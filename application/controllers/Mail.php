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

	function send(){
		$config['mailtype'] = 'html';
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.littlehappytree.com';
		$config['smtp_user'] = 'wayanaditya@littlehappytree.com';
		$config['smtp_pass'] = 'Littletoothfairy24689';
		$config['smtp_port'] = 25;
		$config['newline'] = "\r\n";

		$this->load->library('email', $config);

		$this->email->from('wayanaditya@littlehappytree.com', 'Testing Email');
		$this->email->to('admin@bahasaweb.com');
		$this->email->subject('Testing Email');
		$this->email->message('<html><body><h2>Ini isi email</h2></body></html>');

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
