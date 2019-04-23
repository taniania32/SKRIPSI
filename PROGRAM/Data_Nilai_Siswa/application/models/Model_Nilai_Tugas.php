<?php

class Model_Nilai_Tugas extends CI_Model {



//

        public function get_rmbl()
        {
            $this->db->order_by('ID_Rombel', 'asc');
            return $this->db->get('tb_m_rombel')->result();
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


    public function getMapel()
    {
        $query = $this->db->query("SELECT * FROM tb_m_mapel");
        return $query->result_array();
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

    public function getKKM(){
        $this->db->select('*');
        $this->db->from('tb_m_kkm');
        // $this->db->join('tb_m_kkm','tb_m_kkm.ID_Mapel = tb_r_legger_d.ID_Mapel','Left');
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

public function getCmbThn1(){
        $this->db->select('*');
        $this->db->from('tbl_tahun_akademik');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }
 //    public function get_siswa_by_rombel($id){
 //  return $this->db->where("ID_Rombel",$id,false)->get("tb_m_siswa");
 // }




    function save() {
        $ID_Legger=$_POST['ID_Legger'];
        $NISN=$_POST['NISN'];
        $Semester=$_POST['Semester'];
        $id_tahun_akademik=$_POST['id_tahun_akademik'];
        $ID_Mapel=$_POST['ID_Mapel'];
        $ID_Rombel=$_POST['ID_Rombel'];

            $cek=$this->db->query("SELECT * from tb_r_legger_h where tb_r_legger_h.NISN ='$NISN' and tb_r_legger_h.Semester='$Semester' and tb_r_legger_h.id_tahun_akademik='$id_tahun_akademik'")->num_rows();
            if($cek>0){
                $this->session->set_flashdata('error',"NISN : " .$NISN. " Sudah Digunakan");
                redirect('nilai_tugas/add');
                var_dump($this->input->post());
            }


        $data=array(
                "ID_Legger"=>$_POST['ID_Legger'],
                "NISN"=>$_POST['NISN'],
                "id_tahun_akademik"=>$_POST['id_tahun_akademik'],
                "Semester"=>$_POST['Semester'],
                "ID_Rombel"=>$_POST['ID_Rombel'],
                "Sikap_Nilai_KI1"=>$_POST['Sikap_Nilai_KI1'],
                "Sikap_Nilai_KI2"=>$_POST['Sikap_Nilai_KI2'],
                "S"=>$_POST['S'],
                "I"=>$_POST['I'],
                "A"=>$_POST['A'],
            );
        $this->db->insert('tb_r_legger_h',$data);
        $query = $this->db->get_where('tb_r_legger_h', array('ID_Legger' => $_POST['ID_Legger']));
        $id_header = "";
        foreach ($query->result() as $row) $id_header = $row->ID_Legger;

        // $NISN = $_POST['NISN'];
        foreach( $ID_Mapel as $key => $n ) {
            
            $data=array(
                "ID_Legger"=>$id_header,
                "ID_Mapel"=>$n,
                "KKM"=>$_POST['KKM'][$key],
                "Nilai_KI3"=>$_POST['Nilai_KI3'][$key],
                "Nilai_KI4"=>$_POST['Nilai_KI4'][$key],
                                "Desk_Pengetahuan"=>$_POST['Desk_Pengetahuan'][$key],
                "Desk_P_Terampil"=>$_POST['Desk_P_Terampil'][$key]
            );
            $this->db->insert('tb_r_legger_d',$data);




        //     $this->db->select_avg('Nilai_KI3');

        //     $this->db->from('tb_r_legger_d');
        //     $this->db->join('tb_r_legger_h', 'tb_r_legger_h.ID_Legger = tb_r_legger_d.ID_Legger');
        //     $this->db->where('tb_r_legger_d.ID_Legger',$ID_Legger);
        //     $query1 = $this->db->get();

        // //     $queryResult = $query1->result_array();
        // //     return $queryResult;
        // //     $data=array(
        // //         "Rata_Nilai_KI3"=>$queryResult,
        // //     );
        // // $ID_Legger  = $this->input->post('ID_Legger');
        // // $this->db->where('ID_Legger',$ID_Legger);
        // // $this->db->update('tb_r_legger_h',$data);

        }   
        
        
                    $this->session->set_flashdata('success','Data Nilai dengan NISN : ' .$NISN. ' Semester : ' .$Semester. ' telah berhasil disimpan.');
    }

            public function getIDNilai()
    {
        $this->db->select_max('ID_Nilai');
        $query = $this->db->get('tb_r_nilai_h');
        if($query->num_rows() > 0)
        foreach ($query->result() as $row){
            $query = $row->ID_Nilai;
        }else{
            $query = "0";
        }
     $noUrut = (int) ($query);
     $noUrut++;
     $newID = printf("%04s", $noUrut);
     return $newID;
    }

    public function getID()
    {
        $q = $this->db->query("select MAX(ID_Legger) as ID_max from tb_r_legger_h");
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

//         $data = array(
//             'Semester'      => $this->input->post('Semester', TRUE),
//             'ID_Mapel'          => $this->input->post('ID_Mapel', TRUE),
//             'KKM' => $this->input->post('KKM', TRUE),
//             'id_tahun_akademik'  => $this->input->post('id_tahun_akademik', TRUE)
//         );
//         $this->db->insert('tb_r_nilai_tugas_h',$data);

// $data = array(
//                 'NISN'           => $this->input->post('NISN', TRUE),
//             'Nilai_Tugas1'        => $this->input->post('Nilai_Tugas1', TRUE),
//             'Nilai_Tugas2'        => $this->input->post('Nilai_Tugas2', TRUE),
//             'Nilai_Tugas3'        => $this->input->post('Nilai_Tugas3', TRUE),
//             'Nilai_Tugas4'        => $this->input->post('Nilai_Tugas4', TRUE),
//             'Nilai_Tugas5'        => $this->input->post('Nilai_Tugas5', TRUE),
//             'Nilai_Rata'     => $this->input->post('Nilai_Rata',TRUE)
//         );
//         $this->db->insert('tb_r_nilai_tugas_d',$data);

//         $tahun_akademik = $this->db->get_where('tbl_tahun_akademik',array('is_aktif'=>'y'))->row_array();
//     }

    public function dataTable(){
        $this->db->select('*,AVG(Nilai_KI3) as Nilai_KI3, AVG(Nilai_KI4) as Nilai_KI4');
        $this->db->from('tb_r_legger_h');
        $this->db->join('tb_r_legger_d', 'tb_r_legger_h.ID_Legger = tb_r_legger_d.ID_Legger','Left');
        $this->db->join('tb_m_siswa', 'tb_r_legger_h.NISN = tb_m_siswa.NISN','Left');
        $this->db->join('tb_m_rombel','tb_r_legger_h.ID_Rombel=tb_m_rombel.ID_Rombel','Left');
        $this->db->join('tb_m_guru','tb_m_rombel.ID_Rombel=tb_m_guru.ID_Rombel','Left');
        $this->db->join('tb_m_mapel', 'tb_r_legger_d.ID_Mapel = tb_m_mapel.ID_Mapel','Left');
        $this->db->join('tbl_tahun_akademik', 'tb_r_legger_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik','Left');
        $this->db->order_by('tb_r_legger_h.ID_Legger','ASC');
        $this->db->group_by('tb_r_legger_h.ID_Legger');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

    public function dataTable2(){
        $this->db->select('*');
        $this->db->from('tb_r_legger_d');
        $this->db->join('tb_r_legger_h', 'tb_r_legger_h.ID_Legger = tb_r_legger_d.ID_Legger','Left');
        $this->db->join('tb_m_mapel', 'tb_r_legger_d.ID_Mapel = tb_m_mapel.ID_Mapel','Left');
        $this->db->join('tbl_tahun_akademik', 'tb_r_legger_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik','Left');
        $this->db->join('tb_m_siswa', 'tb_r_legger_h.NISN = tb_m_siswa.NISN','Left');
        $this->db->order_by('tb_r_legger_h.ID_Legger','ASC');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }


public function dataTable3(){
        $this->db->select('(case when tb_r_legger_d.ID_Mapel = "B_INDO" then Nilai_KI3 ELSE 0 END) as BI_KI3,
            (case when tb_r_legger_d.ID_Mapel = "B_INDO" then Nilai_KI4 ELSE 0 END) as BI_KI4,
            (case when tb_r_legger_d.ID_Mapel = "MTK" then Nilai_KI3 ELSE 0 END) as MT_KI3,
            (case when tb_r_legger_d.ID_Mapel = "MTK" then Nilai_KI4 ELSE 0 END) as MT_KI4');
        $this->db->from('tb_r_legger_d');
        $this->db->order_by('tb_r_legger_d.ID_Legger','ASC');
        $this->db->group_by('tb_r_legger_d.ID_Legger');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }


    function dt4(){
        $this->db->select('*,SUM(case when tb_r_legger_d.ID_Mapel = "AGAMA" then Nilai_KI3 ELSE 0 END) as AG_KI3,
            SUM(case when tb_r_legger_d.ID_Mapel = "AGAMA" then Nilai_KI4 ELSE 0 END) as AG_KI4,
            SUM(case when tb_r_legger_d.ID_Mapel = "PKN" then Nilai_KI3 ELSE 0 END) as PK_KI3,
            SUM(case when tb_r_legger_d.ID_Mapel = "PKN" then Nilai_KI4 ELSE 0 END) as PK_KI4,
            SUM(case when tb_r_legger_d.ID_Mapel = "B_INDO" then Nilai_KI3 ELSE 0 END) as BI_KI3,
            SUM(case when tb_r_legger_d.ID_Mapel = "B_INDO" then Nilai_KI4 ELSE 0 END) as BI_KI4,
            SUM(case when tb_r_legger_d.ID_Mapel = "MTK" then Nilai_KI3 ELSE 0 END) as MT_KI3,
            SUM(case when tb_r_legger_d.ID_Mapel = "MTK" then Nilai_KI4 ELSE 0 END) as MT_KI4,
            SUM(case when tb_r_legger_d.ID_Mapel = "IPA" then Nilai_KI3 ELSE 0 END) as IPA_KI3,
            SUM(case when tb_r_legger_d.ID_Mapel = "IPA" then Nilai_KI4 ELSE 0 END) as IPA_KI4,
            SUM(case when tb_r_legger_d.ID_Mapel = "IPS" then Nilai_KI3 ELSE 0 END) as IPS_KI3,
            SUM(case when tb_r_legger_d.ID_Mapel = "IPS" then Nilai_KI4 ELSE 0 END) as IPS_KI4,
            SUM(case when tb_r_legger_d.ID_Mapel = "SBdP" then Nilai_KI3 ELSE 0 END) as SB_KI3,
            SUM(case when tb_r_legger_d.ID_Mapel = "SBdP" then Nilai_KI4 ELSE 0 END) as SB_KI4,
            SUM(case when tb_r_legger_d.ID_Mapel = "PJOK" then Nilai_KI3 ELSE 0 END) as PJ_KI3,
            SUM(case when tb_r_legger_d.ID_Mapel = "PJOK" then Nilai_KI4 ELSE 0 END) as PJ_KI4,
                        SUM(case when tb_r_legger_d.ID_Mapel = "MULOK1" then Nilai_KI3 ELSE 0 END) as MK1_KI3,
            SUM(case when tb_r_legger_d.ID_Mapel = "MULOK1" then Nilai_KI4 ELSE 0 END) as MK1_KI4,
                        SUM(case when tb_r_legger_d.ID_Mapel = "MULOK2" then Nilai_KI3 ELSE 0 END) as MK2_KI3,
            SUM(case when tb_r_legger_d.ID_Mapel = "MULOK2" then Nilai_KI4 ELSE 0 END) as MK2_KI4,AVG (Nilai_KI3) AS Rata1,AVG (Nilai_KI4) AS Rata2'
        );
        $this->db->from('tb_r_legger_d');
        $this->db->join('tb_r_legger_h', 'tb_r_legger_h.ID_Legger = tb_r_legger_d.ID_Legger','Left');
        $this->db->join('tb_m_mapel', 'tb_r_legger_d.ID_Mapel = tb_m_mapel.ID_Mapel','Left');
        $this->db->join('tbl_tahun_akademik', 'tb_r_legger_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik','Left');
        $this->db->join('tb_m_siswa', 'tb_r_legger_h.NISN = tb_m_siswa.NISN','Left');
        $this->db->order_by('tb_r_legger_d.ID_Legger','ASC');
        $this->db->group_by('tb_r_legger_d.ID_Legger');

        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
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

    function dt5(){
        $this->db->select('*,
            (case when tb_r_legger_d.ID_Mapel = "MTK" then Nilai_KI3 ELSE 0 END) as MT_KI3,
            (case when tb_r_legger_d.ID_Mapel = "MTK" then Nilai_KI4 ELSE 0 END) as MT_KI4');
        $this->db->from('tb_r_legger_d');
        $this->db->join('tb_r_legger_h', 'tb_r_legger_h.ID_Legger = tb_r_legger_d.ID_Legger','Left');
        $this->db->join('tb_m_mapel', 'tb_r_legger_d.ID_Mapel = tb_m_mapel.ID_Mapel','Left');
        $this->db->join('tbl_tahun_akademik', 'tb_r_legger_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik','Left');
        $this->db->join('tb_m_siswa', 'tb_r_legger_h.NISN = tb_m_siswa.NISN','Left');
        $this->db->order_by('tb_r_legger_d.ID_Legger','ASC');

        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }


        public function dataNi(){
        $this->db->select('*');
        $this->db->from('tb_r_legger_d');
        $this->db->join('tb_m_mapel', 'tb_r_legger_d.ID_Mapel = tb_m_mapel.ID_Mapel','Left');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

function rata(){
            $this->db->select_avg('Nilai_KI3');
        $this->db->from('tb_r_legger_d');
        $this->db->join('tb_r_legger_h','tb_r_legger_h.ID_Legger = tb_r_legger_d.ID_Legger');
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

    function update() {
            $data = array(
            'Semester'      => $this->input->post('Semester', TRUE),
            'ID_Mapel'          => $this->input->post('ID_Mapel', TRUE),
            'KKM' => $this->input->post('KKM', TRUE),
            'ID_Rombel'=> $this->input->post('ID_Rombel', TRUE),
            'id_tahun_akademik'  => $this->input->post('id_tahun_akademik', TRUE)
        );

        $ID_Nilai_Tugas   = $this->input->post('ID_Nilai_Tugas');
        $this->db->where('ID_Nilai_Tugas',$ID_Nilai_Tugas);
        $this->db->update('tb_r_nilai_tugas_h',$data);
        
        $query = $this->db->get_where('tb_r_nilai_tugas_d', array('ID_Nilai_Tugas' => $_POST['ID_Nilai_Tugas']));
        $ID_Nilai_Tugas = "";
        foreach ($query->result() as $row) $ID_Nilai_Tugas = $row->ID_Nilai_Tugas;
        $NISN = $_POST['NISN'];
        foreach( $NISN as $key => $NISN ) {
            $data=array(
                "ID_Nilai_Tugas"=>$ID_Nilai_Tugas,
                "NISN"=>$NISN,
                "NilaiTugas"=>$_POST['Nilai_Tugas1'][$key],
                "Nilai_Tugas2"=>$_POST['Nilai_Tugas2'][$key],
                "Nilai_Tugas3"=>$_POST['Nilai_Tugas3'][$key],
                "Nilai_Tugas4"=>$_POST['Nilai_Tugas4'][$key],
                "Nilai_Tugas5"=>$_POST['Nilai_Tugas4'][$key],
                "Nilai_Rata"=>$_POST['Nilai_Rata'][$key]
            );
        $ID_Nilai_Tugas   = $this->input->post('ID_Nilai_Tugas');
        $this->db->where('ID_Nilai_Tugas',$ID_Nilai_Tugas);

        $this->db->update('tb_r_nilai_tugas_d',$data);

        }   


        //   $data = array(
        //     'NISN'           => $this->input->post('NISN', TRUE),
        //     'Nilai_Tugas1'        => $this->input->post('Nilai_Tugas1', TRUE),
        //     'Nilai_Tugas2'        => $this->input->post('Nilai_Tugas2', TRUE),
        //     'Nilai_Tugas3'        => $this->input->post('Nilai_Tugas3', TRUE),
        //     'Nilai_Tugas4'        => $this->input->post('Nilai_Tugas4', TRUE),
        //     'Nilai_Tugas5'        => $this->input->post('Nilai_Tugas5', TRUE),
        //     'Nilai_Rata'     => $this->input->post('Nilai_Rata',TRUE)
        // );
        // $ID_Nilai_Tugas   = $this->input->post('ID_Nilai_Tugas');
        // $this->db->where('ID_Nilai_Tugas',$ID_Nilai_Tugas);
        // $this->db->update('tb_r_nilai_tugas_d',$data);
    }


}