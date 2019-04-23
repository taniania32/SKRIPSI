<?php

Class Mapel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_mapel');
    }

    function data() {
        // nama tabel
        $table = 'tb_m_mapel';
        // nama PK
        $primaryKey = 'ID_Mapel';
        // list field
        $columns = array(
            array('db' => 'ID_Mapel', 'dt' => 'ID_Mapel'),
            array('db' => 'Nama_Mapel', 'dt' => 'Nama_Mapel'),
            array(
                'db' => 'ID_Mapel',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('mapel/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('mapel/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $this->template->load('template', 'mapel/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_mapel->save();
            redirect('mapel');
        } else {
            $this->template->load('template', 'mapel/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_mapel->update();
            $this->session->set_flashdata('success','Data Mata Pelajaran telah berhasil diubah.');
            redirect('mapel');
        }else{
            $ID_Mapel      = $this->uri->segment(3);
            $data['ID_Mapel'] = $this->db->get_where('tb_m_mapel',array('ID_Mapel'=>$ID_Mapel))->row_array();
            $this->template->load('template', 'mapel/edit',$data);
        }
    }
    
    function delete(){
        $ID_Mapel = $this->uri->segment(3);
        if(!empty($ID_Mapel)){
            // proses delete data
            $this->db->where('ID_Mapel',$ID_Mapel);
            $this->db->delete('tb_m_mapel');
        }
        redirect('mapel');
    }

}