<?php

class Model_n_rekap extends CI_Model {



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

    public function getKD1()
        {
            $this->db->order_by('tb_m_kd.Kode_KD', 'asc');
            $this->db->where('tb_m_kd.J_KD',1);
            $this->db->join('tb_r_n_uas_d', 'tb_r_n_uas_d.ID_KD = tb_m_kd.ID_KD');
            $this->db->join('tb_m_mapel', 'tb_m_mapel.ID_Mapel = tb_m_kd.ID_Mapel');
            return $this->db->get('tb_m_kd')->result();
        }


 //    public function get_siswa_by_rombel($id){
 //  return $this->db->where("ID_Rombel",$id,false)->get("tb_m_siswa");
 // }




    function save() {
       $ID_Rekap=$_POST['ID_Rekap'];
       $NISN=$_POST['NISN'];
foreach( $NISN as $key => $n ) {
        $data=array(
                "ID_Rekap"=>$_POST['ID_Rekap'],
                "ID_Mapel"=>$_POST['ID_Mapel'],
                "Nilai"=>$_POST['N1'][$key],
                "Nilai"=>$_POST['N2'][$key],
                "Nilai"=>$_POST['N3'][$key],
                "Nilai"=>$_POST['N4'][$key],
                "Nilai"=>$_POST['N5'][$key],
                "Nilai"=>$_POST['N6'][$key],
            );
            $this->db->insert('tb_r_rekap',$data);
$this->session->set_flashdata('success','Data Nilai UAS dengan NISN : '.$NISN.' Mapel : ' .$ID_Mapel. ' Semester : ' .$Semester. ' telah berhasil disimpan.');
        }   
}

            public function getIDNilai()
    {
        $this->db->select_max('ID_N_UAS');
        $query = $this->db->get('tb_r_n_uas_h');
        if($query->num_rows() > 0)
        foreach ($query->result() as $row){
            $query = $row->ID_N_UAS;
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
        $q = $this->db->query("select MAX(ID_N_UAS) as ID_max from tb_r_n_uas_h");
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

    public function dataTable(){
       $this->db->select('*');
        $this->db->from('tb_r_N_p_h');
        $this->db->join('tb_R_N_p_d', 'tb_r_N_p_h.ID_P_H = tb_R_N_p_d.ID_P_H');
        $this->db->join('tb_m_siswa', 'tb_r_N_p_h.NISN = tb_m_siswa.NISN');
        $this->db->join('tb_m_rombel','tb_r_N_p_h.ID_Rombel=tb_m_rombel.ID_Rombel');
        $this->db->join('tb_m_mapel', 'tb_r_N_p_h.ID_Mapel = tb_m_mapel.ID_Mapel');
        $this->db->join('tb_m_kd', 'tb_R_N_p_d.ID_KD = tb_m_kd.ID_KD');
        $this->db->join('tbl_tahun_akademik', 'tb_r_N_p_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik');
        $this->db->group_by('tb_r_N_p_h.ID_Rombel','ASC');
        $this->db->order_by('tb_r_N_p_h.ID_Rombel','ASC');
        // $this->db->group_by('tb_r_n_harian_p_h.ID_Nilai_H_P');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

public function dataTable2(){
        $this->db->select('*');
        $this->db->from('tb_r_n_uas_h');
        $this->db->join('tb_r_n_uas_d', 'tb_r_n_uas_h.ID_N_UAS = tb_r_n_uas_d.ID_N_UAS');
        $this->db->join('tb_m_siswa', 'tb_r_n_uas_h.NISN = tb_m_siswa.NISN');
        $this->db->join('tb_m_rombel','tb_r_n_uas_h.ID_Rombel=tb_m_rombel.ID_Rombel');
        $this->db->join('tb_m_mapel', 'tb_r_n_uas_h.ID_Mapel = tb_m_mapel.ID_Mapel');
        $this->db->join('tb_m_kd', 'tb_r_n_uas_d.ID_KD = tb_m_kd.ID_KD');
        $this->db->join('tbl_tahun_akademik', 'tb_r_n_uas_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik');
        $this->db->order_by('tb_r_n_uas_h.ID_N_UAS','ASC');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }


}