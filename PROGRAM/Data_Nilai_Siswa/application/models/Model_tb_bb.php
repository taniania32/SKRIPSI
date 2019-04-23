<?php

class Model_tb_bb extends CI_Model {

    public $table ="tb_m_tb_bb";
    

public function getCombo1(){
        $this->db->select('*');
        $this->db->from('tb_m_siswa');
        $this->db->join('tb_m_rombel', 'tb_m_siswa.ID_Rombel = tb_m_rombel.ID_Rombel','left');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }


    public function getCombo2(){
        $this->db->select('*');
        $this->db->from('tb_m_rombel');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

public function get_rmbl()
        {
            $this->db->order_by('ID_Rombel', 'asc');
            return $this->db->get('tb_m_rombel')->result();
        }

        public function get_sw()
        {
            $this->db->order_by('Nama', 'asc');
            $this->db->join('tb_m_rombel', 'tb_m_siswa.ID_Rombel = tb_m_rombel.ID_Rombel');
            return $this->db->get('tb_m_siswa')->result();
        }


    public function getDataTable(){
        $this->db->select('*');
        $this->db->from('tb_m_tb_bb');
        $this->db->join('tb_m_siswa', 'tb_m_tb_bb.NISN = tb_m_siswa.NISN','left');
        $this->db->join('tb_m_rombel', 'tb_m_rombel.ID_Rombel = tb_m_siswa.ID_Rombel','left');
        $this->db->order_by('tb_m_tb_bb.ID_TB_BB','DESC');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

    function save() {
        $NISN=$_POST['NISN'];
        $Semester=$_POST['Semester'];
        $cek=$this->db->query("select * from tb_m_tb_bb join tb_m_siswa on tb_m_tb_bb.NISN=tb_m_siswa.NISN where tb_m_tb_bb.NISN ='$NISN' and tb_m_tb_bb.Semester='$Semester'")->num_rows();
       
        if($cek>0){
            $this->session->set_flashdata('error',"NISN : " .$NISN. " Sudah Digunakan");
            redirect('tb_bb/add');
        }else{
        $data = array(
            'ID_TB_BB'    => $this->input->post('ID_TB_BB', TRUE),
            'NISN'  => $this->input->post('NISN', TRUE),
	        'TB'  => $this->input->post('TB', TRUE),
			'BB'  => $this->input->post('BB', TRUE),
            'Pendengaran'  => $this->input->post('Pendengaran', TRUE),
            'Penglihatan'  => $this->input->post('Penglihatan', TRUE),
            'Gigi'  => $this->input->post('Gigi', TRUE),
			'Semester'  => $this->input->post('Semester', TRUE)
        );
        $this->db->insert($this->table,$data);
        $this->session->set_flashdata('success','Data TB dan BB dengan NISN : ' .$NISN. ' Semester : ' .$Semester. ' telah berhasil disimpan.');
    }
    }
    function update() {
        $data = array(
            //'ID_Tipe_Guru'    => $this->input->post('ID_Tipe_Guru', TRUE),
            'NISN'  => $this->input->post('NISN', TRUE),
			'TB'  => $this->input->post('TB', TRUE),
			'BB'  => $this->input->post('BB', TRUE),
         'Pendengaran'  => $this->input->post('Pendengaran', TRUE),
            'Penglihatan'  => $this->input->post('Penglihatan', TRUE),
            'Gigi'  => $this->input->post('Gigi', TRUE),
			'Semester'  => $this->input->post('Semester', TRUE)
        );
        $ID_TB_BB   = $this->input->post('ID_TB_BB');
        $this->db->where('ID_TB_BB',$ID_TB_BB);
        $this->db->update($this->table,$data);
    }

}