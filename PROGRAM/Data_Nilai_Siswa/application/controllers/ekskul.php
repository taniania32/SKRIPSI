<?php

Class ekskul extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_ekskul');
    }

    function data() {
        // nama tabel
        $table = 'tb_m_ekskul';
        // nama PK
        $primaryKey = 'ID_Ekskul';
        // list field
        $columns = array(
            array('db' => 'ID_Ekskul', 'dt' => 'ID_Ekskul'),
			array('db' => 'Nama_Ekskul', 'dt' => 'Nama_Ekskul'),
            array(
                'db' => 'ID_Ekskul',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('ekskul/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('ekskul/delete/'.$d,'<i class="fa fa-trash"></i>','onclick="return confirm(Apakah anda ingin menghapus data ini?);" data-popup="tooltip" data-original-title="Delete" style="color: red" data-placement="top"');
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
        $this->template->load('template', 'ekskul/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_ekskul->save();
            redirect('ekskul');
        } else {
            $this->template->load('template', 'ekskul/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_ekskul->update();
            $this->session->set_flashdata('success','Data ekskul telah berhasil diubah.');
            redirect('ekskul');
        }else{
            $ID_Ekskul      = $this->uri->segment(3);
            $data['ekskul'] = $this->db->get_where('tb_m_ekskul',array('ID_Ekskul'=>$ID_Ekskul))->row_array();
            $this->template->load('template', 'ekskul/edit',$data);
        }
    }
    
    function delete(){
		$ID_Ekskul = $this->uri->segment(3);
        if(!empty($ID_Ekskul)){
            // proses delete data
            $this->db->where('ID_Ekskul',$ID_Ekskul);
            $this->db->delete('tb_m_ekskul');
        }
        redirect('ekskul');     
    }

}