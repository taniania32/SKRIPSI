<?php

Class laporan extends CI_Controller {

    function __construct() {
        parent::__construct();
        //chekAksesModule();
        $this->load->library('ssp');
        // $this->load->model('Model_laporan');
        $this->load->model('Model_Nilai_Tugas');
$this->load->model('Model_siswa');

		$this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->database();
	    $this->load->helper(array('form','url'));
       
        $this->load->library('session');
      	
		
    }
	
	
	//controller
    function index() {
// $data['dataKKM'] = $this->Model_Nilai_Tugas->getKKM();
//        $data['dataNilai2'] = $this->Model_Nilai_Tugas->dt4();
//        $data['count']=$this->db->num_rows();
//        // $data['dataRata'] = $this->Model_laporan->rata();
//        $this->template->load('template', 'laporan/l_legger',$data);

     $query=$this->db->query("SELECT *,(SUM(case when tb_r_n_p_h.ID_Mapel = 'AGAMA' then (tb_r_n_p_d.N_R)END)/COUNT(CASE WHEN tb_r_n_p_h.ID_Mapel = 'AGAMA' THEN (tb_r_n_p_d.N_R) END)) as AG_KI3,
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
            FROM tb_r_n_p_h LEFT join tb_r_n_p_d ON tb_r_n_p_h.ID_P_H=tb_r_n_p_d.ID_P_H LEFT join TB_R_N_HARIAN_K_H ON tb_r_n_p_h.NISN=TB_R_N_HARIAN_K_H.NISN LEFT join tb_r_harian_k_d ON tb_r_harian_k_d.ID_Nilai_H_K=TB_R_N_HARIAN_K_H.ID_Nilai_H_K LEFT join tbl_tahun_akademik ON tb_r_N_p_h.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik LEFT join tb_m_siswa ON TB_R_N_HARIAN_K_H.NISN=tb_m_siswa.NISN LEFT join tb_m_mapel ON tb_r_N_p_h.ID_Mapel = tb_m_mapel.ID_Mapel LEFT join tb_r_deskripsi ON tb_r_N_p_h.NISN = tb_r_deskripsi.NISN LEFT join tb_r_absen ON tb_r_N_p_h.NISN = tb_r_absen.NISN GROUP BY tb_r_n_p_h.NISN"
        );
        
$data=array(
            "data1" => $this->Model_Nilai_Tugas->get_rmbl(),
            'rombel_selected' => '',
            "dataNilai2"=>$query->result(),
            "count"=>$query->num_rows(),
        );
$data['dataCmbThn'] = $this->Model_Nilai_Tugas->getCmbThn1();
$data['dataKKM'] = $this->Model_Nilai_Tugas->getKKM();
$this->template->load('template', 'laporan/l_legger',$data);
    }


function reportlegger(){
  $where = "";

        if(isset($_POST['ID_Rombel'])&&($_POST['Semester'])&&($_POST['id_tahun_akademik']))
            $where = " AND tb_r_n_p_h.ID_Rombel LIKE'%".$_POST['ID_Rombel']."%' and tb_r_n_p_h.Semester LIKE '".$_POST['Semester']."'and tb_r_n_p_h.id_tahun_akademik LIKE '".$_POST['id_tahun_akademik']."' GROUP BY tb_r_n_p_h.NISN";
    
        $query=$this->db->query("SELECT *,(SUM(case when tb_r_n_p_h.ID_Mapel = 'AGAMA' then (tb_r_n_p_d.N_R)END)/COUNT(CASE WHEN tb_r_n_p_h.ID_Mapel = 'AGAMA' THEN (tb_r_n_p_d.N_R) END)) as AG_KI3,
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
            FROM tb_r_n_p_h  join tb_r_n_p_d ON tb_r_n_p_h.ID_P_H=tb_r_n_p_d.ID_P_H join TB_R_N_HARIAN_K_H ON tb_r_n_p_h.NISN=TB_R_N_HARIAN_K_H.NISN join tb_r_harian_k_d ON tb_r_harian_k_d.ID_Nilai_H_K=TB_R_N_HARIAN_K_H.ID_Nilai_H_K join tbl_tahun_akademik ON tb_r_N_p_h.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik join tb_m_siswa ON TB_R_N_HARIAN_K_H.NISN=tb_m_siswa.NISN  join tb_m_mapel ON tb_r_N_p_h.ID_Mapel = tb_m_mapel.ID_Mapel join tb_r_deskripsi ON tb_r_N_p_h.NISN = tb_r_deskripsi.NISN join tb_r_absen ON tb_r_N_p_h.NISN = tb_r_absen.NISN".$where );
        
$data=array(
            // 'data' => $this->db->query("SELECT * FROM tb_m_rombel")->result(),
            // 'siswa' => $this->Model_Nilai_Tugas->get_sw(),
            "data1" => $this->Model_Nilai_Tugas->get_rmbl(),
            'rombel_selected' => '',

            "dataNilai2"=>$query->result(),
            "count"=>$query->num_rows()
        );
$data['dataCmbThn'] = $this->Model_Nilai_Tugas->getCmbThn1();
$data['dataKKM'] = $this->Model_Nilai_Tugas->getKKM();
  

        $this->template->load('template','laporan/l_legger',$data);
    
}

    public function reportleggerPdf($ID_Rombel,$Semester,$id_tahun_akademik)
// public function reportleggerPdf()
    {
        // $ID_Rombel1=$this->input->get('ID_Rombel');
        // $Semester1=$this->input->get('Semester');
        // $tahun=$this->input->get('id_tahun_akademik');
  $where = "";
        if(isset($ID_Rombel)&&isset($Semester)&&isset($id_tahun_akademik))
            $where = " and tb_r_n_p_h.ID_Rombel LIKE'".$ID_Rombel."%' and tb_r_n_p_h.Semester LIKE '".$Semester."'and tb_r_n_p_h.id_tahun_akademik LIKE '".$id_tahun_akademik."'GROUP BY tb_r_n_p_h.NISN";

        // if(isset($_POST['ID_Rombel'])&&($_POST['Semester'])&&($_POST['id_tahun_akademik']))
        //     $where = " AND tb_r_n_p_h.ID_Rombel LIKE'%".$_POST['ID_Rombel']."%' and tb_r_n_p_h.Semester LIKE '".$_POST['Semester']."'and tb_r_n_p_h.id_tahun_akademik LIKE '".$_POST['id_tahun_akademik']."' GROUP BY tb_r_n_p_h.NISN";
        
        $query=$this->db->query("SELECT *,(SUM(case when tb_r_n_p_h.ID_Mapel = 'AGAMA' then (tb_r_n_p_d.N_R)END)/COUNT(CASE WHEN tb_r_n_p_h.ID_Mapel = 'AGAMA' THEN (tb_r_n_p_d.N_R) END)) as AG_KI3,
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
            FROM tb_r_n_p_h  join tb_r_n_p_d ON tb_r_n_p_h.ID_P_H=tb_r_n_p_d.ID_P_H join TB_R_N_HARIAN_K_H ON tb_r_n_p_h.NISN=TB_R_N_HARIAN_K_H.NISN join tb_r_harian_k_d ON tb_r_harian_k_d.ID_Nilai_H_K=TB_R_N_HARIAN_K_H.ID_Nilai_H_K join tbl_tahun_akademik ON tb_r_N_p_h.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik join tb_m_siswa ON TB_R_N_HARIAN_K_H.NISN=tb_m_siswa.NISN JOIN tb_m_rombel on tb_m_siswa.ID_Rombel=tb_m_rombel.ID_Rombel join tb_m_guru on tb_m_rombel.ID_Rombel=tb_m_guru.ID_Rombel JOIN tb_m_tipe_guru on tb_m_guru.ID_Tipe_Guru=tb_m_tipe_guru.ID_Tipe_Guru join tb_m_mapel ON tb_r_N_p_h.ID_Mapel = tb_m_mapel.ID_Mapel join tb_r_deskripsi ON tb_r_N_p_h.NISN = tb_r_deskripsi.NISN join tb_r_absen ON tb_r_N_p_h.NISN = tb_r_absen.NISN".$where);
        


        $data=array(
            "dataNilai2"=>$query->result(),
            "count"=>$query->num_rows()
        );
            $data['dataKKM'] = $this->Model_Nilai_Tugas->getKKM();
            $data['dataSiswa'] = $this->Model_siswa->dataTable();

        $output = $this->load->view('laporan/report',$data,true);
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
    function add() {
        
        
        $data=array(
            'ID_Legger'=>$this->Model_laporan->getID(),
            'data' => $this->Model_laporan->get_rmbl(),
            'siswa' => $this->Model_laporan->get_sw(),
            'rombel_selected' => '',
            'siswa_selected' => '',
            'dataCmbMapel' => $this->Model_laporan->getMapel(),    
        );
        // $data['dataCmbMapel'] = $this->Model_laporan->getMapel();
        $data['dataCmbThn'] = $this->Model_laporan->getCmbThn();
        // $data['data'] = $this->Model_laporan->getCmbRmbl(); 


        if (isset($_POST['submit'])) {

            $this->Model_laporan->save();
            
        redirect('laporan'); 
}
        else {
            $this->template->load('template', 'laporan/add',$data);
        }
    }



    
    //     function edit(){       
    //     $data['dataCmbSis'] = $this->Model_laporan->getsw();
    //     $data['dataCmbMapel'] = $this->Model_laporan->getCmbMapel();
    //     $data['dataCmbThn'] = $this->Model_laporan->getCmbThn();

    //     $data['dataCmbRmbl'] = $this->Model_laporan->getCmbRmbl1();
    //     if(isset($_POST['submit'])){
    //         $this->Model_laporan->update();
    //                 $this->session->set_flashdata('success','Data Nilai Tugas telah berhasil diubah.');
    //         redirect('laporan');
    //     }else{
    //         $ID_laporan           = $this->uri->segment(3);
    //         $data['laporan'] = $this->db->get_where('tb_r_laporan',array('ID_laporan'=>$ID_laporan))->row_array();
    //         $this->template->load('template', 'laporan/edit',$data);
    //     }
    // }

public function printN()
    {
        // $data['dataNilai'] = $this->Model_laporan->dataTable();

        

        $data['dataNilai'] = $this->Model_laporan->dataTable2();
        $data['dataNilai1'] = $this->Model_laporan->dataTable3();
        $data['dataNilai2'] = $this->Model_laporan->dt4();
        $data['dataNilai3'] = $this->Model_laporan->dt5();
        $data['dataKKM'] = $this->Model_laporan->getKKM();
        $data['dataKI'] = $this->Model_laporan->dataNi();

        //         $data=array
        // (
        //     'dataNilai'=>$this->db->query("select * from tb_r_nilai_h a join tb_m_mapel b on a.ID_Mapel=b.ID_Mapel join tbl_tahun_akademik c on a.id_tahun_akademik=c.id_tahun_akademik join tb_m_rombel d on a.ID_Rombel=d.ID_Rombel join tb_m_guru e on d.ID_Rombel=e.ID_Rombel where a.ID_Nilai = '$ID_Nilai'")->result(),
        // );
        $output = $this->load->view('laporan/r_nilai',$data,true);
        return $this->gen_pdf($output);
    }

    
            public function KKM($ID_Mapel)
    {
        $this->Model_laporan->getKKM1($ID_Mapel);
        
    }


public function Nilai_KI3($ID_Mapel,$NISN){
$NI3=0;
if($ID_Mapel==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT *,tb_r_n_harian_p_h.NISN,(case when tb_r_harian_p_d.ID_KD = 83 AND tb_r_n_uas_d.ID_KD=83 AND tb_r_n_uts_d.ID_KD=83 then (tb_r_harian_p_d.N_N+tb_r_harian_p_d.N_N+tb_r_n_uts_d.N_1+tb_r_n_uas_d.N_1)/4 ELSE 0 END) AS N1,
(case when tb_r_harian_p_d.ID_KD = 84 AND tb_r_n_uas_d.ID_KD=84 AND tb_r_n_uts_d.ID_KD=84 then (tb_r_harian_p_d.N_N+tb_r_harian_p_d.N_N+tb_r_n_uts_d.N_1+tb_r_n_uas_d.N_1)/4 ELSE 0 END) AS N2,
(case when tb_r_harian_p_d.ID_KD = 85 AND tb_r_n_uas_d.ID_KD=85 AND tb_r_n_uts_d.ID_KD=85 then (tb_r_harian_p_d.N_N+tb_r_harian_p_d.N_N+tb_r_n_uts_d.N_1+tb_r_n_uas_d.N_1)/4 ELSE 0 END) AS N3,
(case when tb_r_harian_p_d.ID_KD = 86 AND tb_r_n_uas_d.ID_KD=86 AND tb_r_n_uts_d.ID_KD=86 then (tb_r_harian_p_d.N_N+tb_r_harian_p_d.N_N+tb_r_n_uts_d.N_1+tb_r_n_uas_d.N_1)/4 ELSE 0 END) AS N4,
             SUM(case when tb_r_harian_k_d.ID_KD = 87 then tb_r_harian_k_d.N_N ELSE 0 END) AS N5,
             SUM(case when tb_r_harian_k_d.ID_KD = 88 then tb_r_harian_k_d.N_N ELSE 0 END) AS N6,
             SUM(case when tb_r_harian_k_d.ID_KD = 89 then tb_r_harian_k_d.N_N ELSE 0 END) AS N7,
             SUM(case when tb_r_harian_k_d.ID_KD = 90 then tb_r_harian_k_d.N_N ELSE 0 END) AS N8
              FROM tb_r_harian_p_d join tb_r_n_harian_p_h on tb_r_harian_p_d.ID_Nilai_H_P=tb_r_n_harian_p_h.ID_Nilai_H_P JOIN tb_r_n_uts_h on tb_r_n_harian_p_h.NISN=tb_r_n_uts_h.NISN JOIN tb_r_n_uts_d on tb_r_n_uts_d.ID_N_UTS=tb_r_n_uts_h.ID_N_UTS JOIN tb_m_siswa on tb_r_n_harian_p_h.NISN=tb_m_siswa.NISN JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_K JOIN tb_r_n_uas_h ON tb_r_n_harian_p_h.NISN=tb_r_n_uas_h.NISN join tb_r_n_uas_d on tb_r_n_uas_h.ID_N_UAS=tb_r_n_uas_d.ID_N_UAS WHERE tb_r_n_harian_p_h.ID_Mapel='PJOK' AND tb_r_n_uts_h.ID_Mapel='PJOK' AND tb_r_n_uas_h.ID_Mapel='PJOK' AND tb_r_n_harian_k_h.ID_Mapel='PJOK'
               AND tb_r_n_harian_p_h.ID_Rombel = '$ID_Mapel'");
            foreach ($query->result() as $row)
            {
                echo $NI3=($row->N1+$row->N2+$row->N3+$row->N4)/4;
            }
        }
}
    // public function printNilai($ID_Nilai)
    // {
    //     // $data['dataNilai'] = $this->Model_laporan->dataTable();
    //     // $data['getrombel']= $this->Model_laporan->get_rmbl();

    //     $data=array
    //     (
    //         'dataNilai'=>$this->db->query("select * from tb_r_nilai_h a join tb_m_mapel b on a.ID_Mapel=b.ID_Mapel join tbl_tahun_akademik c on a.id_tahun_akademik=c.id_tahun_akademik join tb_m_rombel d on a.ID_Rombel=d.ID_Rombel join tb_m_guru e on d.ID_Rombel=e.ID_Rombel where a.ID_Nilai = '$ID_Nilai'")->result(),
    //         'dataNilaiM'=>$this->db->query("select * from tb_r_nilai_h a join tb_m_mapel b on a.ID_Mapel=b.ID_Mapel join tbl_tahun_akademik c on a.id_tahun_akademik=c.id_tahun_akademik join tb_m_rombel d on a.ID_Rombel=d.ID_Rombel join tb_m_guru e on a.ID_Mapel=e.ID_Mapel where a.ID_Nilai = '$ID_Nilai'")->result(),
    //         'dataNilaiD'=>$this->db->query("select * from tb_r_nilai_d a join tb_m_siswa b on a.NISN=b.NISN where a.ID_Nilai = '$ID_Nilai'")->result()
    //     );

    //     $output = $this->load->view('laporan/r_nilai',$data,true);
    //     return $this->gen_pdf($output);
    // }



    public function listnilai($id) 
    {

        $data=array(
            "id"=>$id,
             "getrow1" =>$this->db->query("SELECT * FROM tb_r_legger_h INNER JOIN tb_r_legger_d ON tb_r_legger_h.ID_Legger = tb_r_legger_d.ID_Legger INNER JOIN tb_m_siswa on tb_r_legger_h.NISN = tb_m_siswa.NISN INNER JOIN tb_m_mapel on tb_r_legger_d.ID_Mapel = tb_m_mapel.ID_Mapel INNER JOIN tbl_tahun_akademik on tb_r_legger_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik WHERE tb_r_legger_d.ID_Legger = '$id'")->result(),
             "getRata" =>$this->db->query("SELECT AVG (Nilai_KI3) AS Rata1 from tb_r_legger_d WHERE tb_r_legger_d.ID_Legger = '$id'")->result(),
             "getRataKI4" =>$this->db->query("SELECT AVG (Nilai_KI4) AS Rata2 from tb_r_legger_d WHERE tb_r_legger_d.ID_Legger = '$id'")->result(),
            "getrow"=>$this->db->where('ID_Legger',$id)->get('tb_r_legger_h')->row_array(),
            "getrow2"=>$this->db->where('ID_Legger',$id)->get('tb_r_legger_d')->row_array(),
            // "getrow1"=>$this->db->where('ID_laporan',$id)->get('tb_r_laporan_d')->row_array(),
            


            // "dataNilaiT" => $this->Model_laporan->dataTable1($id),
            
        "dataCmbSis" => $this->Model_laporan->getSw1(),
        "dataCmbMapel" => $this->Model_laporan->getCmbMapel(),
        "dataCmbThn" => $this->Model_laporan->getCmbThn(),
        "dataCmbRmbl" => $this->Model_laporan->getRmbl1(),
        // "rombel_selected" => $selected->ID_Rombel,
        // "siswa_selected" => $selected->NISN,
        );
        if(isset($_POST['submit'])){
            $this->Model_laporan->update();
            redirect('laporan');
        }else{
        $ID_Legger      = $this->uri->segment(3);
            $data['laporan'] = $this->db->get_where('tb_r_legger_h',array('ID_Legger'=>$id))->row_array();
                        $data['laporan1'] = $this->db->get_where('tb_r_legger_d',array('ID_Legger'=>$ID_Legger))->row_array();
            $this->template->load('template', 'laporan/edit',$data);
        }
        
    }
    
    function delete(){
        $ID_laporan = $this->uri->segment(3);
        if(!empty($ID_laporan)){
            // proses delete data
            $this->db->where('ID_laporan',$ID_laporan);
            $this->db->delete('tb_r_laporan_h');
                        $this->db->where('ID_laporan',$ID_laporan);
            $this->db->delete('tb_r_laporan_d');
        }
        redirect('laporan');
    }

    public function Nama($siswa)
    {
        $this->Model_laporan->getCmbSiswa($siswa);
    }

    public function listSiswa(){
    // Ambil data ID Provinsi yang dikirim via ajax post
    $ID_Rombel = $this->input->post('ID_Rombel');
    
    $siswa = $this->Model_laporan->viewByRombel($ID_Rombel);
    
    // Buat variabel untuk menampung tag-tag option nya
    // Set defaultnya dengan tag option Pilih
    $lists = "<option value=''>Pilih</option>";
    
    foreach($siswa as $data){
      $lists .= "<option value='".$data->NISN."'>".$data->Nama."</option>"; // Tambahkan tag option ke variabel $lists
    }
    
    $callback = array('list_siswa'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
    echo json_encode($callback); // konversi varibael $callback menjadi JSON
  }

    function deletedetail($id){
        $data=array(
             "getrow1" =>$this->db->query("SELECT * FROM tb_r_laporan_h INNER JOIN tb_r_laporan_d ON tb_r_laporan_h.ID_laporan = tb_r_laporan_d.ID_laporan INNER JOIN tb_m_siswa on tb_r_laporan_d.NISN = tb_m_siswa.NISN INNER JOIN tb_m_mapel on tb_r_laporan_h.ID_Mapel = tb_m_mapel.ID_Mapel INNER JOIN tbl_tahun_akademik on tb_r_laporan_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik WHERE tb_r_laporan_d.ID_laporan = '$id'")->result(),
            "getrow"=>$this->db->where('ID_laporan',$id)->get('tb_r_laporan_h')->row_array(),
            "getrow2"=>$this->db->where('ID_laporan',$id)->get('tb_r_laporan_d')->row_array(),
            // "getrow1"=>$this->db->where('ID_laporan',$id)->get('tb_r_laporan_d')->row_array(),
            


            // "dataNilaiT" => $this->Model_laporan->dataTable1($id),
            "id"=>$id,
        "dataCmbSis" => $this->Model_laporan->getCmbSiswa(),
        "dataCmbMapel" => $this->Model_laporan->getCmbMapel(),
        "dataCmbThn" => $this->Model_laporan->getCmbThn(),
        "dataCmbRmbl" => $this->Model_laporan->getCmbRmbl()
        );

        $ID_laporan = $this->uri->segment(3);

                $ID_laporan_D = $this->uri->segment(4);
        if (!empty($ID_laporan_D)) {
            $this->db->where('ID_laporan_D', $ID_laporan_D);
            $this->db->delete('tb_r_laporan_d');
        }
redirect('laporan/edit/'.$ID_laporan);
    }

}