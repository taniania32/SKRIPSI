<?php

Class Nilai_HK extends CI_Controller {

    function __construct() {
        parent::__construct();
        //chekAksesModule();
        $this->load->library('ssp');
        $this->load->model('Model_Nilai_HK');
$this->load->model('Model_Nilai_Tugas');

		$this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->database();
	    $this->load->helper(array('form','url'));
       
        $this->load->library('session');
      	
		
    }
	
	
	//controller
    function index() {

       $data['dataNilai'] = $this->Model_Nilai_HK->dataTable();
       $this->template->load('template', 'nilai_HK/list',$data);


    }

  
function add() {
        
        
        $data=array(
            'ID_Nilai_H_K'=>$this->Model_Nilai_HK->getID(),
            'data' => $this->Model_Nilai_HK->get_rmbl(),
                        // 'dataCmbMapel' =>$this->db->query("SELECT * from tb_m_kd inner join  tb_m_mapel on tb_m_mapel.ID_Mapel=tb_m_kd.ID_Mapel WHERE tb_m_kd.J_KD = 1")->result(),
            'dataCmbMapel' => $this->Model_Nilai_HK->getMpl(),
            'siswa' => $this->Model_Nilai_HK->get_sw(),
            'KD' => $this->Model_Nilai_HK->getKD(),
            'rombel_selected' => '',
            'siswa_selected' => '',
            'mapel_selected' => '',
            'kd_selected' => '',
            
        );
        // $data['dataCmbMapel'] = $this->Model_Nilai_H->getCmbMapel();
        $data['dataCmbThn'] = $this->Model_Nilai_HK->getCmbThn();
        // $data['data'] = $this->Model_Nilai_H->getCmbRmbl(); 


        if (isset($_POST['submit'])) {

            $this->Model_Nilai_HK->save();
        redirect('nilai_HK'); 
}
        else {
            $this->template->load('template', 'nilai_HK/add',$data);
        }
    }

public function printN()
    {
        // $data['dataNilai'] = $this->Model_Nilai_Tugas->dataTable();
        $data['dataNilai'] = $this->Model_Nilai_HK->dataTable2();
        $data['KD'] = $this->Model_Nilai_HK->getKD();
        //         $data=array
        // (
        //     'dataNilai'=>$this->db->query("select * from tb_r_nilai_h a join tb_m_mapel b on a.ID_Mapel=b.ID_Mapel join tbl_tahun_akademik c on a.id_tahun_akademik=c.id_tahun_akademik join tb_m_rombel d on a.ID_Rombel=d.ID_Rombel join tb_m_guru e on d.ID_Rombel=e.ID_Rombel where a.ID_Nilai = '$ID_Nilai'")->result(),
        // );
        $output = $this->load->view('nilai_HK/r_nilaiHK',$data,true);
        return $this->gen_pdf($output);
    }

    public function gen_pdf($html){
        ob_start();
         $this->load->library('MPDF56/mpdf');
         $mpdf=new mPDF('utf-8', $paper = 'A4-L' );
         ob_clean();
         $mpdf->WriteHTML($html);
         $mpdf->Output();
    }



public function listnilai($id) 
    {

        $data=array(
            "id"=>$id,
             "getrow1" =>$this->db->query("SELECT * FROM tb_r_n_harian_k_h INNER JOIN tb_r_harian_K_d ON tb_r_n_harian_k_h.ID_Nilai_H_K =  tb_r_harian_K_d.ID_Nilai_H_K JOIN tb_m_kd on tb_r_harian_K_d.ID_KD=tb_m_kd.ID_KD JOIN tb_m_siswa ON tb_r_n_harian_k_h.NISN = tb_m_siswa.NISN INNER JOIN tb_m_mapel on tb_r_n_harian_k_h.ID_Mapel = tb_m_mapel.ID_Mapel INNER JOIN tbl_tahun_akademik on tb_r_n_harian_k_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik WHERE tb_r_n_harian_k_h.ID_Nilai_H_K = '$id'")->result(),
             // "getRata" =>$this->db->query("SELECT AVG (Nilai_KI3) AS Rata1 from tb_r_legger_d WHERE tb_r_legger_d.ID_Legger = '$id'")->result(),
             // "getRataKI4" =>$this->db->query("SELECT AVG (Nilai_KI4) AS Rata2 from tb_r_legger_d WHERE tb_r_legger_d.ID_Legger = '$id'")->result(),
            "getrow"=>$this->db->where('ID_Nilai_H_K',$id)->get('tb_r_n_harian_k_h')->row_array(),
            "getrow2"=>$this->db->where('ID_Nilai_H_K',$id)->get('tb_r_harian_K_d')->row_array(),
            // "getrow1"=>$this->db->where('ID_Nilai_Tugas',$id)->get('tb_r_nilai_tugas_d')->row_array(),
            


            // "dataNilaiT" => $this->Model_Nilai_Tugas->dataTable1($id),
            
        "dataCmbSis" => $this->Model_Nilai_Tugas->getSw1(),
        "dataCmbMapel" => $this->Model_Nilai_Tugas->getCmbMapel(),
        "dataCmbThn" => $this->Model_Nilai_Tugas->getCmbThn(),
        "dataCmbRmbl" => $this->Model_Nilai_Tugas->getRmbl1(),
        // "rombel_selected" => $selected->ID_Rombel,
        // "siswa_selected" => $selected->NISN,
        );
        $ID_Nilai_H_K      = $this->uri->segment(3);
            $data['nilai_Hk'] = $this->db->get_where('tb_r_n_harian_k_h',array('ID_Nilai_H_K'=>$id))->row_array();
                        $data['nilai_Hk2'] = $this->db->get_where('tb_r_harian_K_d',array('ID_Nilai_H_K'=>$ID_Nilai_H_K))->row_array();
            $this->template->load('template', 'nilai_HK/list2',$data);
        
        
    }

}