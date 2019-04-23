<?php

Class Kurikulum extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_kurikulum');
    }

      function add() {
        if (isset($_POST['submit'])) {
            $uploadLampiran = $this->uploadFile();
            $this->Model_kurikulum->save($uploadLampiran);
            redirect('kurikulum');
        } else {
            $this->template->load('template', 'kurikulum/add');
        }
    }

    function data() {
        // nama tabel
        $table = 'tb_m_kurikulum';
        // nama PK
        $primaryKey = 'ID_Kurikulum';
        // list field
        $columns = array(
            array('db' => 'ID_Kurikulum', 'dt' => 'ID_Kurikulum'),
            array('db' => 'Nama_Kurikulum', 'dt' => 'Nama_Kurikulum'),
            array('db' => 'Status',
                'dt' => 'Status',
                'formatter' => function( $d) {
                    return $d=='Y'?'Aktif':'Tidak Aktif';
                }),
			array('db' => 'Lampiran', 'dt' => 'Lampiran'),
			
            array(
                'db' => 'ID_Kurikulum',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('kurikulum/edit/' . $d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"') . ' 
                        '. anchor('kurikulum/delete/' . $d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"').'
                        '. anchor('kurikulum/detail/' . $d, '<i class="fa fa-eye"></i>', 'class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"');
                }
            )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }

    function index() {
        $data['dataKurikulum'] = $this->Model_kurikulum->dataTable();
        $this->template->load('template', 'kurikulum/list',$data);
        // $data['rows']    =   $this->Model_kurikulum->getDown();

    }

// function download()
//         {
//      $this->Model_kurikulum->getDown();}
//     function add() {
//         if (isset($_POST['submit'])) {
// 			$uploadLampiran = $this->uploadFile();
//             $this->Model_kurikulum->save($uploadLampiran);
//             redirect('kurikulum');
//         } else {
//             $this->template->load('template', 'kurikulum/add');
//         }
//     }
	
    // public function download($ID_Kurikulum){
    //     if(!empty($ID_Kurikulum)){
    //         //load download helper
    //         $this->load->helper('download');
            
    //         //get file info from databaseid
    //         $fileInfo = $this->file->getRows(array('ID_Kurikulum' => $ID_Kurikulum));
            
    //         //file path
    //         $file = 'uploads/'.$fileInfo['file_name'];
            
    //         //download file from directory
    //         force_download($file, NULL);
    //     }}
	
	 
	 function uploadFile(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|doc';
        $config['max_size']             = 20000; // imb
        
        $this->load->library('upload', $config);
            // proses upload
        $this->upload->do_upload('Lampiran');
		
        $upload = $this->upload->data();

		return $upload['file_name'];
    }
	

	

    function edit() {
$data['dataKurikulum'] = $this->Model_kurikulum->dataTable();
        if (isset($_POST['submit'])) {
            
            $this->Model_kurikulum->update();
            $this->session->set_flashdata('success','Data kurikulum telah berhasil diubah.');
            redirect('kurikulum');
        } else {
            $ID_Kurikulum      = $this->uri->segment(3);
            $data['kurikulum'] = $this->db->get_where('tb_m_kurikulum', array('ID_Kurikulum' => $ID_Kurikulum))->row_array();
            
            $this->template->load('template', 'kurikulum/edit', $data);

        }
    }

    function delete() {
        $ID_Kurikulum = $this->uri->segment(3);
        if (!empty($ID_Kurikulum)) {
            // proses delete data
            $this->db->where('ID_Kurikulum', $ID_Kurikulum);
            $this->db->delete('tb_m_kurikulum');
        }
        redirect('kurikulum');
    }
    
    function detail(){
        $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah";
        $data['info']= $this->db->query($infoSekolah)->row_array();
        $this->template->load('template', 'kurikulum/detail',$data);
    }
    
    function dataKurikulumDetail(){
        
        $kd_jurusan     = $_GET['jurusan'];
        $kelas          = $_GET['kelas'];
        $id_kurikulum   = $_GET['id_kurikulum'];
        if($kelas=='semua_kelas'){
            $selected_kelas = '';
        }else{
            $selected_kelas="and kd.kelas='$kelas'";
        }
        echo "<table class='table table-striped table-bordered table-hover table-full-width dataTable'>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE MAPEL</th>
                        <th>NAMA MATA PELAJARAN</th>
                        <th>KELAS</th>
                        <th></th>
                    </tr>
                </thead>";
        
        $sql = "SELECT tj.nama_jurusan,tm.kd_mapel,tm.nama_mapel,kd.kelas,kd.id_kurikulum_detail,kd.id_kurikulum
                FROM tbl_kurikulum_detail as kd, tbl_kurikulum as tk,tbl_mapel as tm,tbl_jurusan as tj
                WHERE kd.id_kurikulum=tk.id_kurikulum and kd.kd_mapel=tm.kd_mapel and kd.kd_jurusan=tj.kd_jurusan 
                $selected_kelas and kd.id_kurikulum='$id_kurikulum' and kd.kd_jurusan='$kd_jurusan'";
        $kurikulum = $this->db->query($sql)->result();
        $no=1;
        foreach ($kurikulum as $row){
            echo"<tr><td>$no</td><td>$row->kd_mapel</td><td>$row->nama_mapel</td><td>$row->kelas</td><td>".anchor('kurikulum/deletedetail/'.$row->id_kurikulum_detail.'/'.$row->id_kurikulum,'<i class="fa fa-trash"></i>')."</td></tr>";
            $no++;
        }
        
        echo"    </table>";
    }
    
    function adddetail(){
        if(isset($_POST['submit'])){
            $this->Model_kurikulum->addKurikulumDetail();
            redirect('kurikulum/detail/'.$this->input->post('id_kurikulum'));
        }else{
            $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah";
            $data['info']= $this->db->query($infoSekolah)->row_array();
            $this->template->load('template', 'kurikulum/addDetail',$data);
        }
    }
    
    function deletedetail() {
        $id_kurikulum_detail = $this->uri->segment(3);
        $id_kurikulum        = $this->uri->segment(4);
        if (!empty($id_kurikulum_detail)) {
            // proses delete data
            $this->db->where('id_kurikulum_detail', $id_kurikulum_detail);
            $this->db->delete('tbl_kurikulum_detail');
        }
        redirect('kurikulum/detail/'.$id_kurikulum);
    }

}