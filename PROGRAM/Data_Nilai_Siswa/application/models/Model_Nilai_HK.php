<?php

class Model_Nilai_HK extends CI_Model {



//

        public function get_rmbl()
        {
            $this->db->order_by('ID_Rombel', 'asc');
            return $this->db->get('tb_m_rombel')->result();
        }

               public function getMpl()
        {
            $this->db->order_by('ID_Mapel', 'asc');
            return $this->db->get('tb_m_mapel')->result();
        }

            public function getKD()
        {
            $this->db->order_by('tb_m_kd.Kode_KD', 'asc');
            $this->db->where('tb_m_kd.J_KD',2);
            $this->db->join('tb_m_mapel', 'tb_m_mapel.ID_Mapel = tb_m_kd.ID_Mapel');
            return $this->db->get('tb_m_kd')->result();
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
        $ID_Nilai_H_K=$_POST['ID_Nilai_H_K'];
        $NISN=$_POST['NISN'];
        $Semester=$_POST['Semester'];
        $id_tahun_akademik=$_POST['id_tahun_akademik'];
        $ID_Mapel=$_POST['ID_Mapel'];
        $ID_Rombel=$_POST['ID_Rombel'];
        $ID_KD=$_POST['ID_KD'];
        
        foreach( $NISN as $key => $n ) {
            $cek=$this->db->query("SELECT * from tb_r_n_harian_k_h where tb_r_n_harian_k_h.NISN ='$n' and tb_r_n_harian_k_h.Semester='$Semester' and tb_r_n_harian_k_h.id_tahun_akademik='$id_tahun_akademik' and tb_r_n_harian_k_h.ID_Mapel='$ID_Mapel'")->num_rows();

            if($cek>0){
                $this->session->set_flashdata('error',"NISN : " .$n. " Sudah Digunakan");
                redirect('nilai_HK/add');
                var_dump($this->input->post());
            }
        }

        $data=array(
                "ID_Nilai_H_K"=>$_POST['ID_Nilai_H_K'],
                "ID_Mapel"=>$_POST['ID_Mapel'],
                "NISN"=>$NISN,
                "KKM"=>$_POST['KKM'],
                "id_tahun_akademik"=>$_POST['id_tahun_akademik'],
                "Semester"=>$_POST['Semester'],
                "ID_Rombel"=>$_POST['ID_Rombel'],
            );
        $this->db->insert('tb_r_n_harian_k_h',$data);
        $query = $this->db->get_where('tb_r_n_harian_k_h', array('ID_Nilai_H_K' => $_POST['ID_Nilai_H_K']));
        $id_header = "";
        foreach ($query->result() as $row) $id_header = $row->ID_Nilai_H_K;
        // $NISN = $_POST['NISN'];
        foreach( $ID_KD as $key => $n ) {
            
            $data=array(
                "ID_Nilai_H_K"=>$id_header,
                "ID_KD"=>$n,
                "N_1"=>$_POST['N_1'][$key],
                "N_2"=>$_POST['N_2'][$key],
                "N_3"=>$_POST['N_3'][$key],
                "N_4"=>$_POST['N_4'][$key],
                "N_N"=>$_POST['N_N'][$key]
                // "Nilai_Raport"=>$_POST['Nilai_Raport'][$key]
            );

            $this->db->insert('tb_r_harian_K_d',$data);
$this->session->set_flashdata('success','Data Nilai Harian Keterampilan dengan NISN : '.$NISN.' Mapel : ' .$ID_Mapel. ' Semester : ' .$Semester. ' telah berhasil disimpan.');
        }   
}

            public function getIDNilai()
    {
        $this->db->select_max('ID_Nilai_U');
        $query = $this->db->get('tb_r_nilai_HK_h');
        if($query->num_rows() > 0)
        foreach ($query->result() as $row){
            $query = $row->ID_Nilai_U;
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
        $q = $this->db->query("select MAX(ID_Nilai_H_K) as ID_max from tb_r_n_harian_k_h");
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
//         $this->db->insert('tb_r_nilai_HK_h',$data);

// $data = array(
//                 'NISN'           => $this->input->post('NISN', TRUE),
//             'Nilai_Tugas1'        => $this->input->post('Nilai_Tugas1', TRUE),
//             'Nilai_Tugas2'        => $this->input->post('Nilai_Tugas2', TRUE),
//             'Nilai_Tugas3'        => $this->input->post('Nilai_Tugas3', TRUE),
//             'Nilai_Tugas4'        => $this->input->post('Nilai_Tugas4', TRUE),
//             'Nilai_Tugas5'        => $this->input->post('Nilai_Tugas5', TRUE),
//             'Nilai_Rata'     => $this->input->post('Nilai_Rata',TRUE)
//         );
//         $this->db->insert('tb_r_nilai_HK_d',$data);

//         $tahun_akademik = $this->db->get_where('tbl_tahun_akademik',array('is_aktif'=>'y'))->row_array();
//     }

    public function dataTable(){
        $this->db->select('*');
        $this->db->from('tb_r_n_harian_k_h');
        $this->db->join('tb_r_harian_k_d', 'tb_r_n_harian_k_h.ID_Nilai_H_K = tb_r_harian_k_d.ID_Nilai_H_K');
        $this->db->join('tb_m_siswa', 'tb_r_n_harian_k_h.NISN = tb_m_siswa.NISN');
        $this->db->join('tb_m_rombel','tb_r_n_harian_k_h.ID_Rombel=tb_m_rombel.ID_Rombel');
        $this->db->join('tb_m_mapel', 'tb_r_n_harian_k_h.ID_Mapel = tb_m_mapel.ID_Mapel');
        $this->db->join('tb_m_kd', 'tb_m_kd.ID_KD = tb_r_harian_k_d.ID_KD');
        $this->db->join('tbl_tahun_akademik', 'tb_r_n_harian_k_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik');
        $this->db->order_by('tb_r_n_harian_k_h.ID_Nilai_H_K','desc');
        $this->db->group_by('tb_r_n_harian_k_h.ID_Nilai_H_K');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

    public function dataTable2(){
        $this->db->select('*');
        $this->db->from('tb_r_n_harian_k_h');
        $this->db->join('tb_r_harian_k_d', 'tb_r_n_harian_k_h.ID_Nilai_H_K = tb_r_harian_k_d.ID_Nilai_H_K');
        $this->db->join('tb_m_siswa', 'tb_r_n_harian_k_h.NISN = tb_m_siswa.NISN');
        $this->db->join('tb_m_rombel','tb_r_n_harian_k_h.ID_Rombel=tb_m_rombel.ID_Rombel');
        $this->db->join('tb_m_mapel', 'tb_r_n_harian_k_h.ID_Mapel = tb_m_mapel.ID_Mapel');
        $this->db->join('tb_m_kd', 'tb_m_kd.ID_KD = tb_r_harian_k_d.ID_KD');
        $this->db->join('tbl_tahun_akademik', 'tb_r_n_harian_k_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik');
        $this->db->order_by('tb_r_n_harian_k_h.ID_Nilai_H_K','ASC');

        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }


}