<?php

class Model_n_desk extends CI_Model {

	public $table ="tb_m_n_desk";
    
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->database();
    // }

function check_nisn($NISN){
   
   $this->db->select('NISN');
   $this->db->from('tb_m_n_desk');
   $this->db->where('NISN',$NISN);      
   $query =$this->db->get('data');
   $row = $query->row();
   if ($query->num_rows > 0){
         return TRUE; 
   }else{
         return TRUE;
  }
}

public function checkDuplicateNISN($NISN) {

    $this->db->where('NISN', $NISN);

    $query = $this->db->get('tb_m_n_desk');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
        return TRUE;
    } else {
        return TRUE;
    }
}

public function getID()
    {
        $q = $this->db->query("select MAX(ID_Desk) as ID_max from tb_r_deskripsi");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->ID_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "1";
        }
        return $kd;
    }

    public function dataTable(){
        $this->db->select('*');
        $this->db->from('tb_r_deskripsi');
        $this->db->join('tb_m_rombel', 'tb_m_rombel.ID_Rombel = tb_r_deskripsi.ID_Rombel','Left');
        $this->db->join('tbl_tahun_akademik', 'tbl_tahun_akademik.id_tahun_akademik = tb_r_deskripsi.id_tahun_akademik','Left');
        $this->db->join('tb_m_mapel', 'tb_m_mapel.ID_Mapel = tb_r_deskripsi.ID_Mapel','Left');
        $this->db->join('tb_m_siswa', 'tb_m_siswa.NISN = tb_r_deskripsi.NISN','Left');
        $this->db->order_by('tb_r_deskripsi.id_desk','desc');
        $this->db->group_by('tb_r_deskripsi.id_desk');


        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }
    
    

	
	function getNamaRombel(){
	$this->db->select('tb_m_rombel.Nama_Rombel');
        $this->db->from('tb_m_n_desk');
        $this->db->join('tb_m_rombel', 'tb_m_rombel.ID_Rombel = tb_m_n_desk.ID_Rombel');
        $query1 = $this->db->get();


        $queryResult1 = $query1->result_array();
        return $queryResult1;

    }    

 
    function getRombel($ID_Rombel){
        $hasil=$this->db->query("SELECT * FROM tb_m_rombel WHERE ID_Rombel='$ID_Rombel'");
        return $hasil->result();
    }
	
	
	public function duatable() {
	$this->db->select('*');
	$this->db->from('tb_m_n_desk');
	$this->db->join('tb_m_rombel','tb_m_n_desk.ID_Rombel=tb_m_rombel.ID_Rombel');
 $query = $this->db->get();
 return $query->result();
	}
    
    function save() {
                 $ID_Desk=$_POST['ID_Desk'];
                 $NISN=$_POST['NISN'];
        $cek=$this->db->query("select * from tb_r_deskripsi where ID_Desk ='$ID_Desk'")->num_rows();
        if($cek>0){
            $this->session->set_flashdata('error',"ID Deskripsi : " .$ID_Desk. " Sudah Digunakan");
            redirect('n_desk/add');
        }else{

        $data = array(
            'ID_Desk'           => $this->input->post('ID_Desk', TRUE),
            'Semester'      => $this->input->post('Semester', TRUE),
            'id_tahun_akademik'          => $this->input->post('id_tahun_akademik', TRUE),
            'NISN' => $this->input->post('NISN', TRUE),
            'ID_Rombel'  => $this->input->post('ID_Rombel', TRUE),
            'ID_Mapel'        => $this->input->post('ID_Mapel', TRUE),
            'Desk_P'     => $this->input->post('Desk_P',TRUE),
            'Desk_K'     => $this->input->post('Desk_K',TRUE),
            'N_Sikap1'     => $this->input->post('N_Sikap1',TRUE),
            'N_Sikap2'     => $this->input->post('N_Sikap2',TRUE)
        );
        $this->db->insert('tb_r_deskripsi',$data);
        


                  $this->session->set_flashdata('success','Data Deskripsi dengan NISN : ' .$NISN. ' telah berhasil disimpan.');
                }
 
  }


        // $tahun_akademik = $this->db->get_where('tbl_tahun_akademik',array('is_aktif'=>'y'))->row_array();
        
        // $history =  array(
        //     'NISN'                 =>  $this->input->post('NISN', TRUE),
        //     'id_tahun_akademik'   =>  $tahun_akademik['id_tahun_akademik'],
        //     'ID_Rombel'           =>  $this->input->post('ID_Rombel', TRUE)
        //     );
        // $this->db->insert('tb_history_kelas',$history);
    
    
    
    function update() {
        
            // update with foto
            $data = array(
'ID_Desk'           => $this->input->post('ID_Desk', TRUE),
            'Semester'      => $this->input->post('Semester', TRUE),
            'id_tahun_akademik'          => $this->input->post('id_tahun_akademik', TRUE),
            'NISN' => $this->input->post('NISN', TRUE),
            'ID_Rombel'  => $this->input->post('ID_Rombel', TRUE),
            'ID_Mapel'        => $this->input->post('ID_Mapel', TRUE),
            'Desk_P'     => $this->input->post('Desk_P',TRUE),
            'Desk_K'     => $this->input->post('Desk_K',TRUE),
            'N_Sikap1'     => $this->input->post('N_Sikap1',TRUE),
            'N_Sikap2'     => $this->input->post('N_Sikap2',TRUE)
        );
        
        $ID_Desk   = $this->input->post('ID_Desk');
        $this->db->where('ID_Desk',$ID_Desk);
        $this->db->update('tb_r_deskripsi',$data);
    }

}