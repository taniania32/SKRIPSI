<?php

class Model_kurikulum extends CI_Model {

    public $table ="tb_m_kurikulum";
    
    function save($uploadLampiran) {
                 $Nama_Kurikulum=$_POST['Nama_Kurikulum'];

        $data = array(
            'Nama_Kurikulum'    => $this->input->post('Nama_Kurikulum', TRUE),
            'Status'          => $this->input->post('Status', TRUE),
            'Lampiran' => $uploadLampiran
			
        );
        $this->db->insert($this->table,$data);
                $this->session->set_flashdata('success','Data kurikulum : ' .$Nama_Kurikulum. ' telah berhasil disimpan.');
    }
    
    public function dataTable(){
        $this->db->select('*');
        $this->db->from('tb_m_kurikulum');
        $query = $this->db->get();
        $queryResult = $query->result_array();
        return $queryResult;    
    }

	// function getDown()
 //    {
 //        $requested_file = $this->uri->segment(x);
 //        $this->load->helper('download');
 //        $this->db->select('*');
 //        $this->db->where('ID_Kurikulum',$requested_file);
 //        $query =  $this->db->get('tb_m_kurikulum');
 //        foreach ($query->result() as $row);
 //       {
 //    $file_data = file_get_contents(base_url()."./uploads/".$Lampiran);
 //    $file_name = $$Lampiran;
 //    }
    
 //    force_download($file_name, $file_data);
 //   }


 // function getRows($params = array()){
 //        $this->db->select('*');
 //        $this->db->from('tb_m_kurikulum');
 //        if(array_key_exists('ID_Kurikulum',$params) && !empty($params['ID_Kurikulum'])){
 //            $this->db->where('ID_Kurikulum',$params['ID_Kurikulum']);
 //            //get records
 //            $query = $this->db->get();
 //            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
 //        }else{
 //            //set start and limit
 //            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
 //                $this->db->limit($params['limit'],$params['start']);
 //            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
 //                $this->db->limit($params['limit']);
 //            }
 //            //get records
 //            $query = $this->db->get();
 //            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
 //        }
 //        //return fetched data
 //        return $result;
 //    }

    function update() {
        $data = array(
            'Nama_Kurikulum'    => $this->input->post('Nama_Kurikulum', TRUE),
            'Status'          => $this->input->post('Status', TRUE),
			'Lampiran'          => $uploadLampiran
        );
        $ID_Kurikulum   = $this->input->post('ID_Kurikulum');
        $this->db->where('ID_Kurikulum',$ID_Kurikulum);
        $this->db->update($this->table,$data);
    }
    
    function addKurikulumDetail(){
         $data = array(
            'kd_mapel'       => $this->input->post('kd_mapel', TRUE),
            'kelas'          => $this->input->post('kelas', TRUE),
            'kd_jurusan'          => $this->input->post('jurusan', TRUE),
            'id_kurikulum'   => $this->input->post('id_kurikulum', TRUE)
        );
        $this->db->insert('tbl_kurikulum_detail',$data);
    }

}