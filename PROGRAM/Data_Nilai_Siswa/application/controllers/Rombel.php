<?php

Class Rombel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_rombel');
    }

    function data() {
        // nama tabel
        $table = 'tb_m_rombel';
        // nama PK
        $primaryKey = 'ID_Rombel';
        // list field
        $columns = array(
            array('db' => 'ID_Rombel', 'dt' => 'ID_Rombel'),
            array('db' => 'Nama_Rombel', 'dt' => 'Nama_Rombel'),
            array('db' => 'ID_Kelas', 'dt' => 'ID_Kelas'),
            array(
                'db' => 'ID_Rombel',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('rombel/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('rombel/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
                }
            )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }

    function index() {
   // $data['model'] = $this->Model_rombel->view(); 
    
   // $this->load->view('rombel/list', $data);
        $data['dataRombel'] = $this->Model_rombel->dataTable();
        $this->template->load('template','rombel/list',$data);
    }

	 public function lists(){
        $data['dataRombel'] = $this->Model_rombel->dataTable();
    $data['model'] = $this->Model_rombel->view(); 
    
    $this->load->view('list', $data);
  }
	
    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_rombel->save();
            redirect('rombel');
        } else {
            $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah";
            $data['info']= $this->db->query($infoSekolah)->row_array();
            $this->template->load('template', 'rombel/add',$data);
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_rombel->update();
            $this->session->set_flashdata('success','Data Rombel telah berhasil diubah.');
            redirect('rombel');
        }else{
            $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah";
            $data['info']= $this->db->query($infoSekolah)->row_array();
            $ID_Rombel      = $this->uri->segment(3);
            $data['ID_Rombel'] = $this->db->get_where('tb_m_rombel',array('ID_Rombel'=>$ID_Rombel))->row_array();
            $this->template->load('template', 'rombel/edit',$data);
        }
    }
    
    function delete(){
        $ID_Rombel = $this->uri->segment(3);
        if(!empty($ID_Rombel)){
            // proses delete data
            $this->db->where('ID_Rombel',$ID_Rombel);
            $this->db->delete('tb_m_rombel');
        }
        redirect('rombel');
    }
    
    function show_combobox_rombel_by_kelas(){
        
        $ID_Kelas = $_GET['ID_Kelas'];
        echo "<select name='rombel' id='rombel2' class='form-control' onchange='loadSiswa()'>";
        $this->db->where('ID_Kelas',$ID_Kelas);
        $rombel = $this->db->get('tb_m_rombel');
        foreach ($rombel->result() as $row){
            echo "<option value='$row->ID_Rombel'>$row->Nama_Rombel</option>";
        }
        echo"</select>";
    }

}