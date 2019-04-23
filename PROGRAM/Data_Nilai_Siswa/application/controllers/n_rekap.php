<?php

Class n_rekap extends CI_Controller {

    function __construct() {
        parent::__construct();
        //chekAksesModule();
        $this->load->library('ssp');
        $this->load->model('Model_n_rekap');
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

       $data['dataNilai'] = $this->Model_n_rekap->dataTable();
       $this->template->load('template', 'n_rekap/list',$data);
}
public function printNilai($ID_Rombel)
    {
        

        $data=array
        (

            
             "getrow1" =>$this->db->query("SELECT *,tb_r_n_p_h.NISN,(case when tb_r_n_p_d.ID_KD = 1 then tb_r_n_p_d.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_n_p_d.ID_KD = 3 then tb_r_n_p_d.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_n_p_d.ID_KD  = 4  then tb_r_n_p_d.N_R ELSE 0 END) AS N3,
             MAX(case when tb_r_harian_K_d.ID_KD = 2 then tb_r_harian_K_d.N_N ELSE 0 END) AS N4,
             MAX(case when tb_r_harian_K_d.ID_KD = 5 then tb_r_harian_K_d.N_N ELSE 0 END) AS N5,
             MAX(case when tb_r_harian_K_d.ID_KD = 6 then tb_r_harian_K_d.N_N ELSE 0 END) AS N6,

            (SUM(case when tb_r_n_p_H.ID_Mapel='PKN' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='PKN' then (tb_r_n_p_D.N_R) END))  as Rata1,
                        (SUM(case when tb_r_n_harian_k_h.ID_Mapel='PKN' then (tb_r_harian_K_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='PKN' then (tb_r_harian_K_d.N_N) END))  as Rata2
              FROM tb_r_n_p_d join tb_r_n_p_H on tb_r_n_p_D.ID_P_H=tb_r_n_p_H.ID_P_H join tb_m_siswa on tb_r_n_p_H.NISN=tb_m_siswa.NISN join tb_r_n_harian_k_h ON tb_r_n_p_H.NISN=tb_r_n_harian_k_h.NISN JOIN tb_r_harian_k_d ON tb_r_harian_K_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_K WHERE tb_r_n_p_H.ID_Mapel='PKN' AND tb_r_n_harian_k_h.ID_Mapel='PKN'
               AND tb_r_n_p_H.ID_Rombel = '$ID_Rombel'GROUP BY tb_r_n_p_h.NISN")->result(),
        );
        $data['dataSiswa'] = $this->Model_siswa->dataTable();


        $output = $this->load->view('n_rekap/print',$data,true);
        return $this->gen_pdf($output);
    }

public function printNilaiPJ($ID_Rombel)
    {
        

        $data=array
        (

            
            "getrow1" =>$this->db->query("SELECT *,MAX(case when tb_r_n_p_D.ID_KD = 83 then tb_r_n_p_D.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_n_p_D.ID_KD = 84 then tb_r_n_p_D.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_n_p_D.ID_KD = 85 then tb_r_n_p_D.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_n_p_D.ID_KD = 86 then tb_r_n_p_D.N_R ELSE 0 END) AS N4,
             MAX(case when tb_r_harian_k_d.ID_KD = 87 then tb_r_harian_k_d.N_N ELSE 0 END) AS N5,
             MAX(case when tb_r_harian_k_d.ID_KD = 88 then tb_r_harian_k_d.N_N ELSE 0 END) AS N6,
             MAX(case when tb_r_harian_k_d.ID_KD = 89 then tb_r_harian_k_d.N_N ELSE 0 END) AS N7,
             MAX(case when tb_r_harian_k_d.ID_KD = 90 then tb_r_harian_k_d.N_N ELSE 0 END) AS N8,
              

              (SUM(case when tb_r_n_p_H.ID_Mapel='PJOK' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='PJOK' then (tb_r_n_p_D.N_R) END))  as RATA1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='PJOK' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='PJOK' then (tb_r_harian_k_d.N_N) END))  as RATA2

             FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN WHERE tb_r_N_p_h.ID_Mapel='PJOK' AND tb_r_N_p_h.ID_Rombel = '$ID_Rombel' GROUP BY
              tb_r_N_p_H.NISN")->result(),
        );
        $data['dataSiswa'] = $this->Model_siswa->dataTable();


        $output = $this->load->view('n_rekap/printPJ',$data,true);
        return $this->gen_pdf($output);
    }

public function printNilaiAG($ID_Rombel)
    {
        

        $data=array
        (

            
            "getrow1" =>$this->db->query("SELECT *,MAX(case when tb_r_N_p_D.ID_KD = 63 then tb_r_N_p_D.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_N_p_D.ID_KD = 64 then tb_r_N_p_D.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_N_p_D.ID_KD = 65 then tb_r_N_p_D.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_N_p_D.ID_KD = 66 then tb_r_N_p_D.N_R ELSE 0 END) AS N4,
MAX(case when tb_r_N_p_D.ID_KD = 67 then tb_r_N_p_D.N_R ELSE 0 END) AS N5,
MAX(case when tb_r_N_p_D.ID_KD = 68 then tb_r_N_p_D.N_R ELSE 0 END) AS N6,
MAX(case when tb_r_N_p_D.ID_KD = 69 then tb_r_N_p_D.N_R ELSE 0 END) AS N7,
MAX(case when tb_r_N_p_D.ID_KD = 70 then tb_r_N_p_D.N_R ELSE 0 END) AS N8,
MAX(case when tb_r_N_p_D.ID_KD = 71 then tb_r_N_p_D.N_R ELSE 0 END) AS N9,
MAX(case when tb_r_N_p_D.ID_KD = 72 then tb_r_N_p_D.N_R ELSE 0 END) AS N10,
             MAX(case when tb_r_harian_k_d.ID_KD = 73 then tb_r_harian_k_d.N_N ELSE 0 END) AS N11,
             MAX(case when tb_r_harian_k_d.ID_KD = 74 then tb_r_harian_k_d.N_N ELSE 0 END) AS N12,
             MAX(case when tb_r_harian_k_d.ID_KD = 75 then tb_r_harian_k_d.N_N ELSE 0 END) AS N13,
             MAX(case when tb_r_harian_k_d.ID_KD = 76 then tb_r_harian_k_d.N_N ELSE 0 END) AS N14,
             MAX(case when tb_r_harian_k_d.ID_KD = 77 then tb_r_harian_k_d.N_N ELSE 0 END) AS N15,
             MAX(case when tb_r_harian_k_d.ID_KD = 78 then tb_r_harian_k_d.N_N ELSE 0 END) AS N16,
             MAX(case when tb_r_harian_k_d.ID_KD = 79 then tb_r_harian_k_d.N_N ELSE 0 END) AS N17,
             MAX(case when tb_r_harian_k_d.ID_KD = 80 then tb_r_harian_k_d.N_N ELSE 0 END) AS N18,
             MAX(case when tb_r_harian_k_d.ID_KD = 81 then tb_r_harian_k_d.N_N ELSE 0 END) AS N19,
             MAX(case when tb_r_harian_k_d.ID_KD = 82 then tb_r_harian_k_d.N_N ELSE 0 END) AS N20,
             
            (SUM(case when tb_r_n_p_H.ID_Mapel='AGAMA' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='AGAMA' then (tb_r_n_p_D.N_R) END))  as RATA1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='AGAMA' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='AGAMA' then (tb_r_harian_k_d.N_N) END))  as RATA2

             FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN WHERE tb_r_N_p_h.ID_Mapel='AGAMA' AND tb_r_N_p_h.ID_Rombel = '$ID_Rombel' GROUP BY
              tb_r_N_p_H.NISN")->result(),
        );
        $data['dataSiswa'] = $this->Model_siswa->dataTable();


        $output = $this->load->view('n_rekap/printAG',$data,true);
        return $this->gen_pdf($output);
    }


    public function printNilaiSB($ID_Rombel)
    {
        

        $data=array
        (

            
              "getrow1" =>$this->db->query("SELECT *,MAX(case when tb_r_n_p_D.ID_KD = 55  then tb_r_n_p_D.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_n_p_D.ID_KD = 56 then tb_r_n_p_D.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_n_p_D.ID_KD = 57 then tb_r_n_p_D.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_n_p_D.ID_KD = 58 then tb_r_n_p_D.N_R ELSE 0 END) AS N4,
             MAX(case when tb_r_harian_k_d.ID_KD = 59 then tb_r_harian_k_d.N_N ELSE 0 END) AS N5,
             MAX(case when tb_r_harian_k_d.ID_KD = 60 then tb_r_harian_k_d.N_N ELSE 0 END) AS N6,
             MAX(case when tb_r_harian_k_d.ID_KD = 61 then tb_r_harian_k_d.N_N ELSE 0 END) AS N7,
             MAX(case when tb_r_harian_k_d.ID_KD = 62 then tb_r_harian_k_d.N_N ELSE 0 END) AS N8,

 (SUM(case when tb_r_n_p_H.ID_Mapel='SBdP' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='SBdP' then (tb_r_n_p_D.N_R) END))  as RATA1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='SBdP' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='SBdP' then (tb_r_harian_k_d.N_N) END))  as RATA2

             FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN WHERE tb_r_N_p_h.ID_Mapel='SBdP' AND tb_r_N_p_h.ID_Rombel = '$ID_Rombel' GROUP BY
              tb_r_N_p_H.NISN")->result(),
        );
        $data['dataSiswa'] = $this->Model_siswa->dataTable();


        $output = $this->load->view('n_rekap/printSB',$data,true);
        return $this->gen_pdf($output);
    }




    public function printNilaiBI($ID_Rombel)
    {
        

        $data=array
        (

            
             "getrow1" =>$this->db->query("SELECT *,tb_r_N_p_H.NISN,(case when tb_r_N_p_D.ID_KD = 7  then N_R ELSE 0 END) AS N1,
MAX(case when tb_r_N_p_D.ID_KD = 8 AND tb_r_N_p_D.ID_P_H=tb_r_N_p_D.ID_P_H then tb_r_N_p_D.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_N_p_D.ID_KD = 9 then tb_r_N_p_D.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_N_p_D.ID_KD = 10 then tb_r_N_p_D.N_R ELSE 0 END) AS N4,
MAX(case when tb_r_N_p_D.ID_KD = 11  then tb_r_N_p_D.N_R ELSE 0 END) AS N5,
MAX(case when tb_r_N_p_D.ID_KD = 12 then tb_r_N_p_D.N_R ELSE 0 END) AS N6,
MAX(case when tb_r_N_p_D.ID_KD = 13 then tb_r_N_p_D.N_R ELSE 0 END) AS N7,
MAX(case when tb_r_N_p_D.ID_KD = 14 then tb_r_N_p_D.N_R ELSE 0 END) AS N8,
             MAX(case when tb_r_harian_k_d.ID_KD = 15 then tb_r_harian_k_d.N_N ELSE 0 END) AS N9,
             MAX(case when tb_r_harian_k_d.ID_KD = 16 then tb_r_harian_k_d.N_N ELSE 0 END) AS N10,
             MAX(case when tb_r_harian_k_d.ID_KD = 17 then tb_r_harian_k_d.N_N ELSE 0 END) AS N11,
             MAX(case when tb_r_harian_k_d.ID_KD = 18 then tb_r_harian_k_d.N_N ELSE 0 END) AS N12,
             MAX(case when tb_r_harian_k_d.ID_KD = 19 then tb_r_harian_k_d.N_N ELSE 0 END) AS N13,
             MAX(case when tb_r_harian_k_d.ID_KD = 20 then tb_r_harian_k_d.N_N ELSE 0 END) AS N14,
             MAX(case when tb_r_harian_k_d.ID_KD = 21 then tb_r_harian_k_d.N_N ELSE 0 END) AS N15,
             MAX(case when tb_r_harian_k_d.ID_KD = 22 then tb_r_harian_k_d.N_N ELSE 0 END) AS N16,

                         (SUM(case when tb_r_n_p_H.ID_Mapel='B_INDO' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='B_INDO' then (tb_r_n_p_D.N_R) END))  as Rata1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='B_INDO' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='B_INDO' then (tb_r_harian_k_d.N_N) END))  as Rata2
              FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN  WHERE tb_r_N_p_h.ID_Mapel='B_INDO' AND tb_r_N_p_h.ID_Rombel = '$ID_Rombel' GROUP BY
              tb_r_N_p_H.NISN")->result(),
        );
        $data['dataSiswa'] = $this->Model_siswa->dataTable();


        $output = $this->load->view('n_rekap/printBI',$data,true);
        return $this->gen_pdf($output);
    }

    public function printNilaiIPA($ID_Rombel)
    {
        

        $data=array
        (

"getrow1" =>$this->db->query("SELECT *,MAX(case when tb_r_n_p_D.ID_KD = 37 then tb_r_n_p_D.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_n_p_D.ID_KD = 38 then tb_r_n_p_D.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_n_p_D.ID_KD = 39 then tb_r_n_p_D.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_n_p_D.ID_KD = 40 then tb_r_n_p_D.N_R ELSE 0 END) AS N4,
MAX(case when tb_r_n_p_D.ID_KD = 41 then tb_r_n_p_D.N_R ELSE 0 END) AS N5,
             MAX(case when tb_r_harian_k_d.ID_KD = 42 then tb_r_harian_k_d.N_N ELSE 0 END) AS N6,
             MAX(case when tb_r_harian_k_d.ID_KD = 43 then tb_r_harian_k_d.N_N ELSE 0 END) AS N7,
             MAX(case when tb_r_harian_k_d.ID_KD = 44 then tb_r_harian_k_d.N_N ELSE 0 END) AS N8,
             MAX(case when tb_r_harian_k_d.ID_KD = 45 then tb_r_harian_k_d.N_N ELSE 0 END) AS N9,
             MAX(case when tb_r_harian_k_d.ID_KD = 46 then tb_r_harian_k_d.N_N ELSE 0 END) AS N10,
              

              (SUM(case when tb_r_n_p_H.ID_Mapel='IPA' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='IPA' then (tb_r_n_p_D.N_R) END))  as Rata1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='IPA' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='IPA' then (tb_r_harian_k_d.N_N) END))  as Rata2

             FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN WHERE tb_r_N_p_h.ID_Mapel='IPA' AND tb_r_N_p_h.ID_Rombel = '$ID_Rombel' GROUP BY
              tb_r_N_p_H.NISN")->result(),
        );
        $data['dataSiswa'] = $this->Model_siswa->dataTable();


        $output = $this->load->view('n_rekap/printIPA',$data,true);
        return $this->gen_pdf($output);
    }

    public function printNilaiIPS($ID_Rombel)
    {
        

        $data=array
        (

 "getrow1" =>$this->db->query("SELECT *,MAX(case when tb_r_n_p_D.ID_KD = 47 then tb_r_n_p_D.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_n_p_D.ID_KD = 48 then tb_r_n_p_D.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_n_p_D.ID_KD = 49 then tb_r_n_p_D.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_n_p_D.ID_KD = 50 then tb_r_n_p_D.N_R ELSE 0 END) AS N4,
             MAX(case when tb_r_harian_k_d.ID_KD = 51 then tb_r_harian_k_d.N_N ELSE 0 END) AS N5,
             MAX(case when tb_r_harian_k_d.ID_KD = 52 then tb_r_harian_k_d.N_N ELSE 0 END) AS N6,
             MAX(case when tb_r_harian_k_d.ID_KD = 53 then tb_r_harian_k_d.N_N ELSE 0 END) AS N7,
             MAX(case when tb_r_harian_k_d.ID_KD = 54 then tb_r_harian_k_d.N_N ELSE 0 END) AS N8,

             (SUM(case when tb_r_n_p_H.ID_Mapel='IPS' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='IPS' then (tb_r_n_p_D.N_R) END))  as Rata1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='IPS' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='IPS' then (tb_r_harian_k_d.N_N) END))  as Rata2

             FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN WHERE tb_r_N_p_h.ID_Mapel='IPS' AND tb_r_N_p_h.ID_Rombel = '$ID_Rombel' GROUP BY
              tb_r_N_p_H.NISN")->result(),
        );
        $data['dataSiswa'] = $this->Model_siswa->dataTable();


        $output = $this->load->view('n_rekap/printIPS',$data,true);
        return $this->gen_pdf($output);
    }


    public function printNilaiMTK($ID_Rombel)
    {
        

        $data=array
        (

            
             "getrow1" =>$this->db->query("SELECT *,MAX(case when tb_r_n_p_d.ID_KD = 23 then tb_r_n_p_d.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_n_p_d.ID_KD = 24 then tb_r_n_p_d.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_n_p_d.ID_KD = 25 then tb_r_n_p_d.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_n_p_d.ID_KD = 26 then tb_r_n_p_d.N_R ELSE 0 END) AS N4,
MAX(case when tb_r_n_p_d.ID_KD = 27 then tb_r_n_p_d.N_R ELSE 0 END) AS N5,
MAX(case when tb_r_n_p_d.ID_KD = 28 then tb_r_n_p_d.N_R ELSE 0 END) AS N6,
MAX(case when tb_r_n_p_d.ID_KD = 29 then tb_r_n_p_d.N_R ELSE 0 END) AS N7,
             max(case when tb_r_harian_k_d.ID_KD = 30 then tb_r_harian_k_d.N_N ELSE 0 END) AS N8,
             MAX(case when tb_r_harian_k_d.ID_KD = 31 then tb_r_harian_k_d.N_N ELSE 0 END) AS N9,
             MAX(case when tb_r_harian_k_d.ID_KD = 32 then tb_r_harian_k_d.N_N ELSE 0 END) AS N10,
             MAX(case when tb_r_harian_k_d.ID_KD = 33 then tb_r_harian_k_d.N_N ELSE 0 END) AS N11,
             MAX(case when tb_r_harian_k_d.ID_KD = 34 then tb_r_harian_k_d.N_N ELSE 0 END) AS N12,
             MAX(case when tb_r_harian_k_d.ID_KD = 35 then tb_r_harian_k_d.N_N ELSE 0 END) AS N13,
             MAX(case when tb_r_harian_k_d.ID_KD = 36 then tb_r_harian_k_d.N_N ELSE 0 END) AS N14,


                         (SUM(case when tb_r_n_p_H.ID_Mapel='MTK' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='MTK' then (tb_r_n_p_D.N_R) END))  as Rata1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='MTK' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='MTK' then (tb_r_harian_k_d.N_N) END))  as Rata2

             FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN WHERE tb_r_N_p_h.ID_Mapel='MTK' AND tb_r_N_p_h.ID_Rombel = '$ID_Rombel' GROUP BY
              tb_r_N_p_H.NISN")->result(),
        );
        $data['dataSiswa'] = $this->Model_siswa->dataTable();


        $output = $this->load->view('n_rekap/printMTK',$data,true);
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


    

public function printN()
    {
        // $data['dataNilai'] = $this->Model_Nilai_Tugas->dataTable();
        $data['dataNilai'] = $this->Model_n_rekap->dataTable2();
        $data['KD'] = $this->Model_n_rekap->getKD();
        $data['KD1'] = $this->Model_n_rekap->getKD1();
        $data['dataCmbMapel'] = $this->Model_n_rekap->getMpl();
        //         $data=array
        // (
        //     'dataNilai'=>$this->db->query("select * from tb_r_nilai_h a join tb_m_mapel b on a.ID_Mapel=b.ID_Mapel join tbl_tahun_akademik c on a.id_tahun_akademik=c.id_tahun_akademik join tb_m_rombel d on a.ID_Rombel=d.ID_Rombel join tb_m_guru e on d.ID_Rombel=e.ID_Rombel where a.ID_Nilai = '$ID_Nilai'")->result(),
        // );
        $output = $this->load->view('n_rekap/r_NUAS',$data,true);
        return $this->gen_pdf($output);
    }

    // public function gen_pdf($html){
    //     ob_start();
    //      $this->load->library('MPDF56/mpdf');
    //      $mpdf=new mPDF('utf-8', $paper = 'A4-L' );
    //      ob_clean();
    //      $mpdf->WriteHTML($html);
    //      $mpdf->Output();
    // }

  

    function add() {
        
        
        $data=array(
            'ID_N_UAS'=>$this->Model_n_rekap->getID(),
            'data' => $this->Model_n_rekap->get_rmbl(),
                        // 'dataCmbMapel' =>$this->db->query("SELECT * from tb_m_kd inner join  tb_m_mapel on tb_m_mapel.ID_Mapel=tb_m_kd.ID_Mapel WHERE tb_m_kd.J_KD = 1")->result(),
            'dataCmbMapel' => $this->Model_n_rekap->getMpl(),
            'siswa' => $this->Model_n_rekap->get_sw(),
            'KD' => $this->Model_n_rekap->getKD(),
            'rombel_selected' => '',
            'siswa_selected' => '',
            'mapel_selected' => '',
            'kd_selected' => '',
            
        );
        // $data['dataCmbMapel'] = $this->Model_Nilai_H->getCmbMapel();
        $data['dataCmbThn'] = $this->Model_n_rekap->getCmbThn();
        // $data['data'] = $this->Model_Nilai_H->getCmbRmbl(); 


        if (isset($_POST['submit'])) {

            $this->Model_n_rekap->save();
        redirect('n_rekap'); 
}
        else {
            $this->template->load('template', 'n_rekap/add',$data);
        }
    }

public function listnilai($id) 
    {
        // if(isset($_POST['submit'])){

        //     $this->Model_n_rekap->save();
        //     redirect('n_rekap');
        // }else{

        $data=array(
            "id"=>$id,
             "getrow1" =>$this->db->query("SELECT *,tb_r_n_p_h.NISN,(case when tb_r_n_p_d.ID_KD = 1 then tb_r_n_p_d.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_n_p_d.ID_KD = 3 then tb_r_n_p_d.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_n_p_d.ID_KD  = 4  then tb_r_n_p_d.N_R ELSE 0 END) AS N3,
             MAX(case when tb_r_harian_K_d.ID_KD = 2 then tb_r_harian_K_d.N_N ELSE 0 END) AS N4,
             MAX(case when tb_r_harian_K_d.ID_KD = 5 then tb_r_harian_K_d.N_N ELSE 0 END) AS N5,
             MAX(case when tb_r_harian_K_d.ID_KD = 6 then tb_r_harian_K_d.N_N ELSE 0 END) AS N6,

            (SUM(case when tb_r_n_p_H.ID_Mapel='PKN' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='PKN' then (tb_r_n_p_D.N_R) END))  as Rata1,
                        (SUM(case when tb_r_n_harian_k_h.ID_Mapel='PKN' then (tb_r_harian_K_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='PKN' then (tb_r_harian_K_d.N_N) END))  as Rata2
              FROM tb_r_n_p_d join tb_r_n_p_H on tb_r_n_p_D.ID_P_H=tb_r_n_p_H.ID_P_H join tb_m_siswa on tb_r_n_p_H.NISN=tb_m_siswa.NISN join tb_r_n_harian_k_h ON tb_r_n_p_H.NISN=tb_r_n_harian_k_h.NISN JOIN tb_r_harian_k_d ON tb_r_harian_K_d.ID_Nilai_H_K=tb_r_n_harian_k_h.ID_Nilai_H_K WHERE tb_r_n_p_H.ID_Mapel='PKN' AND tb_r_n_harian_k_h.ID_Mapel='PKN'
               AND tb_r_n_p_H.ID_Rombel = '$id'GROUP BY tb_r_n_p_h.NISN")->result(),

            

        );
        $ID_Rombel      = $this->uri->segment(3);
            $data['n_rekap'] = $this->db->get_where('tb_r_n_p_H',array('ID_Rombel'=>$id))->row_array();
            $this->template->load('template', 'n_rekap/list2',$data);
        // }
        
    }

public function listnilaiAG($id) 
    {
        // if(isset($_POST['submit'])){

        //     $this->Model_n_rekap->save();
        //     redirect('n_rekap');
        // }else{

        $data=array(
            "id"=>$id,
             "getrow1" =>$this->db->query("SELECT *,MAX(case when tb_r_N_p_D.ID_KD = 63 then tb_r_N_p_D.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_N_p_D.ID_KD = 64 then tb_r_N_p_D.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_N_p_D.ID_KD = 65 then tb_r_N_p_D.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_N_p_D.ID_KD = 66 then tb_r_N_p_D.N_R ELSE 0 END) AS N4,
MAX(case when tb_r_N_p_D.ID_KD = 67 then tb_r_N_p_D.N_R ELSE 0 END) AS N5,
MAX(case when tb_r_N_p_D.ID_KD = 68 then tb_r_N_p_D.N_R ELSE 0 END) AS N6,
MAX(case when tb_r_N_p_D.ID_KD = 69 then tb_r_N_p_D.N_R ELSE 0 END) AS N7,
MAX(case when tb_r_N_p_D.ID_KD = 70 then tb_r_N_p_D.N_R ELSE 0 END) AS N8,
MAX(case when tb_r_N_p_D.ID_KD = 71 then tb_r_N_p_D.N_R ELSE 0 END) AS N9,
MAX(case when tb_r_N_p_D.ID_KD = 72 then tb_r_N_p_D.N_R ELSE 0 END) AS N10,
             MAX(case when tb_r_harian_k_d.ID_KD = 73 then tb_r_harian_k_d.N_N ELSE 0 END) AS N11,
             MAX(case when tb_r_harian_k_d.ID_KD = 74 then tb_r_harian_k_d.N_N ELSE 0 END) AS N12,
             MAX(case when tb_r_harian_k_d.ID_KD = 75 then tb_r_harian_k_d.N_N ELSE 0 END) AS N13,
             MAX(case when tb_r_harian_k_d.ID_KD = 76 then tb_r_harian_k_d.N_N ELSE 0 END) AS N14,
             MAX(case when tb_r_harian_k_d.ID_KD = 77 then tb_r_harian_k_d.N_N ELSE 0 END) AS N15,
             MAX(case when tb_r_harian_k_d.ID_KD = 78 then tb_r_harian_k_d.N_N ELSE 0 END) AS N16,
             MAX(case when tb_r_harian_k_d.ID_KD = 79 then tb_r_harian_k_d.N_N ELSE 0 END) AS N17,
             MAX(case when tb_r_harian_k_d.ID_KD = 80 then tb_r_harian_k_d.N_N ELSE 0 END) AS N18,
             MAX(case when tb_r_harian_k_d.ID_KD = 81 then tb_r_harian_k_d.N_N ELSE 0 END) AS N19,
             MAX(case when tb_r_harian_k_d.ID_KD = 82 then tb_r_harian_k_d.N_N ELSE 0 END) AS N20,
             
            (SUM(case when tb_r_n_p_H.ID_Mapel='AGAMA' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='AGAMA' then (tb_r_n_p_D.N_R) END))  as RATA1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='AGAMA' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='AGAMA' then (tb_r_harian_k_d.N_N) END))  as RATA2

             FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN WHERE tb_r_N_p_h.ID_Mapel='AGAMA' AND tb_r_N_p_h.ID_Rombel = '$id' GROUP BY
              tb_r_N_p_H.NISN")->result(),
            

        );
        $ID_Rombel      = $this->uri->segment(3);
            $data['n_rekap'] = $this->db->get_where('tb_r_N_p_h',array('ID_Rombel'=>$id))->row_array();
            $this->template->load('template', 'n_rekap/listAG',$data);
        // }
        
    }

public function listnilaiSB($id) 
    {
        // if(isset($_POST['submit'])){

        //     $this->Model_n_rekap->save();
        //     redirect('n_rekap');
        // }else{

        $data=array(
            "id"=>$id,
             "getrow1" =>$this->db->query("SELECT *,MAX(case when tb_r_n_p_D.ID_KD = 55  then tb_r_n_p_D.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_n_p_D.ID_KD = 56 then tb_r_n_p_D.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_n_p_D.ID_KD = 57 then tb_r_n_p_D.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_n_p_D.ID_KD = 58 then tb_r_n_p_D.N_R ELSE 0 END) AS N4,
             MAX(case when tb_r_harian_k_d.ID_KD = 59 then tb_r_harian_k_d.N_N ELSE 0 END) AS N5,
             MAX(case when tb_r_harian_k_d.ID_KD = 60 then tb_r_harian_k_d.N_N ELSE 0 END) AS N6,
             MAX(case when tb_r_harian_k_d.ID_KD = 61 then tb_r_harian_k_d.N_N ELSE 0 END) AS N7,
             MAX(case when tb_r_harian_k_d.ID_KD = 62 then tb_r_harian_k_d.N_N ELSE 0 END) AS N8,

 (SUM(case when tb_r_n_p_H.ID_Mapel='SBdP' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='SBdP' then (tb_r_n_p_D.N_R) END))  as RATA1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='SBdP' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='SBdP' then (tb_r_harian_k_d.N_N) END))  as RATA2

             FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN WHERE tb_r_N_p_h.ID_Mapel='SBdP' AND tb_r_N_p_h.ID_Rombel = '$id' GROUP BY
              tb_r_N_p_H.NISN")->result(),

            

        );
        $ID_Rombel      = $this->uri->segment(3);
            $data['n_rekap'] = $this->db->get_where('tb_r_N_p_h',array('ID_Rombel'=>$id))->row_array();
            $this->template->load('template', 'n_rekap/listSB',$data);
        // }
        
    }


    public function listnilaiBI($id) 
    {
        // if(isset($_POST['submit'])){

        //     $this->Model_n_rekap->save();
        //     redirect('n_rekap');
        // }else{

        $data=array(
            "id"=>$id,
             "getrow1" =>$this->db->query("SELECT *,tb_r_N_p_H.NISN,(case when tb_r_N_p_D.ID_KD = 7  then N_R ELSE 0 END) AS N1,
MAX(case when tb_r_N_p_D.ID_KD = 8 AND tb_r_N_p_D.ID_P_H=tb_r_N_p_D.ID_P_H then tb_r_N_p_D.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_N_p_D.ID_KD = 9 then tb_r_N_p_D.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_N_p_D.ID_KD = 10 then tb_r_N_p_D.N_R ELSE 0 END) AS N4,
MAX(case when tb_r_N_p_D.ID_KD = 11  then tb_r_N_p_D.N_R ELSE 0 END) AS N5,
MAX(case when tb_r_N_p_D.ID_KD = 12 then tb_r_N_p_D.N_R ELSE 0 END) AS N6,
MAX(case when tb_r_N_p_D.ID_KD = 13 then tb_r_N_p_D.N_R ELSE 0 END) AS N7,
MAX(case when tb_r_N_p_D.ID_KD = 14 then tb_r_N_p_D.N_R ELSE 0 END) AS N8,
             MAX(case when tb_r_harian_k_d.ID_KD = 15 then tb_r_harian_k_d.N_N ELSE 0 END) AS N9,
             MAX(case when tb_r_harian_k_d.ID_KD = 16 then tb_r_harian_k_d.N_N ELSE 0 END) AS N10,
             MAX(case when tb_r_harian_k_d.ID_KD = 17 then tb_r_harian_k_d.N_N ELSE 0 END) AS N11,
             MAX(case when tb_r_harian_k_d.ID_KD = 18 then tb_r_harian_k_d.N_N ELSE 0 END) AS N12,
             MAX(case when tb_r_harian_k_d.ID_KD = 19 then tb_r_harian_k_d.N_N ELSE 0 END) AS N13,
             MAX(case when tb_r_harian_k_d.ID_KD = 20 then tb_r_harian_k_d.N_N ELSE 0 END) AS N14,
             MAX(case when tb_r_harian_k_d.ID_KD = 21 then tb_r_harian_k_d.N_N ELSE 0 END) AS N15,
             MAX(case when tb_r_harian_k_d.ID_KD = 22 then tb_r_harian_k_d.N_N ELSE 0 END) AS N16,

                         (SUM(case when tb_r_n_p_H.ID_Mapel='B_INDO' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='B_INDO' then (tb_r_n_p_D.N_R) END))  as Rata1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='B_INDO' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='B_INDO' then (tb_r_harian_k_d.N_N) END))  as Rata2
              FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN  WHERE tb_r_N_p_h.ID_Mapel='B_INDO' AND tb_r_N_p_h.ID_Rombel = '$id' GROUP BY
              tb_r_N_p_H.NISN")->result(),
        );
        $ID_Rombel      = $this->uri->segment(3);
            $data['n_rekap'] = $this->db->get_where('tb_r_N_p_h',array('ID_Rombel'=>$id))->row_array();
            $this->template->load('template', 'n_rekap/listBI',$data);
        // }
        
    }

public function listnilaiMTK($id) 
    {
        // if(isset($_POST['submit'])){

        //     $this->Model_n_rekap->save();
        //     redirect('n_rekap');
        // }else{

        $data=array(
            "id"=>$id,
             "getrow1" =>$this->db->query("SELECT *,MAX(case when tb_r_n_p_d.ID_KD = 23 then tb_r_n_p_d.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_n_p_d.ID_KD = 24 then tb_r_n_p_d.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_n_p_d.ID_KD = 25 then tb_r_n_p_d.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_n_p_d.ID_KD = 26 then tb_r_n_p_d.N_R ELSE 0 END) AS N4,
MAX(case when tb_r_n_p_d.ID_KD = 27 then tb_r_n_p_d.N_R ELSE 0 END) AS N5,
MAX(case when tb_r_n_p_d.ID_KD = 28 then tb_r_n_p_d.N_R ELSE 0 END) AS N6,
MAX(case when tb_r_n_p_d.ID_KD = 29 then tb_r_n_p_d.N_R ELSE 0 END) AS N7,
             max(case when tb_r_harian_k_d.ID_KD = 30 then tb_r_harian_k_d.N_N ELSE 0 END) AS N8,
             MAX(case when tb_r_harian_k_d.ID_KD = 31 then tb_r_harian_k_d.N_N ELSE 0 END) AS N9,
             MAX(case when tb_r_harian_k_d.ID_KD = 32 then tb_r_harian_k_d.N_N ELSE 0 END) AS N10,
             MAX(case when tb_r_harian_k_d.ID_KD = 33 then tb_r_harian_k_d.N_N ELSE 0 END) AS N11,
             MAX(case when tb_r_harian_k_d.ID_KD = 34 then tb_r_harian_k_d.N_N ELSE 0 END) AS N12,
             MAX(case when tb_r_harian_k_d.ID_KD = 35 then tb_r_harian_k_d.N_N ELSE 0 END) AS N13,
             MAX(case when tb_r_harian_k_d.ID_KD = 36 then tb_r_harian_k_d.N_N ELSE 0 END) AS N14,


                         (SUM(case when tb_r_n_p_H.ID_Mapel='MTK' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='MTK' then (tb_r_n_p_D.N_R) END))  as Rata1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='MTK' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='MTK' then (tb_r_harian_k_d.N_N) END))  as Rata2

             FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN  WHERE tb_r_N_p_h.ID_Mapel='MTK' AND tb_r_N_p_h.ID_Rombel = '$id' GROUP BY
              tb_r_N_p_H.NISN")->result(),
        );
        $ID_Rombel      = $this->uri->segment(3);
            $data['n_rekap'] = $this->db->get_where('tb_r_N_p_H',array('ID_Rombel'=>$id))->row_array();
            $this->template->load('template', 'n_rekap/listMTK',$data);
        // }
        
    }

public function listnilaiIPA($id) 
    {
        // if(isset($_POST['submit'])){

        //     $this->Model_n_rekap->save();
        //     redirect('n_rekap');
        // }else{

        $data=array(
            "id"=>$id,
             "getrow1" =>$this->db->query("SELECT *,MAX(case when tb_r_n_p_D.ID_KD = 37 then tb_r_n_p_D.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_n_p_D.ID_KD = 38 then tb_r_n_p_D.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_n_p_D.ID_KD = 39 then tb_r_n_p_D.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_n_p_D.ID_KD = 40 then tb_r_n_p_D.N_R ELSE 0 END) AS N4,
MAX(case when tb_r_n_p_D.ID_KD = 41 then tb_r_n_p_D.N_R ELSE 0 END) AS N5,
             MAX(case when tb_r_harian_k_d.ID_KD = 42 then tb_r_harian_k_d.N_N ELSE 0 END) AS N6,
             MAX(case when tb_r_harian_k_d.ID_KD = 43 then tb_r_harian_k_d.N_N ELSE 0 END) AS N7,
             MAX(case when tb_r_harian_k_d.ID_KD = 44 then tb_r_harian_k_d.N_N ELSE 0 END) AS N8,
             MAX(case when tb_r_harian_k_d.ID_KD = 45 then tb_r_harian_k_d.N_N ELSE 0 END) AS N9,
             MAX(case when tb_r_harian_k_d.ID_KD = 46 then tb_r_harian_k_d.N_N ELSE 0 END) AS N10,
              

              (SUM(case when tb_r_n_p_H.ID_Mapel='IPA' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='IPA' then (tb_r_n_p_D.N_R) END))  as Rata1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='IPA' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='IPA' then (tb_r_harian_k_d.N_N) END))  as Rata2

             FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN WHERE tb_r_N_p_h.ID_Mapel='IPA' AND tb_r_N_p_h.ID_Rombel = '$id' GROUP BY
              tb_r_N_p_H.NISN")->result()
            

        );
        $ID_Rombel      = $this->uri->segment(3);
            $data['n_rekap'] = $this->db->get_where('tb_r_N_p_H',array('ID_Rombel'=>$id))->row_array();
            $this->template->load('template', 'n_rekap/listIPA',$data);
        // }
        
    }
    

    public function listnilaiIPS($id) 
    {

        $data=array(
            "id"=>$id,
             "getrow1" =>$this->db->query("SELECT *,MAX(case when tb_r_n_p_D.ID_KD = 47 then tb_r_n_p_D.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_n_p_D.ID_KD = 48 then tb_r_n_p_D.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_n_p_D.ID_KD = 49 then tb_r_n_p_D.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_n_p_D.ID_KD = 50 then tb_r_n_p_D.N_R ELSE 0 END) AS N4,
             MAX(case when tb_r_harian_k_d.ID_KD = 51 then tb_r_harian_k_d.N_N ELSE 0 END) AS N5,
             MAX(case when tb_r_harian_k_d.ID_KD = 52 then tb_r_harian_k_d.N_N ELSE 0 END) AS N6,
             MAX(case when tb_r_harian_k_d.ID_KD = 53 then tb_r_harian_k_d.N_N ELSE 0 END) AS N7,
             MAX(case when tb_r_harian_k_d.ID_KD = 54 then tb_r_harian_k_d.N_N ELSE 0 END) AS N8,

             (SUM(case when tb_r_n_p_H.ID_Mapel='IPS' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='IPS' then (tb_r_n_p_D.N_R) END))  as Rata1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='IPS' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='IPS' then (tb_r_harian_k_d.N_N) END))  as Rata2

             FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN WHERE tb_r_N_p_h.ID_Mapel='IPS' AND tb_r_N_p_h.ID_Rombel = '$id' GROUP BY
              tb_r_N_p_H.NISN")->result(),

            

        );
        $ID_Rombel      = $this->uri->segment(3);
            $data['n_rekap'] = $this->db->get_where('tb_r_N_p_h',array('ID_Rombel'=>$id))->row_array();
            $this->template->load('template', 'n_rekap/listIPS',$data);
        // }
        
    }
       
public function listnilaiPJ($id) 
    {

        $data=array(
            "id"=>$id,
             "getrow1" =>$this->db->query("SELECT *,MAX(case when tb_r_n_p_D.ID_KD = 83 then tb_r_n_p_D.N_R ELSE 0 END) AS N1,
MAX(case when tb_r_n_p_D.ID_KD = 84 then tb_r_n_p_D.N_R ELSE 0 END) AS N2,
MAX(case when tb_r_n_p_D.ID_KD = 85 then tb_r_n_p_D.N_R ELSE 0 END) AS N3,
MAX(case when tb_r_n_p_D.ID_KD = 86 then tb_r_n_p_D.N_R ELSE 0 END) AS N4,
             MAX(case when tb_r_harian_k_d.ID_KD = 87 then tb_r_harian_k_d.N_N ELSE 0 END) AS N5,
             MAX(case when tb_r_harian_k_d.ID_KD = 88 then tb_r_harian_k_d.N_N ELSE 0 END) AS N6,
             MAX(case when tb_r_harian_k_d.ID_KD = 89 then tb_r_harian_k_d.N_N ELSE 0 END) AS N7,
             MAX(case when tb_r_harian_k_d.ID_KD = 90 then tb_r_harian_k_d.N_N ELSE 0 END) AS N8,
              

              (SUM(case when tb_r_n_p_H.ID_Mapel='PJOK' then (tb_r_n_p_D.N_R) END)/COUNT(CASE WHEN tb_r_n_p_H.ID_Mapel='PJOK' then (tb_r_n_p_D.N_R) END))  as RATA1,
                         (SUM(case when tb_r_n_harian_k_h.ID_Mapel='PJOK' then (tb_r_harian_k_d.N_N) END)/COUNT(CASE WHEN tb_r_n_harian_k_h.ID_Mapel='PJOK' then (tb_r_harian_k_d.N_N) END))  as RATA2

             FROM tb_r_N_p_H LEFT join tb_r_N_p_D on tb_r_N_p_H.ID_P_H=tb_r_N_p_D.ID_P_H  LEFT JOIN tb_r_n_harian_k_h ON tb_r_n_harian_k_h.NISN=tb_r_N_p_H.NISN LEFT join tb_r_harian_k_d ON tb_r_n_harian_k_h.ID_Nilai_H_K=tb_r_harian_k_d.ID_Nilai_H_K join tb_m_siswa on tb_r_N_p_h.NISN=tb_m_siswa.NISN WHERE tb_r_N_p_h.ID_Mapel='PJOK' AND tb_r_N_p_h.ID_Rombel = '$id' GROUP BY
              tb_r_N_p_H.NISN")->result(),

            

        );
        $ID_Rombel      = $this->uri->segment(3);
            $data['n_rekap'] = $this->db->get_where('tb_r_N_p_h',array('ID_Rombel'=>$id))->row_array();
            $this->template->load('template', 'n_rekap/listPJ',$data);
        // }
        
    }

}