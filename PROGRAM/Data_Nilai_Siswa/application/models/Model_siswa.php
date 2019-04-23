<?php

class Model_siswa extends CI_Model {

	public $table ="tb_m_siswa";
    
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->database();
    // }

function check_nisn($NISN){
   
   $this->db->select('NISN');
   $this->db->from('tb_m_siswa');
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

    $query = $this->db->get('tb_m_siswa');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
        return TRUE;
    } else {
        return TRUE;
    }
}

    public function dataTable(){
$this->db->select('*');
        $this->db->from('tb_m_siswa');
        $this->db->join('tb_m_rombel', 'tb_m_rombel.ID_Rombel = tb_m_siswa.ID_Rombel','Left');
        $this->db->join('tb_m_guru', 'tb_m_guru.ID_Rombel = tb_m_rombel.ID_Rombel','Left');
        $this->db->join('tb_m_tipe_guru', 'tb_m_guru.ID_Tipe_Guru = tb_m_tipe_guru.ID_Tipe_Guru','Left');
        $this->db->order_by('NISN','ASC');
        $this->db->group_by('NISN');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }
    

    public function dataTable1(){
$this->db->select('*');
        $this->db->from('tb_m_siswa');
        $this->db->join('tb_m_rombel', 'tb_m_rombel.ID_Rombel = tb_m_siswa.ID_Rombel','Left');
        $this->db->join('tb_m_guru', 'tb_m_guru.ID_Rombel = tb_m_rombel.ID_Rombel','Left');
        $this->db->join('tb_m_tipe_guru', 'tb_m_guru.ID_Tipe_Guru = tb_m_tipe_guru.ID_Tipe_Guru','Left');
        $this->db->order_by('NISN','ASC');
        $this->db->group_by('NISN');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }
    

// function getAll($config){  
// 		$this->db->select('*');
// 		$this->db->from('tb_m_siswa');
// 		$this->db->join('tb_m_rombel','tb_m_siswa.ID_Rombel=tb_m_rombel.ID_Rombel');
// 		$this->db->limit($config['per_page'], $this->uri->segment(3));
// 		$hasilquery = $this->db->get();
// 		// $hasilquery=$this->db->get('tb_m_siswa',$config['per_page'], $this->uri->segment(3));
		


//         if ($hasilquery->num_rows() > 0) {
//             foreach ($hasilquery->result() as $value) {
//                 $data[]=$value;
//             }
//             return $data;
//         }      
//     }
	

	// function jumlahbaris(){
	// $query = $this->db->query("SELECT * FROM tb_m_siswa");
	// $total = $query->num_rows();
	// return $total;
	// }
	
	function getNamaRombel(){
	$this->db->select('tb_m_rombel.Nama_Rombel');
        $this->db->from('tb_m_siswa');
        $this->db->join('tb_m_rombel', 'tb_m_rombel.ID_Rombel = tb_m_siswa.ID_Rombel');
        $query1 = $this->db->get();


        $queryResult1 = $query1->result_array();
        return $queryResult1;

    }    
 //   $query = $this->db->query("SELECT b.Nama_Rombel FROM tb_m_siswa a join tb_m_rombel b on a.ID_Rombel=b.ID_Rombel where a.ID_Rombel='ID_Rombel'");
	//return $query->result_array();
	
	
	// function getCount(){
	// $hasil=$this->db->query("SELECT count (*) FROM tb_m_siswa a join tb_m_rombel b on a.ID_Rombel=B.ID_Rombel WHERE a.ID_Rombel='$ID_Rombel'");
 //        return $hasil->result();		
	// }

    // public $table ="tb_m_siswa";
	
		// function getDataSiswa(){
        // $hasil=$this->db->query("SELECT * FROM tb_m_siswa");
        // return $hasil;
    // }
 
    function getRombel($ID_Rombel){
        $hasil=$this->db->query("SELECT * FROM tb_m_rombel WHERE ID_Rombel='$ID_Rombel'");
        return $hasil->result();
    }
	
	
	public function duatable() {
	$this->db->select('*');
	$this->db->from('tb_m_siswa');
	$this->db->join('tb_m_rombel','tb_m_siswa.ID_Rombel=tb_m_rombel.ID_Rombel');
 $query = $this->db->get();
 return $query->result();
	}
    
    function save() {
                 $NISN=$_POST['NISN'];
        $cek=$this->db->query("select * from tb_m_siswa where NISN ='$NISN'")->num_rows();
        if($cek>0){
            $this->session->set_flashdata('error',"NISN : " .$NISN. " Sudah Digunakan");
            redirect('siswa/add');
        }else{

        $data = array(
            'NISN'           => $this->input->post('NISN', TRUE),
            'No_Induk'      => $this->input->post('No_Induk', TRUE),
            'Nama'          => $this->input->post('Nama', TRUE),
            'JK' => $this->input->post('JK', TRUE),
            'Ket'  => $this->input->post('Ket', TRUE),
            'ID_Rombel'        => $this->input->post('ID_Rombel', TRUE),
            'ID_Kelas'     => $this->input->post('ID_Kelas',TRUE)
        );
        $this->db->insert('tb_m_siswa',$data);
        

        $tahun_akademik = $this->db->get_where('tbl_tahun_akademik',array('is_aktif'=>'y'))->row_array();
        
        $history =  array(
            'NISN'                 =>  $this->input->post('NISN', TRUE),
            'id_tahun_akademik'   =>  $tahun_akademik['id_tahun_akademik'],
            'id_rombel'           =>  $this->input->post('ID_Rombel', TRUE)
            );
        $this->db->insert('tbl_history_kelas',$history);

                  $this->session->set_flashdata('success','Data siswa dengan NISN : ' .$NISN. ' telah berhasil disimpan.');
                }
   //      $this->db->select('NISN');
   // $this->db->from('tb_m_siswa');
   // $this->db->where('NISN',$NISN);      
   // $query =$this->db->get('data');
   // $row = $query->row();
   // if ($query->num_rows > 0){
   //       return "FALSE";
   // }else{
   //       return "TRUE";
  }


        // $tahun_akademik = $this->db->get_where('tbl_tahun_akademik',array('is_aktif'=>'y'))->row_array();
        
        // $history =  array(
        //     'NISN'                 =>  $this->input->post('NISN', TRUE),
        //     'id_tahun_akademik'   =>  $tahun_akademik['id_tahun_akademik'],
        //     'ID_Rombel'           =>  $this->input->post('ID_Rombel', TRUE)
        //     );
        // $this->db->insert('tb_history_kelas',$history);
    
    
    
    function update($foto) {
        if(empty($foto)){
            // update without foto
            $data = array(
            'Nama'          => $this->input->post('Nama', TRUE),
            'JK' => $this->input->post('JK', TRUE),
            'Ket'  => $this->input->post('Ket', TRUE),
            'ID_Rombel'        => $this->input->post('ID_Rombel', TRUE),
            'ID_Kelas'     => $this->input->post('ID_Kelas',TRUE)
        );
        }else{
            // update with foto
            $data = array(
            'NISN'           => $this->input->post('NISN', TRUE),
            'No_Induk'      => $this->input->post('No_Induk', TRUE),
            'Nama'          => $this->input->post('Nama', TRUE),
            'JK' => $this->input->post('JK', TRUE),
            'Ket'  => $this->input->post('Ket', TRUE),
            'ID_Rombel'        => $this->input->post('ID_Rombel', TRUE),
            'ID_Kelas'     => $this->input->post('ID_Kelas',TRUE)
        );
        }
        $NISN   = $this->input->post('NISN');
        $this->db->where('NISN',$NISN);
        $this->db->update('tb_m_siswa',$data);
    }

}