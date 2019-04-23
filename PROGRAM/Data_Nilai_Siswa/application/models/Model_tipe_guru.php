<?php

class Model_tipe_guru extends CI_Model {

    public $table ="tb_m_tipe_guru";
    
    function save() {
        $data = array(
            'ID_Tipe_Guru'    => $this->input->post('ID_Tipe_Guru', TRUE),
            'Nama_Tipe_Guru'  => $this->input->post('Nama_Tipe_Guru', TRUE),
        );
        $this->db->insert($this->table,$data);
    }

    public function getCombo1(){
        $this->db->select('*');
        $this->db->from('tb_m_rombel');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

    public function getCombo2(){
        $this->db->select('*');
        $this->db->from('tb_m_mapel');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

public function dataTable(){
        $this->db->select('*');
        $this->db->from('tb_m_tipe_guru');
        $this->db->order_by('ID_Tipe_Guru');
        $this->db->group_by('ID_Tipe_Guru');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

    
    
	public function getIDTipeGuru()
	{
		$this->db->select_max('ID_Tipe_Guru');
		$query = $this->db->get('tb_m_tipe_guru');
		if($query->num_rows() > 0)
		foreach ($query->result() as $row){
			$query = $row->ID_Tipe_Guru;
	 	}else{
			$query = "000";
		}
	 $noUrut = (int) substr($query, 3, 3);
	 $noUrut++;
	 $newID = sprintf("%04s", $noUrut);
	 return $newID;
	}
	
    function update() {
        $data = array(
            //'ID_Tipe_Guru'    => $this->input->post('ID_Tipe_Guru', TRUE),
            'Nama_Tipe_Guru'  => $this->input->post('Nama_Tipe_Guru', TRUE),
        );
        $ID_Tipe_Guru   = $this->input->post('ID_Tipe_Guru');
        $this->db->where('ID_Tipe_Guru',$ID_Tipe_Guru);
        $this->db->update($this->table,$data);
    }

}