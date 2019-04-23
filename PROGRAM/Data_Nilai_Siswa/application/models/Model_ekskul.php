<?php

class Model_ekskul extends CI_Model {

    public $table ="tb_m_ekskul";
    
    function save() {
                 $Nama_Ekskul=$_POST['Nama_Ekskul'];
        $data = array(
              'ID_Ekskul'    => $this->input->post('ID_Ekskul', TRUE),
            'Nama_Ekskul'  => $this->input->post('Nama_Ekskul', TRUE)
        );
        $this->db->insert($this->table,$data);
        $this->session->set_flashdata('success','Ekstrakulikuler : ' .$Nama_Ekskul. ' telah berhasil disimpan.');
    }
    
    function update() {
        $data = array(
            'Nama_Ekskul'  => $this->input->post('Nama_Ekskul', TRUE)
        );
        $ID_Ekskul = $this->input->post('ID_Ekskul');
        $this->db->where('ID_Ekskul',$ID_Ekskul);
        $this->db->update($this->table,$data);
    }
    
    

}