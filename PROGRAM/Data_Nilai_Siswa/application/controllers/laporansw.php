<?php

Class laporansw extends CI_Controller {

    function __construct() {
        parent::__construct();
        //chekAksesModule();
        $this->load->library('ssp');
        // $this->load->model('Model_laporansw');
        $this->load->model('Model_Nilai_Tugas');
        $this->load->model('Model_guru');
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
//        // $data['dataRata'] = $this->Model_laporansw->rata();
//        $this->template->load('template', 'laporansw/l_legger',$data);

        $query = $this->db->query("SELECT * FROM tb_m_siswa a join tb_m_rombel b on a.ID_Rombel=b.ID_Rombel ORDER BY A.Nama ASC");
        
$data=array(
                "data1" => $this->Model_Nilai_Tugas->get_rmbl(),
            "dataSiswa"=>$query->result(),
            "count"=>$query->num_rows()
        );
$data['dataCombo1'] = $this->Model_guru->getCombo2();
$this->template->load('template', 'laporansw/list',$data);
    }


function l_sw(){
  $where = "";

        if(isset($_POST['ID_Rombel']))
            $where = " AND A.ID_Rombel LIKE'%".$_POST['ID_Rombel']."%'";
    
        $query = $this->db->query("SELECT * from tb_m_siswa a join tb_m_rombel b on a.ID_Rombel=b.ID_Rombel". $where);
        
$data=array(
                "data1" => $this->Model_Nilai_Tugas->get_rmbl(),
            "dataSiswa"=>$query->result(),
            "count"=>$query->num_rows()
        );
  
$data['dataCombo1'] = $this->Model_guru->getCombo2();
        $this->template->load('template','laporansw/list',$data);
    
}

    public function report($ID_Rombel)
    {
  $where = "";
        if(isset($ID_Rombel))
            $where = " AND a.ID_Rombel LIKE'".$ID_Rombel."'";

        $query = $this->db->query("SELECT * from tb_m_siswa a join tb_m_rombel b on a.ID_Rombel=b.ID_Rombel". $where);

        $query1 = $this->db->query("SELECT * from tb_m_siswa a join tb_m_rombel b on a.ID_Rombel=b.ID_Rombel join tb_m_guru c on b.ID_Rombel=c.ID_Rombel join tb_m_tipe_guru d on c.ID_Tipe_Guru=d.ID_Tipe_Guru". $where);
        
$data=array(
            "dataSiswa"=>$query->result(),
            "dataSiswa1"=>$query1->result(),
            "count"=>$query->num_rows()
        );
$data['dataCombo1'] = $this->Model_guru->getCombo2();
        $output = $this->load->view('laporansw/laporan',$data,true);
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
    function add() {
        
        
        $data=array(
            'ID_Legger'=>$this->Model_laporansw->getID(),
            'data' => $this->Model_laporansw->get_rmbl(),
            'siswa' => $this->Model_laporansw->get_sw(),
            'rombel_selected' => '',
            'siswa_selected' => '',
            'dataCmbMapel' => $this->Model_laporansw->getMapel(),    
        );
        // $data['dataCmbMapel'] = $this->Model_laporansw->getMapel();
        $data['dataCmbThn'] = $this->Model_laporansw->getCmbThn();
        // $data['data'] = $this->Model_laporansw->getCmbRmbl(); 


        if (isset($_POST['submit'])) {

            $this->Model_laporansw->save();
            
        redirect('laporansw'); 
}
        else {
            $this->template->load('template', 'laporansw/add',$data);
        }
    }



    
    //     function edit(){       
    //     $data['dataCmbSis'] = $this->Model_laporansw->getsw();
    //     $data['dataCmbMapel'] = $this->Model_laporansw->getCmbMapel();
    //     $data['dataCmbThn'] = $this->Model_laporansw->getCmbThn();

    //     $data['dataCmbRmbl'] = $this->Model_laporansw->getCmbRmbl1();
    //     if(isset($_POST['submit'])){
    //         $this->Model_laporansw->update();
    //                 $this->session->set_flashdata('success','Data Nilai Tugas telah berhasil diubah.');
    //         redirect('laporansw');
    //     }else{
    //         $ID_laporansw           = $this->uri->segment(3);
    //         $data['laporansw'] = $this->db->get_where('tb_r_laporansw',array('ID_laporansw'=>$ID_laporansw))->row_array();
    //         $this->template->load('template', 'laporansw/edit',$data);
    //     }
    // }

public function printN()
    {
        // $data['dataNilai'] = $this->Model_laporansw->dataTable();

        

        $data['dataNilai'] = $this->Model_laporansw->dataTable2();
        $data['dataNilai1'] = $this->Model_laporansw->dataTable3();
        $data['dataNilai2'] = $this->Model_laporansw->dt4();
        $data['dataNilai3'] = $this->Model_laporansw->dt5();
        $data['dataKKM'] = $this->Model_laporansw->getKKM();
        $data['dataKI'] = $this->Model_laporansw->dataNi();

        //         $data=array
        // (
        //     'dataNilai'=>$this->db->query("select * from tb_r_nilai_h a join tb_m_mapel b on a.ID_Mapel=b.ID_Mapel join tbl_tahun_akademik c on a.id_tahun_akademik=c.id_tahun_akademik join tb_m_rombel d on a.ID_Rombel=d.ID_Rombel join tb_m_guru e on d.ID_Rombel=e.ID_Rombel where a.ID_Nilai = '$ID_Nilai'")->result(),
        // );
        $output = $this->load->view('laporansw/r_nilai',$data,true);
        return $this->gen_pdf($output);
    }

    
            public function KKM($ID_Mapel)
    {
        $this->Model_laporansw->getKKM1($ID_Mapel);
        
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
    //     // $data['dataNilai'] = $this->Model_laporansw->dataTable();
    //     // $data['getrombel']= $this->Model_laporansw->get_rmbl();

    //     $data=array
    //     (
    //         'dataNilai'=>$this->db->query("select * from tb_r_nilai_h a join tb_m_mapel b on a.ID_Mapel=b.ID_Mapel join tbl_tahun_akademik c on a.id_tahun_akademik=c.id_tahun_akademik join tb_m_rombel d on a.ID_Rombel=d.ID_Rombel join tb_m_guru e on d.ID_Rombel=e.ID_Rombel where a.ID_Nilai = '$ID_Nilai'")->result(),
    //         'dataNilaiM'=>$this->db->query("select * from tb_r_nilai_h a join tb_m_mapel b on a.ID_Mapel=b.ID_Mapel join tbl_tahun_akademik c on a.id_tahun_akademik=c.id_tahun_akademik join tb_m_rombel d on a.ID_Rombel=d.ID_Rombel join tb_m_guru e on a.ID_Mapel=e.ID_Mapel where a.ID_Nilai = '$ID_Nilai'")->result(),
    //         'dataNilaiD'=>$this->db->query("select * from tb_r_nilai_d a join tb_m_siswa b on a.NISN=b.NISN where a.ID_Nilai = '$ID_Nilai'")->result()
    //     );

    //     $output = $this->load->view('laporansw/r_nilai',$data,true);
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
            // "getrow1"=>$this->db->where('ID_laporansw',$id)->get('tb_r_laporansw_d')->row_array(),
            


            // "dataNilaiT" => $this->Model_laporansw->dataTable1($id),
            
        "dataCmbSis" => $this->Model_laporansw->getSw1(),
        "dataCmbMapel" => $this->Model_laporansw->getCmbMapel(),
        "dataCmbThn" => $this->Model_laporansw->getCmbThn(),
        "dataCmbRmbl" => $this->Model_laporansw->getRmbl1(),
        // "rombel_selected" => $selected->ID_Rombel,
        // "siswa_selected" => $selected->NISN,
        );
        if(isset($_POST['submit'])){
            $this->Model_laporansw->update();
            redirect('laporansw');
        }else{
        $ID_Legger      = $this->uri->segment(3);
            $data['laporansw'] = $this->db->get_where('tb_r_legger_h',array('ID_Legger'=>$id))->row_array();
                        $data['laporansw1'] = $this->db->get_where('tb_r_legger_d',array('ID_Legger'=>$ID_Legger))->row_array();
            $this->template->load('template', 'laporansw/edit',$data);
        }
        
    }
    
    function delete(){
        $ID_laporansw = $this->uri->segment(3);
        if(!empty($ID_laporansw)){
            // proses delete data
            $this->db->where('ID_laporansw',$ID_laporansw);
            $this->db->delete('tb_r_laporansw_h');
                        $this->db->where('ID_laporansw',$ID_laporansw);
            $this->db->delete('tb_r_laporansw_d');
        }
        redirect('laporansw');
    }

    public function Nama($siswa)
    {
        $this->Model_laporansw->getCmbSiswa($siswa);
    }

    public function listSiswa(){
    // Ambil data ID Provinsi yang dikirim via ajax post
    $ID_Rombel = $this->input->post('ID_Rombel');
    
    $siswa = $this->Model_laporansw->viewByRombel($ID_Rombel);
    
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
             "getrow1" =>$this->db->query("SELECT * FROM tb_r_laporansw_h INNER JOIN tb_r_laporansw_d ON tb_r_laporansw_h.ID_laporansw = tb_r_laporansw_d.ID_laporansw INNER JOIN tb_m_siswa on tb_r_laporansw_d.NISN = tb_m_siswa.NISN INNER JOIN tb_m_mapel on tb_r_laporansw_h.ID_Mapel = tb_m_mapel.ID_Mapel INNER JOIN tbl_tahun_akademik on tb_r_laporansw_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik WHERE tb_r_laporansw_d.ID_laporansw = '$id'")->result(),
            "getrow"=>$this->db->where('ID_laporansw',$id)->get('tb_r_laporansw_h')->row_array(),
            "getrow2"=>$this->db->where('ID_laporansw',$id)->get('tb_r_laporansw_d')->row_array(),
            // "getrow1"=>$this->db->where('ID_laporansw',$id)->get('tb_r_laporansw_d')->row_array(),
            


            // "dataNilaiT" => $this->Model_laporansw->dataTable1($id),
            "id"=>$id,
        "dataCmbSis" => $this->Model_laporansw->getCmbSiswa(),
        "dataCmbMapel" => $this->Model_laporansw->getCmbMapel(),
        "dataCmbThn" => $this->Model_laporansw->getCmbThn(),
        "dataCmbRmbl" => $this->Model_laporansw->getCmbRmbl()
        );

        $ID_laporansw = $this->uri->segment(3);

                $ID_laporansw_D = $this->uri->segment(4);
        if (!empty($ID_laporansw_D)) {
            $this->db->where('ID_laporansw_D', $ID_laporansw_D);
            $this->db->delete('tb_r_laporansw_d');
        }
redirect('laporansw/edit/'.$ID_laporansw);
    }

}