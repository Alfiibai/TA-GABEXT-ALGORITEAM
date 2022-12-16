<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class Perpus extends Server {

    //buat konstruktor
    public function __construct()
        {
                parent::__construct();
                 //panggil model "Ppegawai"
                $this->load->model("Pperpus","model",TRUE);
        }

	//buat fungsi "GET"
    function service_get()
    {
        //panggil fungsi "get_data"
       $hasil = $this->model->get_data();

        $this->response(array("perpus" =>
        $hasil),200);
    }
   
       //buat fungsi "POST"
       function service_post()
       {
          
           //ambil parameter token data yang akan diisi
           $data = array(
               "id_anggota" => $this->post("id_anggota"),
               "nama_anggota" => $this->post("nama_anggota"),
               "jenis_kelamin" => $this->post("jenis_kelamin"),
               "alamat" => $this->post("alamat"),
               "no_hp" => $this->post("no_hp"),
               "token" => base64_encode($this->post("token")),
           );
           // panggil method "save data"
           $hasil = $this->model->save_data($data["id_anggota"],
           $data["nama_anggota"],$data["jenis_kelamin"],$data["alamat"],$data["np_hp"],$data["token"]);
           // jika hasil = 0
           if($hasil == 0 )
           {
               $this->response(array("status" =>"Data Pegawai Berhasil Disimpan"),200);
           }
           // jika hasil != 0
           else
           {
               $this->response(array("status" =>"Data Pegawai  Gagal Disimpan !"),200);
           }
   
   
   
   }
}