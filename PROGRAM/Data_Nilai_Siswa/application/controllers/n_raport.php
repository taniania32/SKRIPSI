<?php

Class n_raport extends CI_Controller {

    function __construct() {
        parent::__construct();
        //chekAksesModule();
        $this->load->library('ssp');
        $this->load->model('Model_n_raport');
        $this->load->model('Model_Nilai_Tugas');
        $this->load->model('Model_n_rekap');

		$this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->database();
	    $this->load->helper(array('form','url'));
       
        $this->load->library('session');
      	
		
    }
	
	
	//controller
    function index() {

// $data=array
        // (

            
        //      "dataNilai" =>$this->db->query("SELECT *
        //       FROM tb_r_harian_p_d join tb_r_n_harian_p_h on tb_r_harian_p_d.ID_Nilai_H_P=tb_r_n_harian_p_h.ID_Nilai_H_P JOIN tb_r_n_uts_h on tb_r_n_harian_p_h.NISN=tb_r_n_uts_h.NISN JOIN tb_r_n_uts_d on tb_r_n_uts_d.ID_N_UTS=tb_r_n_uts_h.ID_N_UTS JOIN tb_m_siswa on tb_r_n_harian_p_h.NISN=tb_m_siswa.NISN JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_K JOIN tb_r_n_uas_h ON tb_r_n_harian_p_h.NISN=tb_r_n_uas_h.NISN join tb_r_n_uas_d on tb_r_n_uas_h.ID_N_UAS=tb_r_n_uas_d.ID_N_UAS join tb_m_rombel on tb_r_n_uts_h.ID_Rombel=tb_m_rombel.ID_Rombel join tbl_tahun_akademik on tb_r_n_uts_h.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik")->result(),
        // );

       $data['dataNilai'] = $this->Model_n_raport->dataTableN();
       $this->template->load('template', 'n_raport/list2',$data);


// $id_user=$this->session->userdata('username');

//         $data= array(
//             'dataNilai' => $this->db->query("SELECT * FROM tb_r_raport_h join tb_r_n_p_h ON tb_r_n_p_h.NISN = tb_r_raport_h.NISN join tb_r_n_p_D ON tb_r_n_p_h.ID_P_H = tb_r_n_p_D.ID_P_H join tb_r_n_harian_k_h ON tb_r_n_p_h.NISN = tb_r_n_harian_k_h.NISN join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K = tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa ON tb_r_n_p_h.NISN = tb_m_siswa.NISN join tb_m_rombel ON tb_r_n_p_h.ID_Rombel=tb_m_rombel.ID_Rombel join tb_m_guru ON tb_m_rombel.ID_Rombel=tb_m_guru.ID_Rombel JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel = tb_m_mapel.ID_Mapel JOIN tbl_tahun_akademik ON tb_r_n_p_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik where tb_r_raport_h.NISN='$id_user' group by tb_r_raport_h.NISN")->result()
//         );

//  $this->template->load('template', 'n_raport/list3',$data);

    }

function LISTS(){
  // $data['dataNilai'] = $this->Model_n_raport->dataTableN2();
      
$id_user=$this->session->userdata('username');
var_dump($id_user);
        $data['dataNilai'] = $this->db->query("SELECT * FROM tb_r_raport_h join tb_r_n_p_h ON tb_r_n_p_h.NISN = tb_r_raport_h.NISN join tb_r_n_p_D ON tb_r_n_p_h.ID_P_H = tb_r_n_p_D.ID_P_H join tb_r_n_harian_k_h ON tb_r_n_p_h.NISN = tb_r_n_harian_k_h.NISN join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K = tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa ON tb_r_n_p_h.NISN = tb_m_siswa.NISN join tb_m_rombel ON tb_r_n_p_h.ID_Rombel=tb_m_rombel.ID_Rombel join tb_m_guru ON tb_m_rombel.ID_Rombel=tb_m_guru.ID_Rombel JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel = tb_m_mapel.ID_Mapel JOIN tbl_tahun_akademik ON tb_r_n_p_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik where tb_r_raport_h.NISN='$id_user'");

 $this->template->load('template', 'n_raport/list3',$data);
    }

    function listNR(){
        $data=array
        (

            
             "dataNilaiT" =>$this->db->query("SELECT *
              FROM tb_r_n_p_h join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H  JOIN tb_r_n_harian_k_h ON tb_r_n_p_h.NISN=tb_r_n_harian_k_h.NISN JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_K join tb_m_siswa on tb_r_n_p_h.NISN=tb_m_siswa.NISN join tb_m_rombel on tb_r_n_p_h.ID_Rombel=tb_m_rombel.ID_Rombel join tbl_tahun_akademik on tb_r_n_p_h.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik WHERE tb_r_n_harian_k_h.S_R=0 AND tb_r_n_p_h.S_R=0 group by tb_r_n_p_h.NISN ")->result(),
        );
               // $data['dataNilaiT1'] = $this->Model_n_raport->dataTable();
       $this->template->load('template', 'n_raport/list',$data);
    }

        public function No_Induk($NISN)
    {
        $this->Model_n_raport->getIndukSiswa($NISN);
        
    }

    public function TB($NISN)
    {
        $this->Model_n_raport->getTB($NISN);
        
    }

        public function Nama_Mapel($NISN)
    {
        $data=array(
             "getrow1" =>$this->db->query("SELECT * FROM tb_r_nilai_h INNER JOIN tb_r_nilai_d ON tb_r_nilai_h.ID_Nilai = tb_r_nilai_d.ID_Nilai WHERE tb_r_nilai_d.NISN = '$NISN'")->result(),
        );
    }

        public function BB($NISN)
    {
        $this->Model_n_raport->getBB($NISN);
        
    }

       public function Penglihatan($NISN)
    {
        $this->Model_n_raport->getLihat($NISN);
        
    }

           public function Pendengaran($NISN)
    {
        $this->Model_n_raport->getDengar($NISN);
        
    }

               public function Gigi($NISN)
    {
        $this->Model_n_raport->getGigi($NISN);
        
    }

       public function NISN($NISN)
    {
        $this->Model_n_raport->getNISN1($NISN);
        
    }

           public function Nama_Rombel($NISN)
    {
        $this->Model_n_raport->getRombel($NISN);
        
    }
  
             public function tahun_akademik($NISN)
    {
        $this->Model_n_raport->getTahunAkademik($NISN);
        
    }

             public function Semester($NISN)
    {
        $this->Model_n_raport->getSemester($NISN);
        
    }

             public function Nilai_Pengetahuan($NISN)
    {
        $this->Model_n_raport->getNilaiP($NISN);
        
    }

   public function pencarian_d($NISN){
        return $this->db->query("SELECT * FROM tb_r_nilai_h INNER JOIN tb_r_nilai_d ON tb_r_nilai_h.ID_Nilai = tb_r_nilai_d.ID_Nilai
                INNER JOIN tb_m_mapel ON tb_m_mapel.ID_Mapel = tb_r_nilai_h.ID_Mapel WHERE tb_r_nilai_d.NISN='$NISN'");
    }


    function add($ID_Legger) {
        
        
        $data=array(
            'dataSw'=>$this->Model_n_raport->getSiswa(),
            'dataMpl'=>$this->Model_n_raport->getCmbMapel(),
             'getrow1' =>$this->db->query("SELECT * FROM tb_r_legger_h INNER JOIN tb_r_legger_d ON tb_r_legger_h.ID_Legger = tb_r_legger_d.ID_Legger
                INNER JOIN tb_m_siswa ON tb_m_mapel.ID_Mapel = tb_r_nilai_h.ID_Mapel")->result()
        );
        // $data['dataSw'] = $this->Model_n_raport->getSw2();

        $data['hasil'] = $this->Model_n_raport->pencarian_d($NISN)->result_array();

$this->template->load('template', 'n_raport/add',$data);

//         if (isset($_POST['submit'])) {

//             $this->Model_n_raport->save();
            
//         redirect('n_raport'); 
// }
//         else {
//             $this->template->load('template', 'n_raport/add',$data);
//         }
    }



    
    //     function edit(){       
    //     $data['dataCmbSis'] = $this->Model_Nilai_Tugas->getsw();
    //     $data['dataCmbMapel'] = $this->Model_Nilai_Tugas->getCmbMapel();
    //     $data['dataCmbThn'] = $this->Model_Nilai_Tugas->getCmbThn();

    //     $data['dataCmbRmbl'] = $this->Model_Nilai_Tugas->getCmbRmbl1();
    //     if(isset($_POST['submit'])){
    //         $this->Model_Nilai_Tugas->update();
    //                 $this->session->set_flashdata('success','Data Nilai Tugas telah berhasil diubah.');
    //         redirect('nilai_tugas');
    //     }else{
    //         $ID_Nilai_Tugas           = $this->uri->segment(3);
    //         $data['nilai_tugas'] = $this->db->get_where('tb_r_nilai_tugas',array('ID_Nilai_Tugas'=>$ID_Nilai_Tugas))->row_array();
    //         $this->template->load('template', 'nilai_tugas/edit',$data);
    //     }
    // }

    public function printNilai($ID_Raport)
    {
        // $data['dataNilai'] = $this->Model_Nilai_Tugas->dataTable();
        // $data['getrombel']= $this->Model_Nilai_Tugas->get_rmbl();

        

        $data=array
        (

            'dataR'=>$this->db->query("SELECT *, (case when AVG(tb_r_n_p_D.N_R) >= 90 then 'A' when AVG(tb_r_n_p_D.N_R) > 80 then 'B' WHEN AVG(tb_r_n_p_D.N_R)<90 THEN 'B' when AVG(tb_r_n_p_D.N_R) > 70 THEN 'C' WHEN AVG(tb_r_n_p_D.N_R)<=80 then 'C' ELSE 'D' END) as NI3,(case when AVG(tb_r_harian_k_d.N_N) >= 90 then 'A' when AVG(tb_r_harian_k_d.N_N) > 80 then 'B' WHEN AVG(tb_r_harian_k_d.N_N)<90 THEN 'B' when AVG(tb_r_harian_k_d.N_N) > 70 THEN 'C' WHEN AVG(tb_r_harian_k_d.N_N)<=80 then 'C' ELSE 'D' END) as NI4

              FROM tb_r_n_p_h join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H  JOIN tb_r_n_harian_k_h ON tb_r_n_p_h.NISN=tb_r_n_harian_k_h.NISN join tb_r_raport_h ON tb_r_n_p_h.NISN=tb_r_raport_h.NISN JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_K join tb_m_rombel on tb_r_n_p_h.ID_Rombel=tb_m_rombel.ID_Rombel join tb_m_mapel on tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel join tbl_tahun_akademik on tb_r_n_p_h.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik JOIN tb_m_siswa on tb_r_n_p_h.NISN=tb_m_siswa.NISN WHERE tb_r_raport_h.ID_Raport = '$ID_Raport'")->result(),

"getrowAG" =>$this->db->query("SELECT *, (case when tb_r_n_p_h.ID_Mapel = 'AGAMA' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as AG_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'AGAMA' then  AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as AG_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN INNER join tb_r_raport_h on tb_r_raport_h.NISN=tb_r_n_p_h.NISN WHERE tb_r_raport_h.ID_Raport='$ID_Raport' AND tb_r_n_p_h.ID_Mapel='AGAMA' AND TB_R_DESKRIPSI.ID_Mapel='AGAMA' group by tb_r_n_p_h.NISN ")->result(),
             
"getrowPK" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'PKN' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as PK_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'PKN' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as PK_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN INNER join tb_r_raport_h on tb_r_raport_h.NISN=tb_r_n_p_h.NISN WHERE tb_r_raport_h.ID_Raport='$ID_Raport' AND tb_r_n_p_h.ID_Mapel='PKN' AND TB_R_DESKRIPSI.ID_Mapel='PKN' group by tb_r_n_p_h.NISN ")->result(),

"getrowBI" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'B_INDO' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as BI_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'B_INDO' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as BI_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN INNER join tb_r_raport_h on tb_r_raport_h.NISN=tb_r_n_p_h.NISN WHERE tb_r_raport_h.ID_Raport='$ID_Raport' AND tb_r_n_p_h.ID_Mapel='B_INDO' AND TB_R_DESKRIPSI.ID_Mapel='B_INDO' group by tb_r_n_p_h.NISN ")->result(),

"getrowMTK" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'MTK' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as MT_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'MTK' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as MT_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN INNER join tb_r_raport_h on tb_r_raport_h.NISN=tb_r_n_p_h.NISN WHERE tb_r_raport_h.ID_Raport='$ID_Raport' AND tb_r_n_p_h.ID_Mapel='MTK' AND TB_R_DESKRIPSI.ID_Mapel='MTK' group by tb_r_n_p_h.NISN ")->result(),

            "getrow"=>$this->db->where('NISN',$id)->get('tb_r_n_p_h')->row_array(),
            "getrow4"=>$this->db->query("SELECT * FROM tb_r_n_p_h left JOIN tb_m_siswa on tb_r_n_p_h.NISN = tb_m_siswa.NISN WHERE tb_r_n_p_h.NISN = '$id' group by tb_r_n_p_h.NISN")->result(),

"getrowIPS" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'IPS' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as IPS_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'IPS' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as IPS_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN INNER join tb_r_raport_h on tb_r_raport_h.NISN=tb_r_n_p_h.NISN WHERE tb_r_raport_h.ID_Raport='$ID_Raport' AND tb_r_n_p_h.ID_Mapel='IPS' AND TB_R_DESKRIPSI.ID_Mapel='IPS' group by tb_r_n_p_h.NISN ")->result(),

            


            "getrowSB" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'SBdP' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as SB_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'SBdP' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as SB_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN INNER join tb_r_raport_h on tb_r_raport_h.NISN=tb_r_n_p_h.NISN WHERE tb_r_raport_h.ID_Raport='$ID_Raport' AND tb_r_n_p_h.ID_Mapel='SBdP' AND TB_R_DESKRIPSI.ID_Mapel='SBdP' group by tb_r_n_p_h.NISN ")->result(),

            "getrowPJ" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'PJOK' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as PJ_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'PJOK' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as PJ_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN INNER join tb_r_raport_h on tb_r_raport_h.NISN=tb_r_n_p_h.NISN WHERE tb_r_raport_h.ID_Raport='$ID_Raport' AND tb_r_n_p_h.ID_Mapel='PJOK' AND TB_R_DESKRIPSI.ID_Mapel='PJOK' group by tb_r_n_p_h.NISN ")->result(),

             "getrowMK1" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'MULOK1' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as MK1_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'MULOK1' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as MK1_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN INNER join tb_r_raport_h on tb_r_raport_h.NISN=tb_r_n_p_h.NISN WHERE tb_r_raport_h.ID_Raport='$ID_Raport' AND tb_r_n_p_h.ID_Mapel='MULOK1' AND TB_R_DESKRIPSI.ID_Mapel='MULOK1' group by tb_r_n_p_h.NISN ")->result(),

                          "getrowMK2" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'MULOK2' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as MK2_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'MULOK2' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as MK2_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN INNER join tb_r_raport_h on tb_r_raport_h.NISN=tb_r_n_p_h.NISN WHERE tb_r_raport_h.ID_Raport='$ID_Raport' AND tb_r_n_p_h.ID_Mapel='MULOK2' AND TB_R_DESKRIPSI.ID_Mapel='MULOK2' group by tb_r_n_p_h.NISN ")->result(),

            "getrowIPA" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'IPA' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as IPA_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'IPA' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as IPA_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN INNER join tb_r_raport_h on tb_r_raport_h.NISN=tb_r_n_p_h.NISN WHERE tb_r_raport_h.ID_Raport='$ID_Raport' AND tb_r_n_p_h.ID_Mapel='IPA' AND TB_R_DESKRIPSI.ID_Mapel='IPA' group by tb_r_n_p_h.NISN ")->result(),


'dataP'=>$this->db->query("SELECT * from tb_r_raport_h where tb_r_raport_h.ID_Raport = '$ID_Raport'")->result(),

            'dataE'=>$this->db->query("SELECT * from tb_m_ekskul join tb_r_raport_h on tb_r_raport_h.ID_Ekskul= tb_m_ekskul.ID_Ekskul where tb_r_raport_h.ID_Raport = '$ID_Raport'")->result(),
            
            'dataAb'=>$this->db->query("SELECT * from tb_r_absen join tb_r_raport_h on tb_r_raport_h.NISN= tb_r_absen.NISN where tb_r_raport_h.ID_Raport = '$ID_Raport'")->result(),

            'dataTB'=>$this->db->query("SELECT * from tb_m_tb_bb join tb_r_raport_h on tb_r_raport_h.NISN= tb_m_tb_bb.NISN where tb_r_raport_h.ID_Raport = '$ID_Raport'")->result(),


            'dataA'=>$this->db->query("SELECT * from tb_r_raport_h join tb_r_n_p_h on tb_r_raport_h.NISN=tb_r_n_p_h.NISN JOIN tb_r_n_harian_k_h ON tb_r_raport_h.NISN=tb_r_n_harian_k_h.NISN where tb_r_raport_h.ID_Raport = '$ID_Raport'")->result(),

            'dataNilai2'=>$this->db->query("SELECT * from tb_r_raport_h join tb_m_siswa on tb_r_raport_h.NISN=tb_m_siswa.NISN JOIN tb_m_rombel ON tb_m_rombel.ID_Rombel=tb_m_siswa.ID_Rombel JOIN tb_m_guru ON tb_m_siswa.ID_Rombel=tb_m_guru.ID_Rombel JOIN TB_M_TIPE_GURU ON tb_m_guru.ID_Tipe_Guru=tb_m_guru.ID_Tipe_Guru JOIN tb_r_n_p_h ON tb_r_raport_h.NISN=tb_r_n_p_h.NISN JOIN tbl_tahun_akademik ON tbl_tahun_akademik.id_tahun_akademik=tb_r_n_p_h.id_tahun_akademik  where tb_r_raport_h.ID_Raport = '$ID_Raport'")->result(),
        );
// $data['dataNilai2'] = $this->Model_n_raport->dataTableN();
// $data['dataTB'] = $this->Model_n_raport->data2();

        $output = $this->load->view('n_raport/r_raport',$data,true);
        return $this->gen_pdf($output);
    }

    public function gen_pdf($html){
        ob_start();
         $this->load->library('MPDF56/mpdf');
         $mpdf=new mPDF('utf-8', $paper = 'A4' );
         ob_clean();
         $mpdf->WriteHTML($html);
         $mpdf->Output();
    }

   public function listnilai($id) 
    {
    
        if(isset($_POST['submit'])){

            $this->Model_n_raport->save();
            redirect('n_raport');
        }else{

    
    $data=array(
            "id"=>$id,
             "getrow1" =>$this->db->query("SELECT *,(case when AVG(tb_r_n_p_D.N_R) >= 90 then 'A' when AVG(tb_r_n_p_D.N_R) > 80 then 'B' WHEN AVG(tb_r_n_p_D.N_R)<90 THEN 'B' when AVG(tb_r_n_p_D.N_R) > 70 THEN 'C' WHEN AVG(tb_r_n_p_D.N_R)<=80 then 'C' ELSE 'D' END) as NI3,(case when AVG(tb_r_harian_k_d.N_N) >= 90 then 'A' when AVG(tb_r_harian_k_d.N_N) > 80 then 'B' WHEN AVG(tb_r_harian_k_d.N_N)<90 THEN 'B' when AVG(tb_r_harian_k_d.N_N) > 70 THEN 'C' WHEN AVG(tb_r_harian_k_d.N_N)<=80 then 'C' ELSE 'D' END) as NI4

              FROM tb_r_n_p_h join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H  JOIN tb_r_n_harian_k_h ON tb_r_n_p_h.NISN=tb_r_n_harian_k_h.NISN JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_K join tb_m_rombel on tb_r_n_p_h.ID_Rombel=tb_m_rombel.ID_Rombel join tb_m_mapel on tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel join tbl_tahun_akademik on tb_r_n_p_h.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik JOIN tb_m_siswa on tb_r_n_p_h.NISN=tb_m_siswa.NISN WHERE tb_r_n_p_h.NISN='$id'")->result(),

             "getrowAG" =>$this->db->query("SELECT *, (case when tb_r_n_p_h.ID_Mapel = 'AGAMA' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as AG_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'AGAMA' then  AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as AG_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN WHERE tb_r_n_p_h.NISN='$id' AND tb_r_n_p_h.ID_Mapel='AGAMA' AND TB_R_DESKRIPSI.ID_Mapel='AGAMA' group by tb_r_n_p_h.NISN ")->result(),
             
"getrowPK" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'PKN' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as PK_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'PKN' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as PK_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN WHERE tb_r_n_p_h.NISN='$id' AND tb_r_n_p_h.ID_Mapel='PKN' AND TB_R_DESKRIPSI.ID_Mapel='PKN' group by tb_r_n_p_h.NISN ")->result(),

"getrowBI" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'B_INDO' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as BI_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'B_INDO' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as BI_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN WHERE tb_r_n_p_h.NISN='$id' AND tb_r_n_p_h.ID_Mapel='B_INDO' AND TB_R_DESKRIPSI.ID_Mapel='B_INDO' group by tb_r_n_p_h.NISN ")->result(),

"getrowMTK" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'MTK' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as MT_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'MTK' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as MT_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN WHERE tb_r_n_p_h.NISN='$id' AND tb_r_n_p_h.ID_Mapel='MTK' AND TB_R_DESKRIPSI.ID_Mapel='MTK' group by tb_r_n_p_h.NISN ")->result(),

            "getrow"=>$this->db->where('NISN',$id)->get('tb_r_n_p_h')->row_array(),
            "getrow4"=>$this->db->query("SELECT * FROM tb_r_n_p_h left JOIN tb_m_siswa on tb_r_n_p_h.NISN = tb_m_siswa.NISN WHERE tb_r_n_p_h.NISN = '$id' group by tb_r_n_p_h.NISN")->result(),

"getrowIPS" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'IPS' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as IPS_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'IPS' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as IPS_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN WHERE tb_r_n_p_h.NISN='$id' AND tb_r_n_p_h.ID_Mapel='IPS' AND TB_R_DESKRIPSI.ID_Mapel='IPS' group by tb_r_n_p_h.NISN ")->result(),

            "getrow"=>$this->db->where('NISN',$id)->get('tb_r_n_p_h')->row_array(),
            "getrow4"=>$this->db->query("SELECT * FROM tb_r_n_p_h left JOIN tb_m_siswa on tb_r_n_p_h.NISN = tb_m_siswa.NISN WHERE tb_r_n_p_h.NISN = '$id' group by tb_r_n_p_h.NISN")->result(),


            "getrowSB" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'SBdP' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as SB_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'SBdP' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as SB_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN WHERE tb_r_n_p_h.NISN='$id' AND tb_r_n_p_h.ID_Mapel='SBdP' AND TB_R_DESKRIPSI.ID_Mapel='SBdP' group by tb_r_n_p_h.NISN ")->result(),

            "getrowPJ" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'PJOK' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as PJ_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'PJOK' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as PJ_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN WHERE tb_r_n_p_h.NISN='$id' AND tb_r_n_p_h.ID_Mapel='PJOK' AND TB_R_DESKRIPSI.ID_Mapel='PJOK' group by tb_r_n_p_h.NISN ")->result(),

             "getrowMK1" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'MULOK1' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as MK1_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'MULOK1' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as MK1_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN WHERE tb_r_n_p_h.NISN='$id' AND tb_r_n_p_h.ID_Mapel='MULOK1' AND TB_R_DESKRIPSI.ID_Mapel='MULOK1' group by tb_r_n_p_h.NISN ")->result(),

                          "getrowMK2" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'MULOK2' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as MK2_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'MULOK2' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as MK2_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN WHERE tb_r_n_p_h.NISN='$id' AND tb_r_n_p_h.ID_Mapel='MULOK2' AND TB_R_DESKRIPSI.ID_Mapel='MULOK2' group by tb_r_n_p_h.NISN ")->result(),

            "getrow"=>$this->db->where('NISN',$id)->get('tb_r_n_p_h')->row_array(),
            "getrow4"=>$this->db->query("SELECT * FROM tb_r_n_p_h left JOIN tb_m_siswa on tb_r_n_p_h.NISN = tb_m_siswa.NISN WHERE tb_r_n_p_h.NISN = '$id' group by tb_r_n_p_h.NISN")->result(),


            "getrowIPA" =>$this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'IPA' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as IPA_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'IPA' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as IPA_KI4
              FROM tb_r_n_p_h INNER join tb_r_n_p_d on tb_r_n_p_h.ID_P_H=tb_r_n_p_D.ID_P_H INNER JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_n_harian_k_h.NISN INNER JOIN tb_r_harian_k_d on tb_r_harian_k_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_k INNER JOIN tb_m_mapel ON tb_r_n_p_h.ID_Mapel=tb_m_mapel.ID_Mapel INNER JOIN TB_R_DESKRIPSI ON tb_r_n_p_h.NISN=TB_R_DESKRIPSI.NISN WHERE tb_r_n_p_h.NISN='$id' AND tb_r_n_p_h.ID_Mapel='IPA' AND TB_R_DESKRIPSI.ID_Mapel='IPA' group by tb_r_n_p_h.NISN ")->result(),

            "getrow"=>$this->db->where('NISN',$id)->get('tb_r_n_p_h')->row_array(),
            "getrow4"=>$this->db->query("SELECT * FROM tb_r_n_p_h left JOIN tb_m_siswa on tb_r_n_p_h.NISN = tb_m_siswa.NISN WHERE tb_r_n_p_h.NISN = '$id' group by tb_r_n_p_h.NISN")->result(),

            "getAb"=>$this->db->query("SELECT * FROM tb_r_absen WHERE NISN = '$id'")->result(),

"getrow3"=>$this->db->query("SELECT * FROM tb_r_n_p_h JOIN tb_m_tb_bb on tb_r_n_p_h.NISN=tb_m_tb_bb.NISN WHERE tb_r_n_p_h.NISN = '$id' group by tb_r_n_p_h.NISN")->result(),
             "getRata" =>$this->db->query("SELECT AVG (N_R) AS Rata1 from tb_r_n_p_D A JOIN tb_r_n_p_h B ON A.ID_P_H=B.ID_P_H WHERE B.NISN = '$id'")->result(),
             "getRataKI4" =>$this->db->query("SELECT AVG (N_N) AS Rata2 from tb_r_harian_k_d A JOIN tb_r_n_harian_k_h B ON A.ID_Nilai_H_K=B.ID_Nilai_H_K WHERE B.NISN = '$id'")->result(),
            
        "dataCmbSis" => $this->Model_Nilai_Tugas->getSw1(),
        "dataCmbMapel" => $this->Model_Nilai_Tugas->getCmbMapel(),
        "dataCmbThn" => $this->Model_Nilai_Tugas->getCmbThn(),
        "dataCmbRmbl" => $this->Model_Nilai_Tugas->getRmbl1(),
        "dataCmbEks" => $this->Model_n_raport->getEkskul(),

        'ID_Raport'=>$this->Model_n_raport->getID(),
        );

        $NISN      = $this->uri->segment(3);
        // $ID_P_H      = $this->uri->segment(4);
        $data['n_raport'] = $this->db->get_where('tb_r_n_p_h',array('NISN'=>$NISN))->row_array();
        $this->template->load('template', 'n_raport/edit',$data);
    

        }
        
    }

// public function printN()
//     {
//         // $data['dataNilai'] = $this->Model_Nilai_Tugas->dataTable();
//         $data['dataNilai'] = $this->Model_Nilai_Tugas->dataTable2();
//         $data['dataNilai1'] = $this->Model_Nilai_Tugas->dataTable3();
//         $data['dataNilai2'] = $this->Model_Nilai_Tugas->dt4();
//         $data['dataNilai3'] = $this->Model_Nilai_Tugas->dt5();
//         $data['dataKKM'] = $this->Model_Nilai_Tugas->getKKM();
//         $data['dataKI'] = $this->Model_Nilai_Tugas->dataNi();

//         //         $data=array
//         // (
//         //     'dataNilai'=>$this->db->query("select * from tb_r_nilai_h a join tb_m_mapel b on a.ID_Mapel=b.ID_Mapel join tbl_tahun_akademik c on a.id_tahun_akademik=c.id_tahun_akademik join tb_m_rombel d on a.ID_Rombel=d.ID_Rombel join tb_m_guru e on d.ID_Rombel=e.ID_Rombel where a.ID_Nilai = '$ID_Nilai'")->result(),
//         // );
//         $output = $this->load->view('Nilai_Tugas/r_nilai',$data,true);
//         return $this->gen_pdf($output);
//     }

//             public function KKM($ID_Mapel)
//     {
//         $this->Model_Nilai_Tugas->getKKM1($ID_Mapel);
        
//     }

//     public function gen_pdf($html){
//         ob_start();
//          $this->load->library('MPDF56/mpdf');
//          $mpdf=new mPDF('utf-8', $paper = 'A4-L' );
//          ob_clean();
//          $mpdf->WriteHTML($html);
//          $mpdf->Output();
//     }

function add2(){
     // if (isset($_POST['submit'])) {
            $ID_Legger      = $this->uri->segment(3);
        $data['n_raport'] = $this->db->get_where('tb_r_legger_h',array('ID_Legger'=>$id))->row_array();

            $this->Model_n_raport->save();
            
//         redirect('n_raport'); 
// }
//         else {
//             $this->template->load('template', 'n_raport/list2',$data);
//         }
}
    function ketercapaian_kopetensi($Nilai_KI3){
        $Nilai_KI3=$_POST['Nilai_KI3'];
        if($Nilai_KI3>90){
            return 'Sangat baik';
        }elseif($Nilai_KI3>80 and $Nilai_KI3<=90){
            return 'Baik';
        }elseif($Nilai_KI3>75 and $Nilai_KI3<=80){
            return 'Cukup';
        }else{
            return "Kurang";
        }
    }
    
    function delete(){
        $ID_Nilai_Tugas = $this->uri->segment(3);
        if(!empty($ID_Nilai_Tugas)){
            // proses delete data
            $this->db->where('ID_Nilai_Tugas',$ID_Nilai_Tugas);
            $this->db->delete('tb_r_nilai_tugas_h');
                        $this->db->where('ID_Nilai_Tugas',$ID_Nilai_Tugas);
            $this->db->delete('tb_r_nilai_tugas_d');
        }
        redirect('nilai_tugas');
    }

    public function Nama($siswa)
    {
        $this->Model_Nilai_Tugas->getCmbSiswa($siswa);
    }

    public function listSiswa(){
    // Ambil data ID Provinsi yang dikirim via ajax post
    $ID_Rombel = $this->input->post('ID_Rombel');
    
    $siswa = $this->Model_Nilai_Tugas->viewByRombel($ID_Rombel);
    
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
             "getrow1" =>$this->db->query("SELECT * FROM tb_r_nilai_tugas_h INNER JOIN tb_r_nilai_tugas_d ON tb_r_nilai_tugas_h.ID_Nilai_Tugas = tb_r_nilai_tugas_d.ID_Nilai_Tugas INNER JOIN tb_m_siswa on tb_r_nilai_tugas_d.NISN = tb_m_siswa.NISN INNER JOIN tb_m_mapel on tb_r_nilai_tugas_h.ID_Mapel = tb_m_mapel.ID_Mapel INNER JOIN tbl_tahun_akademik on tb_r_nilai_tugas_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik WHERE tb_r_nilai_tugas_d.ID_Nilai_Tugas = '$id'")->result(),
            "getrow"=>$this->db->where('ID_Nilai_Tugas',$id)->get('tb_r_nilai_tugas_h')->row_array(),
            "getrow2"=>$this->db->where('ID_Nilai_Tugas',$id)->get('tb_r_nilai_tugas_d')->row_array(),
            // "getrow1"=>$this->db->where('ID_Nilai_Tugas',$id)->get('tb_r_nilai_tugas_d')->row_array(),
            


            // "dataNilaiT" => $this->Model_Nilai_Tugas->dataTable1($id),
            "id"=>$id,
        "dataCmbSis" => $this->Model_Nilai_Tugas->getCmbSiswa(),
        "dataCmbMapel" => $this->Model_Nilai_Tugas->getCmbMapel(),
        "dataCmbThn" => $this->Model_Nilai_Tugas->getCmbThn(),
        "dataCmbRmbl" => $this->Model_Nilai_Tugas->getCmbRmbl()
        );

        $ID_Nilai_Tugas = $this->uri->segment(3);

                $ID_Nilai_Tugas_D = $this->uri->segment(4);
        if (!empty($ID_Nilai_Tugas_D)) {
            $this->db->where('ID_Nilai_Tugas_D', $ID_Nilai_Tugas_D);
            $this->db->delete('tb_r_nilai_tugas_d');
        }
redirect('nilai_tugas/edit/'.$ID_Nilai_Tugas);
    }

}