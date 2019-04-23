<?php

Class Siswa extends CI_Controller {

    function __construct() {
        parent::__construct();
        //chekAksesModule();
        $this->load->library('ssp');
        $this->load->model('Model_siswa');

		$this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->database();
	    $this->load->helper(array('form','url'));
       
        $this->load->library('session');
      	
		
    }
	
function CheckNISN($NISN){
   if ($this->Model_siswa->check_nisn($NISN)!=true){
      return true;
   }else{
                    $this->session->set_flashdata('error','username atau password salah !!');
      $this->form_validation->set_message('NISN', 'NISN '. $NISN .' telah terdaftar');
      return true;     
   }
}

	
	// function data() {
	// 	// $table['join2'] = $this->Model_siswa->duatable(); 
	// 	$this->db->select('tb_m_siswa.NISN,tb_m_siswa.No_Induk,tb_m_siswa.Nama,tb_m_siswa.JK,tb_m_siswa.Ket,tb_m_rombel.Nama_Rombel,tb_m_siswa.ID_Kelas');
 //        $this->db->from('tb_m_siswa');
 //        $this->db->join('tb_m_rombel', 'tb_m_rombel.ID_Rombel=tb_m_siswa.ID_Rombel');
 //        $tabel=$this->db->get();

 //        // nama tabel
 //        // $table = array('tb_m_siswa');
	// 	// var_dump($config)/die;
	// 	// nama PK
 //        // $primaryKey = 'NISN';
 //        // list field
 //        $columns = array(
 //            array('db' => 'NISN', 'dt' => 'NISN'),
 //            array('db' => 'No_Induk', 'dt' => 'No_Induk'),            
 //            array('db' => 'Nama', 'dt' => 'Nama'),
 //            array('db' => 'JK', 'dt' => 'JK'),
 //            array('db' => 'Ket', 'dt' => 'Ket'),                        
 //            array('db' => 'ID_Rombel', 'dt' => 'ID_Rombel'),
 //            array('db' => 'ID_Kelas', 'dt' => 'ID_Kelas'),
 //            array(
 //                'db' => 'NISN',
 //                'dt' => 'aksi',
 //                'formatter' => function( $d) {
 //                    //return "<a href='edit.php?id=$d'>EDIT</a>";
 //                    return anchor('siswa/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
 //                        '.anchor('siswa/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
 //                }
 //            )
 //        );

 //        $sql_details = array(
 //            'user' => $this->db->username,
 //            'pass' => $this->db->password,
 //            'db' => $this->db->database,
 //            'host' => $this->db->hostname
 //        );

 //        echo json_encode(
 //                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
 //        );
 //    }
	// controller
	
	
	
	//controller
    function index() {

       $data['dataSiswa'] = $this->Model_siswa->dataTable();
       $this->template->load('template', 'siswa/list',$data);
	
    }

	function getRombel(){
        $ID_Rombel=$this->input->post('ID_Rombel');
        $data=$this->Model_siswa->getRombel($ID_Rombel);
        echo json_encode($data);
    }
	

public function printsiswa()
	{
        $data['dataSiswa'] = $this->Model_siswa->dataTable();
		$data['rombel1']= $this->Model_siswa->getNamaRombel();
		$output = $this->load->view('siswa/r_siswa',$data,true);
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
	
// function getSiswa($NISN,$ID_Rombel){
//         $sql = "SELECT A.NISN,A.No_Induk,A.Nama,A.JK,A.Ket,B.Nama_Rombel,A.ID_Kelas 
//         FROM tb_m_siswa A JOIN tb_m_rombel B ON A.ID_Rombel = B.ID_Rombel where a.NISN=$NISN AND a.ID_Rombel=$ID_Rombel";
//         $siswa = $this->db->query($sql);
//         if($siswa->num_rows()>0){
//             $row = $siswa->row_array();
//             return $row['Nama'];
//         }else{
//             return '-';
//         }
//     }



//     function add() {
//         $this->load->library('form_validation');
//         if (isset($_POST['submit'])) {
//         $this->form_validation->set_rules('NISN', 'NISN', 'callback_CheckNISN');
//         $this->form_validation->set_rules(
//         'NISN', 'NISN',
//         'required|is_unique[tb_m_siswa.NISN]',
//         array(
//                 'required'      => 'You have not provided %s.',
//                 'is_unique'     => 'This %s already exists.'
//         )

// );

//     $this->load->library('form_validation');

//     $NISN = $this->input->post('NISN');
//     $this->form_validation->set_rules('NISN', 'NISN', 'required|trim|xss_clean|valid_NISN|callback_check_duplicate_NISN[' . $NISN . ']');
//     $this->form_validation->set_message('check_duplicate_NISN', 'This email is already exist. Please write a new NISN.');

//     if ($this->form_validation->run() == FALSE) {
//         // validation failed then do that

//         $this->load->view('siswa/add');

//     } else {

//         $data['NISN'] = $NISN;
//         $insert = $this->Model_siswa->save($data);
//         // $insert = $this->Model_member->insert_data_to_db($data);

//         if ($insert) {
//             $success = "Wao ! You are successfully added to our community.";
//             $this->session->set_flashdata('message_success', $success);
//             $this->load->view('siswa/list');
//         } else {
//             $error = "Hey this email is already exists in our community.";
//             $this->session->set_flashdata('message_error', $error);
//             $this->load->view('siswa/add');
//         }
//     }
// }



    function add() {
        $this->load->library('form_validation');


        if (isset($_POST['submit'])) {
        $this->form_validation->set_rules('NISN', 'NISN', 'callback_CheckNISN');
//         $this->form_validation->set_rules(
//         'NISN', 'NISN',
//         'required|is_unique[tb_m_siswa.NISN]',
//         array(
//                 'required'      => 'You have not provided %s.',
//                 'is_unique'     => 'This %s already exists.'
//         )
// );

          $this->Model_siswa->save();

          redirect('siswa');
        } else {
            $this->template->load('template', 'siswa/add');
        }
    }

//  function check_duplicate_NISN($NISN) {

//     return $this->Model_siswa->checkDuplicateNISN($NISN);

// }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_siswa->update();
            $this->session->set_flashdata('success','Data siswa telah berhasil diubah.');
            redirect('siswa');
        }else{
            $NISN           = $this->uri->segment(3);
            $data['siswa'] = $this->db->get_where('tb_m_siswa',array('NISN'=>$NISN))->row_array();
            $this->template->load('template', 'siswa/edit',$data);
        }
    }
    
    function delete(){
        $NISN = $this->uri->segment(3);
        if(!empty($NISN)){
            // proses delete data
            $this->db->where('NISN',$NISN);
            $this->db->delete('tb_m_siswa');
        }
        redirect('siswa');
    }
    
    
    
    function siswa_aktif(){
        $this->template->load('template', 'siswa/siswa_aktif');
    }
    
    function load_data_siswa_by_rombel(){
        $ID_Rombel = $_GET['ID_Rombel'];
        
        echo "<table class='table table-bordered'>
            <tr><th width='90'>NISN</th><th>NAMA</th></tr>";
        $this->db->where('ID_Rombel',$ID_Rombel);
        $siswa = $this->db->get('tb_m_siswa');
        foreach ($siswa->result() as $row){
            echo "<tr><td>$row->NISN</td><td>$row->Nama</td></tr>";
        }
        echo"</table>";
    }
    
    function data_by_rombel_excel(){
        $this->load->library('CPHP_excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NISN');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'SISWA');
        
        $ID_Rombel = $_POST['ID_Rombel'];
        $this->db->where('ID_Rombel',$ID_Rombel);
        $siswa = $this->db->get('tb_m_siswa');
        $no=2;
        foreach ($siswa->result() as $row){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no, $row->NISN);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no, $row->Nama);
 
            $no++;
        }
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
        $objWriter->save("data-siswa.xlsx");
        $this->load->helper('download');
        force_download('data-siswa.xlsx', NULL);
    }

}