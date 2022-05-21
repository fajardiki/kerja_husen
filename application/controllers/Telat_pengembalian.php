<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Telat_pengembalian extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $query = $this->db->query("
      SELECT 
        a.id_transaksi,
        a.tanggal_pinjam,
        a.tanggal_kembali,
        a.tanggal_diingatkan,
        poli.nama,
        poli.unit,
        poli.email, 
        (
          CASE
            WHEN DATEDIFF(a.tanggal_diingatkan, CURRENT_DATE) >= -2
            THEN 1
            ELSE 0
          END) AS is_telat 
      FROM
        transaksi a 
        JOIN poli 
          ON poli.id_unit = a.id_unit 
        LEFT JOIN pengembalian b 
          ON b.id_transaksi = a.id_transaksi 
      WHERE 1 
        AND b.id_transaksi IS NULL 
        AND a.tanggal_kembali < CURRENT_DATE
        AND poli.email IS NOT NULL 
    ");
    $data['data'] = $query->result_array();
    $data['title'] = "Telat Pengembalian";

    $this->template->load('layoutbackend', 'telat_pengembalian/telat_pengelbalian_data', $data);
  }  

  public function ingatkan()
  {
    $config = $this->load->config('email');
    $this->load->library('email');

    $query = $this->db->query("
      SELECT 
        a.id_transaksi,
        a.tanggal_pinjam,
        a.tanggal_kembali,
        a.tanggal_diingatkan,
        a.id_unit, 
        poli.nama,
        poli.unit,
        poli.email, 
        (
          CASE
            WHEN DATEDIFF(a.tanggal_diingatkan, CURRENT_DATE) >= -2
            THEN 1
            ELSE 0
          END) AS is_ingatkan 
      FROM
        transaksi a 
        JOIN poli 
          ON poli.id_unit = a.id_unit 
        LEFT JOIN pengembalian b 
          ON b.id_transaksi = a.id_transaksi 
      WHERE 1 
        AND b.id_transaksi IS NULL 
        AND a.tanggal_kembali < CURRENT_DATE 
        AND poli.email IS NOT NULL 
      HAVING is_ingatkan = 0
      LIMIT 1
    ");
    $data = $query->row_array();
    
    $update = false;
    if (!empty($data)) {
      $from = $this->config->item('smtp_user');
      $message = $this->load->view('telat_pengembalian/sendmail_template.php', $data, true);      

      $this->email->set_newline("\r\n");
      $this->email->from($from);
      // $this->email->to('fajarsiddiqi@gmail.com');
      $this->email->to($data['email']);
      $this->email->subject('Sistem Informasi Filing');
      $this->email->message($message);
      $send = $this->email->send();

      if ($send) {
        $this->db->set('tanggal_diingatkan', date('Y-m-d'));
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $update = $this->db->update('transaksi');
      }
    }

    echo json_encode($update);
  }

  public function ingatkan_01($id_transaksi)
  {
    $this->load->config('email');
    $this->load->library('email');

    // $this->db->set('tanggal_diingatkan', date('Y-m-d'));
    // $this->db->where('id_transaksi', $id_transaksi);
    // $update = $this->db->update('transaksi');

    // if ($update) {
      // get data to show send email
      $this->db->select('*');
      $this->db->from('transaksi');
      $this->db->join('poli', 'poli.id_unit = transaksi.id_unit');
      $this->db->where('transaksi.id_transaksi', $id_transaksi);
      $data = $this->db->get()->row_array();

      $from = $this->config->item('smtp_user');
      $message = $this->load->view('telat_pengembalian/sendmail_template.php', $data, true);

      $this->email->set_newline("\r\n");
      $this->email->from($from);
      // $this->email->to('fajarsiddiqi@gmail.com');
      $this->email->to($data['email']);
      $this->email->subject('Sistem Informasi Filing');
      $this->email->message($message);
      $send = $this->email->send();

      if ($send) {
        $this->db->set('tanggal_diingatkan', date('Y-m-d'));
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');

        redirect('telat_pengembalian/index');
      }

      // var_dump($data);

    // }
  }
}

?>