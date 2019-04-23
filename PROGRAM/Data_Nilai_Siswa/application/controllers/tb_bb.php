<?php

Class tb_bb extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_tb_bb');
        $this->load->model('Model_Nilai_H');
    }

    function data() {
        // nama tabel
        $table = 'tb_m_tb_bb';
        // nama PK
        $primaryKey = 'ID_TB_BB';
        // list field
        $columns = array(
            array('db' => 'NISN', 'dt' => 'NISN'),
			array('db' => 'TB', 'dt' => 'TB'),
			array('db' => 'BB', 'dt' => 'BB'),
			array('db' => 'Semester', 'dt' => 'Semester'),
            array(
                'db' => 'ID_TB_BB',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('tb_bb/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('tb_bb/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $data['dataTB'] = $this->Model_tb_bb->getDataTable();
        $this->template->load('template', 'tb_bb/list',$data);
    }

    function add() {
        $data=array( 
             'data' => $this->Model_tb_bb->get_rmbl(),
             'siswa' => $this->Model_tb_bb->get_sw(),
            
            'rombel_selected' => '',
            'siswa_selected' => '',
           );

                    $data['dataCombo'] = $this->Model_tb_bb->getCombo2();
        if (isset($_POST['submit'])) {
            $this->Model_tb_bb->save();
            redirect('tb_bb');
        } else {
             
            $this->template->load('template', 'tb_bb/add',$data);
        }
    }
    
public function editTB($id) 
    {
        $data=array(
            "getrow"=>$this->db->where('ID_TB_BB',$id)->get('tb_m_tb_bb')->row_array(),
            "id"=>$id,
            "dataCombo" => $this->Model_tb_bb->getCombo1()
        );
        if(isset($_POST['submit'])){
            $this->Model_tb_bb->update();
            $this->session->set_flashdata('success','Data tinggi badan dan berat badan telah berhasil diubah.');
            redirect('tb_bb');
        }else{
        $ID_TB_BB      = $this->uri->segment(3);
            $data['ID_TB_BB'] = $this->db->get_where('tb_m_tb_bb',array('ID_TB_BB'=>$ID_TB_BB))->row_array();
            $this->template->load('template', 'tb_bb/edit',$data);
        }
        
    }

    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_tb_bb->update();
            redirect('tb_bb/');
        }else{
            $ID_TB_BB      = $this->uri->segment(3);
            $data['ID_TB_BB'] = $this->db->get_where('tb_m_tb_bb',array('ID_TB_BB'=>$ID_TB_BB))->row_array();
            $this->template->load('template', 'tb_bb/edit',$data);
        }
    }
    
    function delete(){
        $ID_TB_BB = $this->uri->segment(3);
        if(!empty($ID_TB_BB)){
            // proses delete data
            $this->db->where('ID_TB_BB',$ID_TB_BB);
            $this->db->delete('tb_m_tb_bb');
        }
        redirect('tb_bb');
    }

}