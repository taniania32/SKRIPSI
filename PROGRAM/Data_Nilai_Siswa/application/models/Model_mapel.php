<?php

class Model_mapel extends CI_Model {

    public $table ="tb_m_mapel";
    
    function save() {
         $ID_Mapel=$_POST['ID_Mapel'];
        $cek=$this->db->query("select * from tb_m_mapel where ID_Mapel ='$ID_Mapel'")->num_rows();
        if($cek>0){
            $this->session->set_flashdata('error',"ID Mapel : " .$ID_Mapel. " Sudah Digunakan");
            redirect('mapel/add');
        }else{
        $data = array(
            'ID_Mapel'    => $this->input->post('ID_Mapel', TRUE),
            'Nama_Mapel'  => $this->input->post('Nama_Mapel', TRUE)
        );
        $this->db->insert($this->table,$data);
        $this->session->set_flashdata('success','Data mapel dengan ID Mapel : ' .$ID_Mapel. ' telah berhasil disimpan.');
    }
    }
    
    function update() {
        $data = array(
            'Nama_Mapel'  => $this->input->post('Nama_Mapel', TRUE)
        );
        $ID_Mapel   = $this->input->post('ID_Mapel');
        $this->db->where('ID_Mapel',$ID_Mapel);
        $this->db->update($this->table,$data);
    }

}