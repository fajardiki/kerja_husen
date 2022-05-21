<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_poli');
    }

    function index()
    {
        $data['countpoli'] = $this->Mod_poli->totalRows('poli');
        $data['countpetugas'] = $this->Mod_poli->totalRows('petugas');
        $data['countpeminjaman'] = $this->Mod_poli->totalRows('transaksi');
        $this->template->load('layoutbackend', 'dashboard/dashboard_data', $data);
    }

    public function chart_data()
    {
      $data = $this->db->query("
        SELECT 
          a.*,
          DATE_FORMAT(a.tanggal_pinjam, '%M') AS label,
          b.unit AS poli,
          COUNT(a.id_transaksi) AS jumlah 
        FROM
          transaksi a 
          JOIN poli b 
            ON b.id_unit = a.id_unit 
        WHERE 1 
          AND YEAR(a.tanggal_pinjam) = YEAR(CURRENT_DATE) 
        GROUP BY DATE_FORMAT(a.tanggal_pinjam, '%Y-%m'),
          a.id_unit
      ")->result_array();
      
      $data_per_poli = [];
      foreach ($data as $key => $value) {
        $data_per_poli[$value['poli']][] = $value;
      }

      // return $data_per_poli;
      echo json_encode($data_per_poli);
    }
        
    


}
/* End of file Controllername.php */
 