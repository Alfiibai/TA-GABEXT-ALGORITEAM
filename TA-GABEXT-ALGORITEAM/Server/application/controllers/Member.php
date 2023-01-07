<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// Panggil Libraries Server
require APPPATH."libraries/Server.php";

class Member extends Server {
    
     //buat konstruktor
     public function __construct()
     {
             parent::__construct();
              //panggil model "Mmember"
             $this->load->model("Mmember","model",TRUE);
     }

	//buat fungsi "GET"
    function service_get()
    {
        //panggil fungsi "get_data"
       $hasil = $this->model->get_data();

        $this->response(array("member" =>$hasil),200);
    }
   
    function service_delete()
    {
        $this->load->model("Mmember","mdl",TRUE);

        $token = $this->delete("no_telp");

        $hasil = $this->mdl->delete_data(base64_encode($token));

        if($hasil == 1)
        {
            $this->response(array("status" => "Data Berhasil Dihapus"), 200);
        }
        else
        {
            $this->response(array("status" => "Data Gagal Dihapus"), 200);
        }
    }
    
       //buat fungsi "POST"
       function service_post()
       {
          
           //ambil parameter token data yang akan diisi
           $data = array(
               "id" => $this->post("id"),
               "nama_member" => $this->post("nama_member"),
               "email" => $this->post("email"),
               "no_telp" => $this->post("no_telp"),
               "token" => base64_encode($this->post("token")),
           );
           // panggil method "save data"
           $hasil = $this->model->post_data($data["id"],
           $data["nama_member"],$data["email"],$data["no_telp"],$data["token"]);
           // jika hasil = 0
           if($hasil == 0 )
           {
               $this->response(array("status" =>"Data Member Berhasil Disimpan"),200);
           }
           // jika hasil != 0
           else
           {
               $this->response(array("status" =>"Data Member  Gagal Disimpan !"),200);
           }
        }

        function service_put()
        {
              
               //ambil parameter token data yang akan diisi
               $data = array(
                   "id" => $this->put("id"),
                   "nama_member" => $this->put("nama_member"),
                   "email" => $this->put("email"),
                   "no_telp" => $this->put("no_telp"),
                   "token" => base64_encode($this->put("token")),
               );
               // panggil method "save data"
               $hasil = $this->model->put_data($data["id"],
               $data["nama_member"],$data["email"],$data["no_telp"],$data["token"]);
               // jika hasil = 0
               if($hasil == 0 )
               {
                   $this->response(array("status" =>"Data Member Berhasil DiUbah"),200);
               }
               // jika hasil != 0
               else
               {
                   $this->response(array("status" =>"Data Member  Gagal DiUbah !"),200);
               }
        }
   
   } 
