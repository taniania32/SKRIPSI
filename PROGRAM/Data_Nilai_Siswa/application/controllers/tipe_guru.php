<?php

Class tipe_guru extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_tipe_guru');
    }

   //  function data() {
   //      // nama tabel
   //      $table = 'tb_m_tipe_guru';
   //      // nama PK
   //      $primaryKey = 'ID_Tipe_Guru';
   //      // list field
   //      $columns = array(
   //          array('db' => 'Nama_Tipe_Guru', 'dt' => 'Nama_Tipe_Guru'),
			// array('db' => 'ID_Mapel', 'dt' => 'ID_Mapel'),
			// array('db' => 'ID_Rombel', 'dt' => 'ID_Rombel'),
   //          array(
   //              'db' => 'ID_Tipe_Guru',
   //              'dt' => 'aksi',
   //              'formatter' => function( $d) {
   //                  //return "<a href='edit.php?id=$d'>EDIT</a>";
   //                  return anchor('tipe_guru/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
   //                      '.anchor('tipe_guru/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
   //              }
   //          )
   //      );

   //      $sql_details = array(
   //          'user' => $this->db->username,
   //          'pass' => $this->db->password,
   //          'db' => $this->db->database,
   //          'host' => $this->db->hostname
   //      );

   //      echo json_encode(
   //              SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
   //      );
   //  }

    function index() {
        $data['dataTipeGuru'] = $this->Model_tipe_guru->dataTable();
        $this->template->load('template', 'tipe_guru/list',$data);
    }

    function add() {
$data['dataCombo'] = $this->Model_tipe_guru->getCombo1();
$data['dataCombo2'] = $this->Model_tipe_guru->getCombo2();
        if (isset($_POST['submit'])) {
		$this->Model_tipe_guru->save();
            redirect('tipe_guru');
        } else {

            $this->template->load('template', 'tipe_guru/add',$data);
        }
    }
    
    function edit(){

        $data['dataTipeGuru'] = $this->Model_tipe_guru->dataTable();
        $data['dataCombo'] = $this->Model_tipe_guru->getCombo1();
        $data['dataCombo2'] = $this->Model_tipe_guru->getCombo2();
        if(isset($_POST['submit'])){
            $this->Model_tipe_guru->update();
            $this->session->set_flashdata('success','Data tipe guru telah berhasil diubah.');
            redirect('tipe_guru');
        }else{
            $ID_Tipe_Guru      = $this->uri->segment(3);
            $data['ID_Tipe_Guru'] = $this->db->get_where('tb_m_tipe_guru',array('ID_Tipe_Guru'=>$ID_Tipe_Guru))->row_array();
            $this->template->load('template', 'tipe_guru/edit',$data);
        }
    }

    public function edittipe($id) //untuk di tampilan edit product
    {
        $data=array(
            "getrow"=>$this->db->where('ID_Tipe_Guru',$id)->get('tb_m_tipe_guru')->row_array(),
            "id"=>$id,
            "dataCombo" => $this->Model_tipe_guru->getCombo1(),
            'dataCombo2' => $this->Model_tipe_guru->getCombo2()
        );
        if(isset($_POST['submit'])){
            $this->Model_tipe_guru->update();
            redirect('tipe_guru');
        }else{
        $ID_Tipe_Guru      = $this->uri->segment(3);
            $data['ID_Tipe_Guru'] = $this->db->get_where('tb_m_tipe_guru',array('ID_Tipe_Guru'=>$ID_Tipe_Guru))->row_array();
        $this->template->load('template', 'tipe_guru/edit',$data);
            }
        
    }
    
    function delete(){
        $ID_Tipe_Guru = $this->uri->segment(3);
        if(!empty($ID_Tipe_Guru)){
            // proses delete data
            $this->db->where('ID_Tipe_Guru',$ID_Tipe_Guru);
            $this->db->delete('tb_m_tipe_guru');
        }
        redirect('tipe_guru');
    }

}