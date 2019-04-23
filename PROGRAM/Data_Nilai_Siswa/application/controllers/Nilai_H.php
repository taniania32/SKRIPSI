<?php

Class Nilai_H extends CI_Controller {

    function __construct() {
        parent::__construct();
        //chekAksesModule();
        $this->load->library('ssp');
        $this->load->model('Model_Nilai_H');
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

       $data['dataNilai'] = $this->Model_Nilai_H->dataTable();
       $this->template->load('template', 'nilai_H/list',$data);


    }

function addUTS(){
        if(isset($_POST['submit'])){
            $this->Model_Nilai_H->update();
            $this->session->set_flashdata('success','Data siswa telah berhasil diubah.');
            redirect('nilai_H');
        }else{
            $ID_P_H           = $this->uri->segment(3);
            $data['nilai_H'] = $this->db->get_where('tb_r_n_p_H',array('ID_P_H'=>$ID_P_H))->row_array();
            $this->template->load('template', 'nilai_H/addUT',$data);
        }
    }


              public function KKM($ID_Mapel)
    {
        $this->Model_Nilai_H->getKKM1($ID_Mapel);
        
    }

    function add() {
        
        
        $data=array(
            'ID_P_H'=>$this->Model_Nilai_H->getID(),
            'data' => $this->Model_Nilai_H->get_rmbl(),
                        // 'dataCmbMapel' =>$this->db->query("SELECT * from tb_m_kd inner join  tb_m_mapel on tb_m_mapel.ID_Mapel=tb_m_kd.ID_Mapel WHERE tb_m_kd.J_KD = 1")->result(),
            'dataCmbMapel' => $this->Model_Nilai_H->getMpl(),
            'siswa' => $this->Model_Nilai_H->get_sw(),
            'KD' => $this->Model_Nilai_H->getKD(),
            'rombel_selected' => '',
            'siswa_selected' => '',
            'mapel_selected' => '',
            'kd_selected' => '',
            
        );
        // $data['dataCmbMapel'] = $this->Model_Nilai_H->getCmbMapel();
        $data['dataCmbThn'] = $this->Model_Nilai_H->getCmbThn();
        // $data['data'] = $this->Model_Nilai_H->getCmbRmbl(); 


        if (isset($_POST['submit'])) {

            $this->Model_Nilai_H->save();
        redirect('nilai_H'); 
}
        else {
            $this->template->load('template', 'nilai_H/add',$data);
        }
    }


public function listnilai($id) 
    {
        // if(isset($_POST['submit'])){

        //     $this->Model_Nilai_H->update();
        //     redirect('nilai_H/index.php');}
        // // }else{

        $data=array(
            "id"=>$id,
             "getrow1" =>$this->db->query("SELECT * FROM tb_r_n_p_h INNER JOIN tb_r_n_p_d ON tb_r_n_p_h.ID_P_H =  tb_r_n_p_d.ID_P_H JOIN tb_m_kd on tb_r_n_p_d.ID_KD=tb_m_kd.ID_KD JOIN tb_m_siswa ON tb_r_n_p_h.NISN = tb_m_siswa.NISN INNER JOIN tb_m_mapel on tb_r_n_p_h.ID_Mapel = tb_m_mapel.ID_Mapel INNER JOIN tbl_tahun_akademik on tb_r_n_p_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik WHERE tb_r_n_p_h.ID_P_H = '$id'")->result(),
             // "getRata" =>$this->db->query("SELECT AVG (Nilai_KI3) AS Rata1 from tb_r_legger_d WHERE tb_r_legger_d.ID_Legger = '$id'")->result(),
             // "getRataKI4" =>$this->db->query("SELECT AVG (Nilai_KI4) AS Rata2 from tb_r_legger_d WHERE tb_r_legger_d.ID_Legger = '$id'")->result(),
            "getrow"=>$this->db->where('ID_P_H',$id)->get('tb_r_n_p_h')->row_array(),
            "getrow2"=>$this->db->where('ID_P_H',$id)->get('tb_r_n_p_d')->row_array(),
            // "getrow1"=>$this->db->where('ID_Nilai_Tugas',$id)->get('tb_r_nilai_tugas_d')->row_array(),
            "getRata" =>$this->db->query("SELECT AVG (N_R) AS N from tb_r_n_p_d WHERE tb_r_n_p_d.ID_P_H = '$id'")->result(),


            // "dataNilaiT" => $this->Model_Nilai_Tugas->dataTable1($id),
            'mapel_selected' => '',
            'kd_selected' => '',
            'dataCmbMapel' => $this->Model_Nilai_H->getMpl(),
            'siswa' => $this->Model_Nilai_H->get_sw(),
            'KD' => $this->Model_Nilai_H->getKD(),
        "dataCmbSis" => $this->Model_Nilai_Tugas->getSw1(),
        "dataCmbMapel" => $this->Model_Nilai_Tugas->getCmbMapel(),
        "dataCmbThn" => $this->Model_Nilai_Tugas->getCmbThn(),
        "dataCmbRmbl" => $this->Model_Nilai_Tugas->getRmbl1(),
        // "rombel_selected" => $selected->ID_Rombel,
        // "siswa_selected" => $selected->NISN,
        );
        $ID_P_H      = $this->uri->segment(3);
            $data['nilai_H'] = $this->db->get_where('tb_r_n_p_H',array('ID_P_H'=>$id))->row_array();
                        $data['nilai_H2'] = $this->db->get_where('tb_r_n_p_d',array('ID_P_H'=>$ID_P_H))->row_array();
            $this->template->load('template', 'nilai_H/list2',$data);
        
        // }
    }

    public function printN()
    {
        // $data['dataNilai'] = $this->Model_Nilai_Tugas->dataTable();
        $data['dataNilai'] = $this->Model_Nilai_H->dataTable();
        $data['dataNilai1'] = $this->Model_Nilai_Tugas->dataTable3();
        $data['dataNilai2'] = $this->Model_Nilai_Tugas->dt4();
        $data['dataNilai3'] = $this->Model_Nilai_Tugas->dt5();
        $data['dataKKM'] = $this->Model_Nilai_Tugas->getKKM();
        $data['dataKI'] = $this->Model_Nilai_Tugas->dataNi();
        $data['KD'] = $this->Model_Nilai_H->getKD();
        $data['NO'] = $this->Model_Nilai_H->getNO();
        //         $data=array
        // (
        //     'dataNilai'=>$this->db->query("select * from tb_r_nilai_h a join tb_m_mapel b on a.ID_Mapel=b.ID_Mapel join tbl_tahun_akademik c on a.id_tahun_akademik=c.id_tahun_akademik join tb_m_rombel d on a.ID_Rombel=d.ID_Rombel join tb_m_guru e on d.ID_Rombel=e.ID_Rombel where a.ID_Nilai = '$ID_Nilai'")->result(),
        // );
        $output = $this->load->view('nilai_H/r_nilaiH',$data,true);
        return $this->gen_pdf($output);
    }

    public function printN1()
    {
        // $data['dataNilai'] = $this->Model_Nilai_Tugas->dataTable();
        
        // $data['dataNilai2'] = $this->Model_Nilai_H->dt4();
        $data['dataKKM'] = $this->Model_Nilai_Tugas->getKKM();
        

        $data['dataNilai2']=$this->db->query("SELECT *,(SUM(case when tb_r_n_p_h.ID_Mapel = 'AGAMA' then (tb_r_n_p_d.N_R)END)/COUNT(CASE WHEN tb_r_n_p_h.ID_Mapel = 'AGAMA' THEN (tb_r_n_p_d.N_R) END)) as AG_KI3,
            (SUM(case when TB_R_N_HARIAN_K_H.ID_Mapel = 'AGAMA' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN TB_R_N_HARIAN_K_H.ID_Mapel = 'AGAMA' THEN (tb_r_harian_k_d.N_N) END))  as AG_KI4,
            (SUM(case when tb_r_n_p_h.ID_Mapel = 'PKN' then (tb_r_n_p_d.N_R) END)/COUNT(CASE WHEN tb_r_n_p_h.ID_Mapel = 'PKN' then (tb_r_n_p_d.N_R) END)) as PK_KI3,
            (SUM(case when TB_R_N_HARIAN_K_H.ID_Mapel = 'PKN' then (tb_r_harian_k_d.N_N)END)/COUNT(CASE WHEN TB_R_N_HARIAN_K_H.ID_Mapel = 'PKN' then (tb_r_harian_k_d.N_N)END)) as PK_KI4,
            (SUM(case when tb_r_n_p_h.ID_Mapel = 'B_INDO' then (tb_r_n_p_d.N_R)END)/COUNT(CASE WHEN tb_r_n_p_h.ID_Mapel = 'B_INDO' then (tb_r_n_p_d.N_R)END)) as BI_KI3,
            (SUM(case when TB_R_N_HARIAN_K_H.ID_Mapel = 'B_INDO' then (tb_r_harian_k_d.N_N)END)/COUNT(CASE WHEN TB_R_N_HARIAN_K_H.ID_Mapel = 'B_INDO' then (tb_r_harian_k_d.N_N)END)) as BI_KI4,
            (SUM(case when tb_r_n_p_h.ID_Mapel = 'MTK' then (tb_r_n_p_d.N_R) END)/COUNT(CASE WHEN tb_r_n_p_h.ID_Mapel = 'MTK' then (tb_r_n_p_d.N_R) END)) as MT_KI3,
            (SUM(case when TB_R_N_HARIAN_K_H.ID_Mapel = 'MTK' then(tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN TB_R_N_HARIAN_K_H.ID_Mapel = 'MTK' then(tb_r_harian_k_d.N_N) END)) as MT_KI4,
            (SUM(case when tb_r_n_p_h.ID_Mapel = 'IPA' then(tb_r_n_p_d.N_R) END)/COUNT(CASE WHEN tb_r_n_p_h.ID_Mapel = 'IPA' then(tb_r_n_p_d.N_R) END)) as IPA_KI3,
            (SUM(case when TB_R_N_HARIAN_K_H.ID_Mapel = 'IPA' then (tb_r_harian_k_d.N_N)END)/COUNT(CASE WHEN TB_R_N_HARIAN_K_H.ID_Mapel = 'IPA' then (tb_r_harian_k_d.N_N)END)) as IPA_KI4,
            (SUM(case when tb_r_n_p_h.ID_Mapel = 'IPS' then (tb_r_n_p_d.N_R) END)/COUNT(CASE WHEN tb_r_n_p_h.ID_Mapel = 'IPS' then (tb_r_n_p_d.N_R) END)) as IPS_KI3,
            (SUM(case when TB_R_N_HARIAN_K_H.ID_Mapel = 'IPS' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN TB_R_N_HARIAN_K_H.ID_Mapel = 'IPS' then (tb_r_harian_k_d.N_N) END)) as IPS_KI4,
            (SUM(case when tb_r_n_p_h.ID_Mapel = 'SBdP' then (tb_r_n_p_d.N_R) END)/COUNT(CASE WHEN tb_r_n_p_h.ID_Mapel = 'SBdP' then (tb_r_n_p_d.N_R) END)) as SB_KI3,
            (SUM(case when TB_R_N_HARIAN_K_H.ID_Mapel = 'SBdP' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN TB_R_N_HARIAN_K_H.ID_Mapel = 'SBdP' then (tb_r_harian_k_d.N_N) END)) as SB_KI4,
            (SUM(case when tb_r_n_p_h.ID_Mapel = 'PJOK' then (tb_r_n_p_d.N_R) END)/COUNT(CASE WHEN tb_r_n_p_h.ID_Mapel = 'PJOK' then (tb_r_n_p_d.N_R) END) ) as PJ_KI3,
            (SUM(case when TB_R_N_HARIAN_K_H.ID_Mapel = 'PJOK' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN TB_R_N_HARIAN_K_H.ID_Mapel = 'PJOK' then (tb_r_harian_k_d.N_N) END)) as PJ_KI4,
                        (SUM(case when tb_r_n_p_h.ID_Mapel = 'MULOK1' then (tb_r_n_p_d.N_R) END)/COUNT(CASE WHEN tb_r_n_p_h.ID_Mapel = 'MULOK1' then (tb_r_n_p_d.N_R) END)) as MK1_KI3,
            (SUM(case when TB_R_N_HARIAN_K_H.ID_Mapel = 'MULOK1' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN TB_R_N_HARIAN_K_H.ID_Mapel = 'MULOK1' then (tb_r_harian_k_d.N_N) END)) as MK1_KI4,
                        (SUM(case when tb_r_n_p_h.ID_Mapel = 'MULOK2' then (tb_r_n_p_d.N_R) END)/COUNT(CASE WHEN tb_r_n_p_h.ID_Mapel = 'MULOK2' then (tb_r_n_p_d.N_R) END)) as MK2_KI3,
            (SUM(case when TB_R_N_HARIAN_K_H.ID_Mapel = 'MULOK2' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN TB_R_N_HARIAN_K_H.ID_Mapel = 'MULOK2' then (tb_r_harian_k_d.N_N) END)) as MK2_KI4,AVG(tb_r_n_p_d.N_R) AS Rata1,AVG(tb_r_harian_k_d.N_N) AS Rata2 
            FROM tb_r_n_p_h LEFT join tb_r_n_p_d ON tb_r_n_p_h.ID_P_H=tb_r_n_p_d.ID_P_H LEFT join TB_R_N_HARIAN_K_H ON tb_r_n_p_h.NISN=TB_R_N_HARIAN_K_H.NISN LEFT join tb_r_harian_k_d ON tb_r_harian_k_d.ID_Nilai_H_K=TB_R_N_HARIAN_K_H.ID_Nilai_H_K LEFT join tbl_tahun_akademik ON tb_r_N_p_h.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik LEFT join tb_m_siswa ON TB_R_N_HARIAN_K_H.NISN=tb_m_siswa.NISN LEFT join tb_m_mapel ON tb_r_N_p_h.ID_Mapel = tb_m_mapel.ID_Mapel LEFT join tb_r_deskripsi ON tb_r_N_p_h.NISN = tb_r_deskripsi.NISN LEFT join tb_r_absen ON tb_r_N_p_h.NISN = tb_r_absen.NISN"
        )->result();
        // (
        //     'dataNilai'=>$this->db->query("select * from tb_r_nilai_h a join tb_m_mapel b on a.ID_Mapel=b.ID_Mapel join tbl_tahun_akademik c on a.id_tahun_akademik=c.id_tahun_akademik join tb_m_rombel d on a.ID_Rombel=d.ID_Rombel join tb_m_guru e on d.ID_Rombel=e.ID_Rombel where a.ID_Nilai = '$ID_Nilai'")->result(),
        // );
        $output = $this->load->view('nilai_H/r_legger',$data,true);
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

}