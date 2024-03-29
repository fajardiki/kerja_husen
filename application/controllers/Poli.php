<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_poli');
    }


    public function index()
    {
        $data['poli']      = $this->Mod_poli->getAll();
        // print_r($data['countpoli']); die();

        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $this->template->load('layoutbackend', 'poli/poli_data', $data); 
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
            $this->template->load('layoutbackend', 'poli/poli_data', $data);
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
            $this->template->load('layoutbackend', 'poli/poli_data', $data);
        }
        else{
            $data['message'] = "";
            $this->template->load('layoutbackend', 'poli/poli_data', $data);
        }
        
    }

    public function create()
    {
        $this->template->load('layoutbackend', 'poli/poli_create');
    }

    public function insert()
    {
        if(isset($_POST['save'])) {
            
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // echo "masuk"; die();
                $id_unit = $this->input->post('id_unit');
                $cek = $this->Mod_poli->cekPoli($id_unit);
                //cek id_unit yg sudah digunakan
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>ID Unit</strong> Sudah Digunakan...!</p></div>"; 
                    $this->template->load('layoutbackend', 'poli/poli_create', $data); 
                }
                else{
                    $nama = slug($this->input->post('nama'));
                    $config['upload_path']   = './assets/img/poli/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png'; //mencegah upload backdor
                    $config['max_size']	     = '1000';
                    $config['max_width']     = '2000';
                    $config['max_height']    = '1024';
                    $config['file_name']     = $nama; 
                            
                    $this->upload->initialize($config);

                     //apabila ada gambar yg diupload
                    //if ($this->upload->do_upload('userfile')){
                        
                        $image = $this->upload->data();

                        $save  = array(
                            'id_unit'   => $this->input->post('id_unit'),
                            'nama'  => $this->input->post('nama'),
                            'unit'    => $this->input->post('unit'), 
                            'email' => $this->input->post('email')
                            
                            
                            
                        );
                        $this->Mod_poli->insertPoli("poli", $save);
                        // echo "berhasil"; die();
                        redirect('poli/index/create-success');

                    //}
                    //apabila tidak ada gambar yg diupload
                    //else{
                      //  $data['message'] = "<div class='alert alert-block alert-danger'>
                        //<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        //<p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                        //$this->template->load('layoutbackend', 'poli/poli_create', $data);
                    //} 
                }
            }
            //jika tidak mengkosongkan
            else{
                $data['message'] = "";
                $this->template->load('layoutbackend', 'poli/poli_create', $data);
            }
        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $data['edit']    = $this->Mod_poli->cekPoli($id)->row_array();
        // $data['poli'] =  $this->Mod_poli->getAll()->result_array();
        // print_r($data['edit']); die();
        $this->template->load('layoutbackend', 'poli/poli_edit', $data);
    }

    public function update()
    {
        if(isset($_POST['update'])) {

            //apabila ada gambar yg diupload
            if(!empty($_FILES['userfile']['name'])) {
                

                $this->_set_rules();

                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    // echo "masuk"; die();
                    
                    $id_unit = $this->input->post('id_unit');
                    
                    $nama = slug($this->input->post('nama'));
                    $config['upload_path']   = './assets/img/poli/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	     = '1000';
                    $config['max_width']     = '2000';
                    $config['max_height']    = '1024';
                    $config['file_name']     = $nama; 
                            
                    $this->upload->initialize($config);

                        //apabila ada gambar yg diupload
                    //if ($this->upload->do_upload('userfile')){
                        
                      //  $image = $this->upload->data();

                        $save  = array(
                            'id_unit'   => $this->input->post('id_unit'),
                            'nama'  => $this->input->post('nama'),
                            'unit'    => $this->input->post('unit'), 
                            'email' => $this->input->post('email')
                        );

                        //$g = $this->Mod_poli->getGambar($id_unit)->row_array();
                        
                        //hapus gambar yg ada diserver
                        //unlink('assets/img/poli/'.$g['image']);

                        $this->Mod_poli->updatePoli($id_unit, $save);
                        // echo "berhasil"; die();
                        redirect('poli/index/update-success');

                    //}
                    //apabila tidak ada gambar yg diupload
                    //else{
                        $data['message'] = "<div class='alert alert-block alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                        $this->template->load('layoutbackend', 'poli/poli_create', $data);
                    //} 
                        
                    
                }
                //jika tidak mengkosongkan
                else{
                    $id_unit = $this->input->post('id_unit');
                    $data['edit']    = $this->Mod_poli->cekPoli($id_unit)->row_array();
                    $data['message']="";
                    $this->template->load('layoutbackend', 'poli/poli_edit', $data);
                }

            }else{
              
                $this->_set_rules();
                
                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    // echo "masuk"; die();
                    
                    $id_unit = $this->input->post('id_unit');
                    $save  = array(
                        'id_unit'   => $this->input->post('id_unit'),
                        'nama'  => $this->input->post('nama'),
                        'unit'    => $this->input->post('unit'),
                        'email' => $this->input->post('email')
                        
                    );
                    $this->Mod_poli->updatePoli($id_unit, $save);
                    // echo "berhasil"; die();
                    // var_dump();
                    // return false;
                    redirect('poli/index/update-success');

                }
                //jika tidak mengkosongkan
                else{
                    $id_unit = $this->input->post('id_unit');
                    $data['edit']    = $this->Mod_poli->cekPoli($id_unit)->row_array();
                    $data['message']="";
                    $this->template->load('layoutbackend', 'poli/poli_edit', $data);
                }

            }    

        } //end post update

    }//end function update

    public function delete()
    {
        // $id_unit  = $this->uri->segment(3);

        $id_unit = $this->input->post('kode');

       

        // $g = $this->Mod_poli->getGambar($id_unit)->row_array();
        
        //hapus gambar yg ada diserver
       // unlink('assets/img/poli/'.$g['image']);

        $this->Mod_poli->deletePoli($id_unit, 'poli');
        // echo "berhasil"; die();
        redirect('poli/index/delete-success');
        
    }

    //function global buat validasi input
    public function _set_rules()
    {
        $this->form_validation->set_rules('nama','Nama','required|max_length[100]');
        $this->form_validation->set_rules('unit','Unit','required|max_length[50]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }



}

/* End of file Poli.php */
 