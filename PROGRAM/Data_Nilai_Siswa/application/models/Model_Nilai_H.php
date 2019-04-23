<?php

class Model_Nilai_H extends CI_Model {





        public function get_rmbl()
        {
            $this->db->order_by('ID_Rombel', 'asc');
            return $this->db->get('tb_m_rombel')->result();
        }

    function update() {
     
            $data = array(
            'N_UT'          => $this->input->post('N_UT', TRUE),
            'N_R' => $this->input->post('N_R', TRUE)
        );
        
        $ID_P_H   = $this->input->post('ID_P_H');
        $this->db->where('ID_P_H',$ID_P_H);
        $this->db->update('tb_r_n_p_d',$data);
    

}

                public function getMpl()
        {
            $this->db->order_by('ID_Mapel', 'asc');
            return $this->db->get('tb_m_mapel')->result();
        }

            public function getKD()
        {
            $this->db->order_by('tb_m_kd.Kode_KD', 'asc');
            $this->db->where('tb_m_kd.J_KD',1);
            $this->db->join('tb_m_mapel', 'tb_m_mapel.ID_Mapel = tb_m_kd.ID_Mapel');
            return $this->db->get('tb_m_kd')->result();
        }

                    public function getNO()
        {
         
            return $this->db->get('t')->result();
        }

    public function get_sw()
        {
            $this->db->order_by('Nama', 'asc');
            $this->db->join('tb_m_rombel', 'tb_m_siswa.ID_Rombel = tb_m_rombel.ID_Rombel');
            return $this->db->get('tb_m_siswa')->result();
        }

public function get_selected_ID($ID_Rombel)
        {
            $this->db->where('ID_Rombel', $ID_Rombel);
            $this->db->join('tb_m_rombel', 'tb_m_siswa.ID_Rombel = tb_m_rombel.ID_Rombel');
            return $this->db->get('tb_m_siswa')->row();
        }

//


    public function getCmbMapel(){
        $this->db->select('*');
        $this->db->from('tb_m_mapel');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

        public function getSw1(){
        $this->db->select('*');
        $this->db->from('tb_m_siswa');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

    public function getRmbl1(){
        $this->db->select('*');
        $this->db->from('tb_m_rombel');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }
    public function getCmbThn(){
        $this->db->select('*');
        $this->db->from('tbl_tahun_akademik');
                $this->db->where('is_aktif','y');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

 //    public function get_siswa_by_rombel($id){
 //  return $this->db->where("ID_Rombel",$id,false)->get("tb_m_siswa");
 // }




    function save() {
        $ID_P_H=$_POST['ID_P_H'];
        $NISN=$_POST['NISN'];
        $Semester=$_POST['Semester'];
        $id_tahun_akademik=$_POST['id_tahun_akademik'];
        $ID_Mapel=$_POST['ID_Mapel'];
        $ID_Rombel=$_POST['ID_Rombel'];
        $ID_KD=$_POST['ID_KD'];
        
        foreach( $NISN as $key => $n ) {
            $cek=$this->db->query("SELECT * from tb_r_N_p_h where tb_r_N_p_h.NISN ='$n' and tb_r_N_p_D.Semester='$Semester' and tb_r_N_p_h.id_tahun_akademik='$id_tahun_akademik' and tb_r_N_p_h.ID_Mapel='$ID_Mapel'")->num_rows();

            if($cek>0){
                $this->session->set_flashdata('error',"NISN : " .$n. " Sudah Digunakan");
                redirect('nilai_H/add');
                var_dump($this->input->post());
            }
        }

        $data=array(
                "ID_P_H"=>$_POST['ID_P_H'],
                "ID_Mapel"=>$_POST['ID_Mapel'],
                "NISN"=>$_POST['NISN'],
                "KKM"=>$_POST['KKM'],
                "id_tahun_akademik"=>$_POST['id_tahun_akademik'],
                "Semester"=>$_POST['Semester'],
                "ID_Rombel"=>$_POST['ID_Rombel'],
            );
        $this->db->insert('tb_r_N_p_h',$data);
        $query = $this->db->get_where('tb_r_N_p_h', array('ID_P_H' => $_POST['ID_P_H']));
        $id_header = "";
        foreach ($query->result() as $row) $id_header = $row->ID_P_H;
        // $NISN = $_POST['NISN'];
        foreach( $ID_KD as $key => $n ) {
            
            $data=array(
                "ID_P_H"=>$id_header,
                "ID_KD"=>$n,
                "N_1"=>$_POST['N_1'][$key],
                "N_2"=>$_POST['N_2'][$key],
                "N_3"=>$_POST['N_3'][$key],
                "N_4"=>$_POST['N_4'][$key],
                "N_N"=>$_POST['N_N'][$key],
                "N_UT"=>$_POST['N_UT'][$key],
                "N_UAS"=>$_POST['N_UAS'][$key],
                "N_R"=>$_POST['N_R'][$key],
                // "Nilai_Raport"=>$_POST['Nilai_Raport'][$key]
            );
$this->db->insert('tb_r_N_p_d',$data);
            $this->session->set_flashdata('success','Data Nilai Harian Pengetahuan dengan NISN : '.$NISN.' Mapel : ' .$ID_Mapel. ' Semester : ' .$Semester. ' telah berhasil disimpan.');
}

        //     $data1=array(
        //         'dataR'=>$this->db->query("SELECT AVG(N_R) AS N FROM tb_r_N_p_D where ID_P_H = '$id_header'")->result(),
        //         "Nilai_KI3"=>'N'
        // );
        // $this->db->insert('tb_r_legger_d',$data1);
        
}


    function dt4(){
        $this->db->query("SELECT *,(case when tb_r_n_p_h.ID_Mapel = 'AGAMA' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as AG_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'AGAMA'then  AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as AG_KI4,
            (case when tb_r_n_p_h.ID_Mapel = 'PKN'then (tb_r_n_p_d.N_R) ELSE 0 END) as PK_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'PKN' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as PK_KI4,
            (case when tb_r_n_p_h.ID_Mapel = 'B_INDO' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as BI_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'B_INDO' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as BI_KI4,
            (case when tb_r_n_p_h.ID_Mapel = 'MTK' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as MT_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'MTK' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as MT_KI4,
            (case when tb_r_n_p_h.ID_Mapel = 'IPA' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as IPA_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'IPA' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as IPA_KI4,
            (case when tb_r_n_p_h.ID_Mapel = 'IPS' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as IPS_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'IPS' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as IPS_KI4,
            (case when tb_r_n_p_h.ID_Mapel = 'SBdP' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as SB_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'SBdP' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as SB_KI4,
            (case when tb_r_n_p_h.ID_Mapel = 'PJOK' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as PJ_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'PJOK' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as PJ_KI4,
                        (case when tb_r_n_p_h.ID_Mapel = 'MULOK1' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as MK1_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'MULOK1' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as MK1_KI4,
                        (case when tb_r_n_p_h.ID_Mapel = 'MULOK2' then AVG(tb_r_n_p_d.N_R) ELSE 0 END) as MK2_KI3,
            (case when tb_r_n_p_h.ID_Mapel = 'MULOK2' then AVG(tb_r_harian_k_d.N_N) ELSE 0 END) as MK2_KI4,AVG(tb_r_n_p_d.N_R) AS Rata1,AVG(tb_r_harian_k_d.N_N) AS Rata2 
            FROM tb_r_n_p_h LEFT join tb_r_n_p_d ON tb_r_n_p_h.ID_P_H=tb_r_n_p_d.ID_P_H LEFT join TB_R_N_HARIAN_K_H ON tb_r_n_p_h.NISN=TB_R_N_HARIAN_K_H.NISN LEFT join tb_r_harian_k_d ON tb_r_harian_k_d.ID_Nilai_H_K=TB_R_N_HARIAN_K_H.ID_Nilai_H_K LEFT join tbl_tahun_akademik ON tb_r_N_p_h.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik LEFT join tb_m_siswa ON TB_R_N_HARIAN_K_H.NISN=tb_m_siswa.NISN join tb_m_mapel ON tb_r_N_p_h.ID_Mapel = tb_m_mapel.ID_Mapel join tb_r_deskripsi ON tb_r_N_p_h.NISN = tb_r_deskripsi.NISN join tb_r_absen ON tb_r_N_p_h.NISN = tb_r_absen.NISN"
        )->result();
    }

                

            public function getIDNilai()
    {
        $this->db->select_max('ID_Nilai_H');
        $query = $this->db->get('tb_r_nilai_H_h');
        if($query->num_rows() > 0)
        foreach ($query->result() as $row){
            $query = $row->ID_Nilai_H;
        }else{
            $query = "0";
        }
     $noUrut = (int) ($query);
     $noUrut++;
     $newID = printf("%04s", $noUrut);
     return $newID;
    }

        public function getKKM1($ID_Mapel)
    {
        if($ID_Mapel==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT * FROM tb_m_kkm where ID_Mapel = '$ID_Mapel'");
            foreach ($query->result() as $row)
            {
                echo $row->KKM;
            }
        }
        
    }

    public function getID()
    {
        $q = $this->db->query("select MAX(ID_P_H) as ID_max from tb_r_n_p_h");
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
        $this->db->from('tb_r_N_p_h');
        $this->db->join('tb_R_N_p_d', 'tb_r_N_p_h.ID_P_H = tb_R_N_p_d.ID_P_H');
        $this->db->join('tb_m_siswa', 'tb_r_N_p_h.NISN = tb_m_siswa.NISN');
        $this->db->join('tb_m_rombel','tb_r_N_p_h.ID_Rombel=tb_m_rombel.ID_Rombel');
        $this->db->join('tb_m_mapel', 'tb_r_N_p_h.ID_Mapel = tb_m_mapel.ID_Mapel');
        $this->db->join('tb_m_kd', 'tb_R_N_p_d.ID_KD = tb_m_kd.ID_KD');
        $this->db->join('tbl_tahun_akademik', 'tb_r_N_p_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik');
        $this->db->group_by('tb_r_N_p_h.ID_P_H','ASC');
        $this->db->order_by('tb_r_N_p_h.ID_P_H','desc');
        // $this->db->group_by('tb_r_n_harian_p_h.ID_Nilai_H_P');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

        public function dataTable2(){
        $this->db->select('*');
        $this->db->from('tb_r_n_harian_p_h');
        $this->db->join('tb_m_siswa', 'tb_r_n_harian_p_h.NISN = tb_m_siswa.NISN');
        $this->db->join('tb_m_rombel','tb_r_n_harian_p_h.ID_Rombel=tb_m_rombel.ID_Rombel');
        $this->db->join('tb_m_mapel', 'tb_r_n_harian_p_h.ID_Mapel = tb_m_mapel.ID_Mapel');
        $this->db->join('tbl_tahun_akademik', 'tb_r_n_harian_p_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik');
        $this->db->order_by('tb_r_n_harian_p_h.ID_Nilai_H_P','ASC');
        // $this->db->group_by('tb_r_n_harian_p_h.ID_Nilai_H_P');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

    public function dataTable1($id){
        $id = $this->input->post('ID_Nilai_Tugas');
        $this->db->select('*');
        $this->db->from('tb_r_nilai_tugas_h');
        $this->db->join('tb_r_nilai_tugas_d', 'tb_r_nilai_tugas_h.ID_Nilai_Tugas = tb_r_nilai_tugas_d.ID_Nilai_Tugas');
        $this->db->join('tb_m_siswa', 'tb_r_nilai_tugas_d.NISN = tb_m_siswa.NISN','Left');
        $this->db->join('tb_m_mapel', 'tb_r_nilai_tugas_h.ID_Mapel = tb_m_mapel.ID_Mapel','Left');
        $this->db->join('tbl_tahun_akademik', 'tb_r_nilai_tugas_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik','Left');
        $this->db->where('tb_r_nilai_tugas_h.ID_Nilai_Tugas=',$id);
        $this->db->order_by('tb_r_nilai_tugas_h.ID_Nilai_Tugas');
        $this->db->group_by('tb_r_nilai_tugas_h.ID_Nilai_Tugas');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

//     function update() {

//         //     $data = array(
                                
//         //     'ID_P_H'      => $this->input->post('ID_P_H', TRUE),
//         //     'ID_Mapel'          => $this->input->post('ID_Mapel', TRUE),
//         //     'KKM' => $this->input->post('KKM', TRUE),
//         //     'ID_Rombel'=> $this->input->post('ID_Rombel', TRUE),
//         //     'id_tahun_akademik'  => $this->input->post('id_tahun_akademik', TRUE),
//         //     'NISN'  => $this->input->post('NISN', TRUE),
//         //     'Semester'  => $this->input->post('Semester', TRUE),
//         // );

//         // $ID_P_H   = $this->input->post('ID_P_H');
//         // $this->db->where('ID_P_H',$ID_P_H);
//         // $this->db->update('tb_r_N_p_h',$data);
        
//         // $query = $this->db->get_where('tb_r_N_p_H', array('ID_P_H' => $_POST['ID_P_H']));
//         // $ID_P_H = "";
//         // foreach ($query->result() as $row) $ID_P_H = $row->ID_P_H;
//         // $ID_KD = $_POST['ID_KD2'];
//         // foreach( $ID_KD as $key => $ID_KD ) {
//         //     $data1=array(

//         //         "ID_P_H"=>$ID_P_H,
//         //         "ID_KD"=>$ID_KD,
//         //         "N_1"=>$_POST['N_12'][$key],
//         //         "N_2"=>$_POST['N_22'][$key],
//         //         "N_2"=>$_POST['N_22'][$key],
//         //         "N_4"=>$_POST['N_42'][$key],
//         //         "N_UAS"=>$_POST['N_UAS'][$key],
//         //         "N_R"=>$_POST['N_R2'][$key],
//         //         "J_KD2"=>2,
//         //     );
//         // $ID_P_H   = $this->input->post('ID_P_H');
//         // $this->db->where('ID_P_H',$ID_P_H);
//         // $this->db->update('tb_r_N_p_D',$data1);


// $ID_KD2 = $_POST['ID_KD2'];
// // $ID_P_H = $_POST['ID_P_H'];
// $ID_P_H       = $this->uri->segment(3);
//         foreach( $ID_KD2 as $key => $n ) {
            
//             $data=array(
//                 "ID_P_H"=>$ID_P_H,
//                 "ID_KD"=>$n,
//                 "N_1"=>$_POST['N_12'][$key],
//                 "N_2"=>$_POST['N_22'][$key],
//                 "N_3"=>$_POST['N_32'][$key],
//                 "N_4"=>$_POST['N_42'][$key],
//                 "N_N"=>$_POST['N_N2'][$key],
//                 "N_UAS"=>$_POST['N_UAS'][$key],
//                 "N_R2"=>$_POST['N_R2'][$key],
//                 "J_KD2"=>2,
//                 // "Nilai_Raport"=>$_POST['Nilai_Raport'][$key]
//             );
// // var_dump($ID_KD2,$ID_P_H,$data)/die();
//         // $this->db->where('ID_P_H',$ID_P_H);

//             var_dump($data)/die();

//         $this->db->insert('tb_r_n_p_d',$data);

//         $this->session->set_flashdata('success','Data Raport dengan NISN telah berhasil disimpan.');

//         }   

//     }


}