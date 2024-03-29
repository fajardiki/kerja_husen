<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_peminjaman extends CI_Model 
{

    private $table = "transaksi";
    private $tmp   = "tmp";
    private $poli   = "poli";
    
    function AutoNumbering()
    {
        $today = date('Ymd');

        $data = $this->db->query("SELECT MAX(id_transaksi) AS last FROM $this->table ")->row_array();

        $lastNoFaktur = $data['last'];
        
        $lastNoUrut   = substr($lastNoFaktur,8,3);
        
        $nextNoUrut   = $lastNoUrut+1;
        
        $nextNoTransaksi = $today.sprintf('%03s',$nextNoUrut);
        
        return $nextNoTransaksi;
    }

    function getTmp()
    {
        return $this->db->get("tmp");
    }
    
    function cekTmp($kode)
    {
        $this->db->where("norm",$kode);
        return $this->db->get("tmp");
    }

    function InsertTmp($data)
    {
        //$this->db->insert("transaksi",$info);
        $this->db->insert($this->tmp, $data);    
    }

    function InsertTransaksi($data)
    {
        $this->db->insert($this->table, $data);
    }

    function jumlahTmp()
    {
        return $this->db->count_all("tmp");
    }


    public function UpdateStatus($norm, $status)
    {
        $this->db->where("norm", $norm);
        $this->db->update("berkas", $status);
        
    }

    function deleteTmp($norm)
    {
        $this->db->where("norm",$norm);
        $this->db->delete($this->tmp);
    }

    function getTransaksi()
    {
        return $this->db->get($this->table);
    }

    function getStruk($id_peminjaman) {
      $this->db->select('transaksi.id_transaksi, transaksi.norm, berkas.nama, poli.unit, transaksi.tanggal_pinjam');
      $this->db->join("berkas", "berkas.norm = transaksi.norm");
      $this->db->join("poli", "poli.id_unit = transaksi.id_unit");
      $this->db->where("id_transaksi", $id_peminjaman);
      return $this->db->get($this->table);
    }

}

/* End of file Mod_peminjaman.php */
