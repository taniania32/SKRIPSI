<?php

class Model_guru extends CI_Model {

    public function dataTable(){
        $this->db->select('*');
        $this->db->from('tb_m_guru');
        $this->db->join('tb_m_tipe_guru', 'tb_m_guru.ID_Tipe_Guru = tb_m_tipe_guru.ID_Tipe_Guru','left');
        $this->db->join('tb_m_rombel', 'tb_m_guru.ID_Rombel = tb_m_rombel.ID_Rombel','left');
        $this->db->join('tb_m_mapel', 'tb_m_guru.ID_Mapel = tb_m_mapel.ID_Mapel','left');
        $this->db->order_by('tb_m_guru.NIP');
        $this->db->group_by('tb_m_guru.NIP');
        $query = $this->db->get();
        $queryResult = $query->result_array();
        return $queryResult;
    }

        // public function getCombo1()
        // {
        //     $this->db->order_by('ID_Tipe_Guru', 'asc');
        //     return $this->db->get('tb_m_tipe_guru')->result();
        // }    

    public function getCombo1(){
        $this->db->select('*');
        $this->db->from('tb_m_tipe_guru');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

    public function getCombo2(){
        $this->db->select('*');
        $this->db->from('tb_m_rombel');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

    public function getCombo3(){
        $this->db->select('*');
        $this->db->from('tb_m_mapel');
        $query = $this->db->get();

        $queryResult = $query->result_array();
        return $queryResult;
    }

    public $table ="tb_m_guru";
    
    function save() {
                $NIP=$_POST['NIP'];
        $cek=$this->db->query("select * from tb_m_guru where NIP ='$NIP'")->num_rows();
        if($cek>0){
            $this->session->set_flashdata('error',"NIP : " .$NIP. " Sudah Digunakan");
            redirect('guru/add');
        }else{
        $data = array(
            'NIP'      => $this->input->post('NIP', TRUE),
            'Nama_Guru'  => $this->input->post('Nama_Guru', TRUE),
            'NRK'     => $this->input->post('NRK', TRUE),
            'NUPTK'   => $this->input->post('NUPTK', TRUE),
            'Tempat_Lahir'   => $this->input->post('Tempat_Lahir', TRUE),
            'Tanggal_Lahir'   => $this->input->post('Tanggal_Lahir', TRUE),
            'Pangkat'   => $this->input->post('Pangkat', TRUE),
            'Golongan'   => $this->input->post('Golongan', TRUE),
            'TMT'   => $this->input->post('TMT', TRUE),
            'Status'   => $this->input->post('Status', TRUE),
            'TMT_Status'   => $this->input->post('TMT_Status', TRUE),
            'Masa_Kerja_TH'   => $this->input->post('Masa_Kerja_TH', TRUE),
            'Masa_Kerja_BL'   => $this->input->post('Masa_Kerja_BL', TRUE),
            'Nama_Instansi'   => $this->input->post('Nama_Instansi', TRUE),
            'TH_Lulus'   => $this->input->post('TH_Lulus', TRUE),			
            'Tingkat'   => $this->input->post('Tingkat', TRUE),
			'Jurusan'   => $this->input->post('Jurusan', TRUE),
            'No_Ijazah'   => $this->input->post('No_Ijazah', TRUE),
            'ID_Tipe_Guru'   => $this->input->post('ID_Tipe_Guru', TRUE),
            'ID_Rombel'   => $this->input->post('ID_Rombel', TRUE),
            'ID_Mapel'   => $this->input->post('ID_Mapel', TRUE),
            'Jumlah'   => $this->input->post('Jumlah', TRUE),
            'Tugas_Tambahan'   => $this->input->post('Tugas_Tambahan', TRUE),
            'Riwayat_Mutasi'   => $this->input->post('Riwayat_Mutasi', TRUE),
            'TMT_Tugas'   => $this->input->post('TMT_Tugas', TRUE),
            'Alamat_Rumah'   => $this->input->post('Alamat_Rumah', TRUE),
            'Ket_Guru'   => $this->input->post('Ket_Guru', TRUE),
            'No_HP'   => $this->input->post('No_HP', TRUE),
			'username'   => $this->input->post('username', TRUE),
            'password'   => md5($this->input->post('password', TRUE))
			);
        $this->db->insert('tb_m_guru',$data);
                            $this->session->set_flashdata('success','Data guru dengan NIP '.$NIP.' telah berhasil disimpan.');
    }

    }
    
    function update() {
        $data = array(
            'NIP'      => $this->input->post('NIP', TRUE),
            'Nama_Guru'  => $this->input->post('Nama_Guru', TRUE),
            'NRK'     => $this->input->post('NRK', TRUE),
            'NUPTK'   => $this->input->post('NUPTK', TRUE),
            'Tempat_Lahir'   => $this->input->post('Tempat_Lahir', TRUE),
            'Tanggal_Lahir'   => $this->input->post('Tanggal_Lahir', TRUE),
            'Pangkat'   => $this->input->post('Pangkat', TRUE),
            'Golongan'   => $this->input->post('Golongan', TRUE),
            'TMT'   => $this->input->post('TMT', TRUE),
            'Status'   => $this->input->post('Status', TRUE),
            'TMT_Status'   => $this->input->post('TMT_Status', TRUE),
            'Masa_Kerja_TH'   => $this->input->post('Masa_Kerja_TH', TRUE),
            'Masa_Kerja_BL'   => $this->input->post('Masa_Kerja_BL', TRUE),
            'Nama_Instansi'   => $this->input->post('Nama_Instansi', TRUE),
            'TH_Lulus'   => $this->input->post('TH_Lulus', TRUE),			
            'Tingkat'   => $this->input->post('Tingkat', TRUE),
			'Jurusan'   => $this->input->post('Jurusan', TRUE),
            'No_Ijazah'   => $this->input->post('No_Ijazah', TRUE),
            'ID_Tipe_Guru'   => $this->input->post('ID_Tipe_Guru', TRUE),
            'ID_Rombel'   => $this->input->post('ID_Rombel', TRUE),
            'ID_Mapel'   => $this->input->post('ID_Mapel', TRUE),
            'Jumlah'   => $this->input->post('Jumlah', TRUE),
            'Tugas_Tambahan'   => $this->input->post('Tugas_Tambahan', TRUE),
            'Riwayat_Mutasi'   => $this->input->post('Riwayat_Mutasi', TRUE),
            'TMT_Tugas'   => $this->input->post('TMT_Tugas', TRUE),
            'Alamat_Rumah'   => $this->input->post('Alamat_Rumah', TRUE),
            'Ket_Guru'   => $this->input->post('Ket_Guru', TRUE),
            'No_HP'   => $this->input->post('No_HP', TRUE),
            'username'   => $this->input->post('username', TRUE),
            'password'   => md5($this->input->post('password', TRUE))     
			);
        $NIP   = $this->input->post('NIP');
        $this->db->where('NIP',$NIP);
        $this->db->update('tb_m_guru',$data);
    }
    
    function chekLogin($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',  md5($password));
        $user = $this->db->get('tb_m_guru')->row_array();
        return $user;
    }

}