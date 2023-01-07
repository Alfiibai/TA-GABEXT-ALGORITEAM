<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

	public function index()
	{
		$data['tampil'] = json_decode($this->client->simple_get(APIMEMBER));
		
        $this->load->view('vw_member', $data);
	}

}
