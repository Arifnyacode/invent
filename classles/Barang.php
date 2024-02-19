<?php
include_once 'lib/Database.php';

class Barang{
    public $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function addBarang($data, $file){
        $nama = $data['nama_barang'];
        $kategori = $data['kategori'];
        $jml = $data['jumlah_barang'];
        $kondisi = $data['kondisi_barang'];
        $deskripsi = $data['deskripsi_barang'];
        $iduser = $data['id_user'];

        $permited = array('jpg','jpeg','png','gif');
        $file_name = $file['foto_barang']['name'];
        $file_size = $file['foto_barang']['size'];
        $file_temp = $file['foto_barang']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $uniqe_img = substr(md5(time()),0,10).'.'.$file_ext;
        $upload_img = "upload/".$uniqe_img;

        if (empty($nama)||empty($jml)||empty($kondisi)||empty($deskripsi)||empty($file_name)) {
            $msg = "Fill Must Not Be Empty!";
            return $msg;
        }elseif ($file_size>1048567) {
            $msg = "Size Must be size less than 1 MB";
            return $msg;
        }elseif (in_array($file_ext,$permited)==false) {
            $msg = "You can upload only!".implode(', ',$permited);
            return $msg;
        }else {
            move_uploaded_file($file_temp,$upload_img);
            $query = "INSERT INTO tbl_barang values ('$nama','$jml','$kondisi','$upload_img','$deskripsi','$iduser','$kategori')";

            $result = $this->db->insert($query);

            if ($result) {
                $msg = "Sukses ditambahkan!";
                return $msg;
            }else {
                $msg = "Gagal menambahkan";
                return $msg;
            }
        }
    }
}

?>