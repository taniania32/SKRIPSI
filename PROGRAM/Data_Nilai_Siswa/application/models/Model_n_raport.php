<?php

class Model_n_raport extends CI_Model {



//


public function getSiswa()
    {
        $query = $this->db->query("SELECT * FROM tb_m_siswa");
        return $query->result_array();
    }

    public function getIndukSiswa($NISN)
    {
        if($NISN==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT * FROM tb_m_siswa where NISN = '$NISN'");
            foreach ($query->result() as $row)
            {
                echo $row->No_Induk;
            }
        }
        
    }

    public function getEkskul(){
        $this->db->select('*');
        $this->db->from('tb_m_ekskul');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

    public function getNISN1($NISN)
    {
        if($NISN==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT * FROM tb_m_siswa where NISN = '$NISN'");
            foreach ($query->result() as $row)
            {
                echo $row->NISN;
            }
        }
        
    }

        public function pencarian_d($NISN){
        return $this->db->query("SELECT * FROM tb_r_nilai_h INNER JOIN tb_r_nilai_d ON tb_r_nilai_h.ID_Nilai = tb_r_nilai_d.ID_Nilai
                INNER JOIN tb_m_mapel ON tb_m_mapel.ID_Mapel = tb_r_nilai_h.ID_Mapel WHERE tb_r_nilai_d.NISN='$NISN'");
    }

        public function getTB($NISN)
    {
        if($NISN==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT * FROM tb_m_tb_bb where NISN = '$NISN'");
            foreach ($query->result() as $row)
            {
                echo $row->TB;
            }
        }
        
    }

public function getBB($NISN)
    {
        if($NISN==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT * FROM tb_m_tb_bb where NISN = '$NISN'");
            foreach ($query->result() as $row)
            {
                echo $row->BB;
            }
        }
        
    }

public function getLihat($NISN)
    {
        if($NISN==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT * FROM tb_m_tb_bb where NISN = '$NISN'");
            foreach ($query->result() as $row)
            {
                echo $row->Penglihatan;
            }
        }
        
    }

    public function getDengar($NISN)
    {
        if($NISN==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT * FROM tb_m_tb_bb where NISN = '$NISN'");
            foreach ($query->result() as $row)
            {
                echo $row->Pendengaran;
            }
        }
        
    }

    public function getGigi($NISN)
    {
        if($NISN==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT * FROM tb_m_tb_bb where NISN = '$NISN'");
            foreach ($query->result() as $row)
            {
                echo $row->Gigi;
            }
        }
        
    }
    public function getTahunAkademik($NISN)
    {
        if($NISN==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT * FROM tb_r_nilai_h a join tb_r_nilai_d b on a.ID_Nilai=b.ID_Nilai join tbl_tahun_akademik c on a.id_tahun_akademik=c.id_tahun_akademik where b.NISN = '$NISN'");
            foreach ($query->result() as $row)
            {
                echo $row->tahun_akademik;
            }
        }
        
    }


        public function getNilaiP($NISN)
    {
        if($NISN==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT * FROM tb_r_nilai_h a join tb_r_nilai_d b on a.ID_Nilai=b.ID_Nilai where b.NISN = '$NISN'");
            foreach ($query->result() as $row)
            {
                echo $row->Nilai_Raport;
            }
        }
        
    }

        public function getSemester($NISN)
    {
        if($NISN==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT * FROM tb_r_nilai_h a join tb_r_nilai_d b on a.ID_Nilai=b.ID_Nilai where b.NISN = '$NISN'");
            foreach ($query->result() as $row)
            {
                echo $row->Semester;
            }
        }
        
    }

    public function getRombel($NISN)
    {
        if($NISN==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT * FROM tb_m_siswa a join tb_m_rombel b on a.ID_Rombel=b.ID_Rombel where a.NISN = '$NISN'");
            foreach ($query->result() as $row)
            {
                echo $row->Nama_Rombel;
            }
        }
        
    }


    public function getNISN($NISN)
    {
        if($NISN==""){
            echo "";
        }else{
            $query = $this->db->query("SELECT * FROM tb_m_siswa where NISN = '$NISN'");
            foreach ($query->result() as $row)
            {
                echo $row->NISN;
            }
        }
        
    }


        public function get_mpl()
        {
            $this->db->order_by('ID_Mapel', 'asc');
            return $this->db->get('tb_m_mapel')->result();
        }

        public function get_rmbl()
        {
            $this->db->order_by('ID_Rombel', 'asc');
            return $this->db->get('tb_m_rombel')->result();
        }

                public function get_Siswa()
        {
            $this->db->order_by('Nama', 'asc');
            return $this->db->get('tb_m_siswa')->result();
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

        public function getSw2(){
        $this->db->select('*');
        $this->db->from('tb_m_siswa');
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
        $ID_Raport=$_POST['ID_Raport'];
        // $ID_Legger_D=$_POST['ID_Legger_D'];
        $NISN=$_POST['NISN'];
        $Semester=$_POST['Semester'];
        $id_tahun_akademik=$_POST['id_tahun_akademik'];
        $ID_Mapel=$_POST['ID_Mapel'];
        $ID_Rombel=$_POST['ID_Rombel'];

            $cek=$this->db->query("SELECT * from tb_r_raport_h where NISN ='$NISN'")->num_rows();
            if($cek>0){
                $this->session->set_flashdata('error',"NISN : " .$NISN. " Sudah Digunakan");
                redirect('n_raport');
                // $this->template->load('template', 'n_raport/list2',$data);
                var_dump($this->input->post());
            }


        $data=array(
                "ID_Raport"=>$_POST['ID_Raport'],
                // "ID_Legger"=>$_POST['ID_Legger'],
                "NISN"=>$_POST['NISN'],
                "S_Spirit"=>$_POST['Sikap_Spiritual'],
                "S_Sosial"=>$_POST['Sikap_Sosial'],
                "ID_Ekskul"=>$_POST['ID_Ekskul'],
                "Ket_Ekskul"=>$_POST['Ket_Ekskul'],
                "Saran"=>$_POST['Saran'],
                "J_Prestasi"=>$_POST['J_Prestasi'],
                "K_Prestasi"=>$_POST['K_Prestasi'],
                "Keputusan"=>$_POST['KP'],
            );
        $this->db->insert('tb_r_raport_h',$data);

        $data1=array(
                "S_R"=>1
        );
        $this->db->where('NISN',$_POST['NISN']);
        $this->db->update('tb_r_n_p_h',$data1);

$data1=array(
                "S_R"=>1
        );
        $this->db->where('NISN',$_POST['NISN']);
        $this->db->update('tb_r_n_harian_k_h',$data1);

              $this->session->set_flashdata('success','Data Raport dengan NISN : ' .$NISN. ' Semester : ' .$Semester. ' telah berhasil disimpan.');
        // $this->template->load('template', 'n_raport/list2',$data);
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
        $this->db->select('*');
        $this->db->from('tb_r_legger_h');
        $this->db->join('tb_r_legger_d', 'tb_r_legger_h.ID_Legger = tb_r_legger_d.ID_Legger','Left');
        $this->db->join('tb_m_siswa', 'tb_r_legger_h.NISN = tb_m_siswa.NISN','Left');
        $this->db->join('tb_m_rombel','tb_r_legger_h.ID_Rombel=tb_m_rombel.ID_Rombel','Left');
        $this->db->join('tb_m_guru','tb_m_rombel.ID_Rombel=tb_m_guru.ID_Rombel','Left');
        $this->db->join('tb_m_mapel', 'tb_r_legger_d.ID_Mapel = tb_m_mapel.ID_Mapel','Left');
        $this->db->join('tbl_tahun_akademik', 'tb_r_legger_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik','Left');
        $this->db->where('tb_r_legger_h.ST_Raport=',0);
        $this->db->order_by('tb_r_legger_h.ID_Legger','ASC');
        $this->db->group_by('tb_r_legger_h.ID_Legger');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

    public function dataTableN(){
        $this->db->select('*');
        $this->db->from('tb_r_raport_h');
        $this->db->join('tb_r_n_p_h', 'tb_r_n_p_h.NISN = tb_r_raport_h.NISN','Left');
        $this->db->join('tb_r_n_p_D', 'tb_r_n_p_h.ID_P_H = tb_r_n_p_D.ID_P_H','Left');
        $this->db->join('tb_r_n_harian_k_h', 'tb_r_n_p_h.NISN = tb_r_n_harian_k_h.NISN','Left');
        $this->db->join('tb_r_harian_k_d', 'tb_r_n_harian_k_h.ID_Nilai_H_K = tb_r_harian_k_d.ID_Nilai_H_K','Left');
        $this->db->join('tb_m_siswa', 'tb_r_n_p_h.NISN = tb_m_siswa.NISN','Left');
        $this->db->join('tb_m_rombel','tb_r_n_p_h.ID_Rombel=tb_m_rombel.ID_Rombel','Left');
        $this->db->join('tb_m_guru','tb_m_rombel.ID_Rombel=tb_m_guru.ID_Rombel','Left');
        $this->db->join('tb_m_mapel', 'tb_r_n_p_h.ID_Mapel = tb_m_mapel.ID_Mapel','Left');
        $this->db->join('tbl_tahun_akademik', 'tb_r_n_p_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik','Left');
        $this->db->order_by('tb_r_raport_h.ID_Raport','ASC');
        $this->db->group_by('tb_r_raport_h.ID_Raport');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

public function dataTableN2(){
$id_user=$this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('tb_r_raport_h');
        $this->db->join('tb_r_n_p_h', 'tb_r_n_p_h.NISN = tb_r_raport_h.NISN','Left');
        $this->db->join('tb_r_n_p_D', 'tb_r_n_p_h.ID_P_H = tb_r_n_p_D.ID_P_H','Left');
        $this->db->join('tb_r_n_harian_k_h', 'tb_r_n_p_h.NISN = tb_r_n_harian_k_h.NISN','Left');
        $this->db->join('tb_r_harian_k_d', 'tb_r_n_harian_k_h.ID_Nilai_H_K = tb_r_harian_k_d.ID_Nilai_H_K','Left');
        $this->db->join('tb_m_siswa', 'tb_r_n_p_h.NISN = tb_m_siswa.NISN','Left');
        $this->db->join('tb_m_rombel','tb_r_n_p_h.ID_Rombel=tb_m_rombel.ID_Rombel','Left');
        $this->db->join('tb_m_guru','tb_m_rombel.ID_Rombel=tb_m_guru.ID_Rombel','Left');
        $this->db->join('tb_m_mapel', 'tb_r_n_p_h.ID_Mapel = tb_m_mapel.ID_Mapel','Left');
        $this->db->join('tbl_tahun_akademik', 'tb_r_n_p_h.id_tahun_akademik = tbl_tahun_akademik.id_tahun_akademik','Left');
        $this->db->where('tb_r_raport_h.NISN',$id_user);
        $this->db->order_by('tb_r_raport_h.ID_Raport','ASC');
        $this->db->group_by('tb_r_raport_h.ID_Raport');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }


        public function data1(){
$this->db->select('*');
$this->db->from('tb_r_raport_h');
        $this->db->join('tb_r_legger_h', 'tb_r_raport_h.ID_Legger = tb_r_legger_h.ID_Legger','Left');
        $this->db->join('tbl_tahun_akademik', 'tbl_tahun_akademik.id_tahun_akademik = tb_r_legger_h.id_tahun_akademik','Left');
        $this->db->join('tb_m_siswa','tb_r_legger_h.NISN=tb_m_siswa.NISN','Left');
        $this->db->join('tb_m_rombel', 'tb_m_rombel.ID_Rombel = tb_m_siswa.ID_Rombel','Left');
        $this->db->join('tb_m_guru', 'tb_m_guru.ID_Rombel = tb_m_rombel.ID_Rombel','Left');
        $this->db->join('tb_m_tipe_guru', 'tb_m_guru.ID_Tipe_Guru = tb_m_tipe_guru.ID_Tipe_Guru','Left');
        $this->db->order_by('tb_m_siswa.NISN','ASC');
        $this->db->group_by('tb_m_siswa.NISN');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

       public function data2(){
$this->db->select('*');
$this->db->from('tb_r_raport_h');
        $this->db->join('tb_m_tb_bb', 'tb_r_raport_h.NISN = tb_m_tb_bb.NISN','Left');
        $this->db->order_by('tb_m_tb_bb.NISN','ASC');
        $this->db->group_by('tb_m_tb_bb.NISN');
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

        public function getID()
    {
        $q = $this->db->query("select MAX(ID_Raport) as ID_max from tb_r_raport_h");
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
        var_dump($kd)/die();
    }

    function update() {
            $data = array(
            'Semester'      => $this->input->post('Semester', TRUE),
            'ID_Mapel'          => $this->input->post('ID_Mapel', TRUE),
            'KKM' => $this->input->post('KKM', TRUE),
            'ID_Rombel'=> $this->input->post('ID_Rombel', TRUE),
            'id_tahun_akademik'  => $this->input->post('id_tahun_akademik', TRUE)
        );

        $ID_Legger   = $this->input->post('ID_Legger');
        $this->db->where('ID_Legger',$ID_Legger);
        $this->db->update('tb_r_legger_h',$data);
        
        $query = $this->db->get_where('tb_r_legger_d', array('ID_Legger' => $_POST['ID_Legger']));
        $ID_Legger = "";
        foreach ($query->result() as $row) $ID_Legger = $row->ID_Legger;
        $ID_Mapel = $_POST['ID_Mapel'];
        foreach( $ID_Mapel as $key => $ID_Mapel ) {
            $data=array(
                "ID_Legger"=>$ID_Legger,
                "ID_Mapel"=>$ID_Mapel
            );
        $ID_Legger   = $this->input->post('ID_Legger');
        $this->db->where('ID_Legger',$ID_Legger);

        $this->db->update('tb_r_legger_d',$data);

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