<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pperpus extends CI_Model {

	// buat method untuk tampil data
    function get_data()
    {

        $this->db->select("id AS id,
        nama_member AS nama_mbr,
        email AS email,
        no_telp AS no_telp,
        ");

        $this->db->from("member");
        $this->db->order_by("id","ASC");

        $query = $this->db->get()->result();
        return $query;

    }
    
    // buat fungsi untuk simpan data
    function save_data($id,$nama_member,$email,$no_telp,$token)
    {
       
       $this->db->select("id");
       $this->db->from("member");
       $this->db->where("TO_BASE64(id) = '$token'");
       //eksekusi query
       $query = $this->db->get()->result();
       
       if(count($query) == 0)
       {
         // isi nilai untuk masing2 field
         $data = array(
            "id" => $id,
            "nama_member" => $nama_member,
            "email" => $email,
            "no_telp" => $no_telp,
         );
         // simpan data
         $this->db->insert("member",$data);
         $hasil= 0;

       }

      else
      {
        $hasil = 1;
      }
      return $hasil;
    }


    
    
}