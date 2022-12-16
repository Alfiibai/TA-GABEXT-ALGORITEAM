<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pperpus extends CI_Model {

	// buat method untuk tampil data
    function get_data()
    {
        //mengambil hanya nik
        //$this->db->select("nik")

        $this->db->select("id_anggota AS id_anggota,
        nama_anggota AS nama_anggota,
        jenis_kelamin AS jenis_kelamin,
        alamat AS alamat,
        no_hp AS no_hp,
        ");

        $this->db->from("anggota");
        $this->db->order_by("id_anggota","ASC");

        $query = $this->db->get()->result();
        return $query;

    }
    
    // buat fungsi untuk simpan data
    function save_data($nik,$nama_pegawai,$jenis_kelamin,$jabatan,$tanggal_masuk,$status,$photo,$token)
    {
       // cek apakah nik ada/tidak
       $this->db->select("id_anggota");
       $this->db->from("anggota");
       $this->db->where("TO_BASE64(id_anggota) = '$token'");
       //eksekusi query
       $query = $this->db->get()->result();
       //jika nik ditemukan
       if(count($query) == 0)
       {
         // isi nilai untuk masing2 field
         $data = array(
            "id_anggota" => $id_anggota,
            "nama_anggota" => $nama_anggota,
            "jenis_kelamin" => $jenis_kelamin,
            "alamat" => $alamat,
            "no_hp" => $no_hp,
         );
         // simpan data
         $this->db->insert("anggota",$data);
         $hasil= 0;

       }
      // jika nik ditemukan
      else
      {
        $hasil = 1;
      }
      return $hasil;
    }


    
    
}