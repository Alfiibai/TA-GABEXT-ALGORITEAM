<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perpus extends CI_Controller
{

	public function index()
	{
		$data['tampil'] = json_decode($this->client->simple_get(APIPEGAWAI));
		
        $this->load->view('vw_perpus', $data);
	}

}