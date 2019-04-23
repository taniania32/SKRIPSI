<?php

Class n_absen extends CI_Controller {

    function __construct() {
        parent::__construct();
        //chekAksesModule();
        $this->load->library('ssp');
        $this->load->model('Model_n_absen');
        $this->load->model('Model_Nilai_Tugas');

		$this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->database();
	    $this->load->helper(array('form','url'));
       
        $this->load->library('session');
      	
		
    }
	
function CheckNISN($NISN){
   if ($this->Model_n_absen->check_nisn($NISN)!=true){
      return true;
   }else{
                    $this->session->set_flashdata('error','username atau password salah !!');
      $this->form_validation->set_message('NISN', 'NISN '. $NISN .' telah terdaftar');
      return true;     
   }
}

	
	//controller
    function index() {

       $data['dataR'] = $this->Model_n_absen->dataTable();
       $this->template->load('template', 'n_absen/list',$data);
	
    }

	function getRombel(){
        $ID_Rombel=$this->input->post('ID_Rombel');
        $data=$this->Model_n_absen->getRombel($ID_Rombel);
        echo json_encode($data);
    }
	

public function printn_absen()
	{
        $data['dataR'] = $this->Model_n_absen->dataTable();
		$output = $this->load->view('n_absen/print',$data,true);
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
        $this->load->library('form_validation');
        
        // $data['data'] = $this->Model_Nilai_Tugas->getCmbRmbl(); 

        if (isset($_POST['submit'])) {

          $this->Model_n_absen->save();

          redirect('n_absen');
        } else {
            $data=array(
            'ID_Desk'=>$this->Model_n_absen->getID(),
            'data' => $this->Model_Nilai_Tugas->get_rmbl(),
            'siswa' => $this->Model_Nilai_Tugas->get_sw(),
            'rombel_selected' => '',
            'siswa_selected' => '',
            'dataCmbMapel' => $this->Model_Nilai_Tugas->getMapel(),    
        );
        // $data['dataCmbMapel'] = $this->Model_Nilai_Tugas->getMapel();
        $data['dataCmbThn'] = $this->Model_Nilai_Tugas->getCmbThn();
            $this->template->load('template', 'n_absen/add',$data);
        }
    }

//  function check_duplicate_NISN($NISN) {

//     return $this->Model_n_absen->checkDuplicateNISN($NISN);

// }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_n_absen->update();
            $this->session->set_flashdata('success','Data Absen telah berhasil diubah.');
            redirect('n_absen');
        }else{

            $data=array(
            'ID_Desk'=>$this->Model_n_absen->getID(),
            'data' => $this->Model_Nilai_Tugas->get_rmbl(),
            'siswa' => $this->Model_Nilai_Tugas->get_sw(),
            'rombel_selected' => '',
            'siswa_selected' => '',
            'dataCmbMapel' => $this->Model_Nilai_Tugas->getMapel(), 
                    "dataCmbSis" => $this->Model_Nilai_Tugas->getSw1(),
        "dataCmbMapel" => $this->Model_Nilai_Tugas->getCmbMapel(),
        "dataCmbThn" => $this->Model_Nilai_Tugas->getCmbThn(),
        "dataCmbRmbl" => $this->Model_Nilai_Tugas->getRmbl1(),   
        );
        // $data['dataCmbMapel'] = $this->Model_Nilai_Tugas->getMapel();
        $data['dataCmbThn'] = $this->Model_Nilai_Tugas->getCmbThn();
            $ID_Absen           = $this->uri->segment(3);
            $data['n_absen'] = $this->db->get_where('tb_r_absen',array('ID_Absen'=>$ID_Absen))->row_array();
            $this->template->load('template', 'n_absen/edit',$data);
        }
    }
    
    function delete(){
        $ID_Absen = $this->uri->segment(3);
        if(!empty($ID_Absen)){
            // proses delete data
            $this->db->where('ID_Absen',$ID_Absen);
            $this->db->delete('tb_r_absen');
        }
        redirect('n_absen');
    }
    
    
    
    function n_absen_aktif(){
        $this->template->load('template', 'n_absen/n_absen_aktif');
    }
    
    function load_data_n_absen_by_rombel(){
        $ID_Rombel = $_GET['ID_Rombel'];
        
        echo "<table class='table table-bordered'>
            <tr><th width='90'>NISN</th><th>NAMA</th></tr>";
        $this->db->where('ID_Rombel',$ID_Rombel);
        $n_absen = $this->db->get('tb_m_n_absen');
        foreach ($n_absen->result() as $row){
            echo "<tr><td>$row->NISN</td><td>$row->Nama</td></tr>";
        }
        echo"</table>";
    }
    
    function data_by_rombel_excel(){
        $this->load->library('CPHP_excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NISN');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'n_absen');
        
        $ID_Rombel = $_POST['ID_Rombel'];
        $this->db->where('ID_Rombel',$ID_Rombel);
        $n_absen = $this->db->get('tb_m_n_absen');
        $no=2;
        foreach ($n_absen->result() as $row){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no, $row->NISN);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no, $row->Nama);
 
            $no++;
        }
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
        $objWriter->save("data-n_absen.xlsx");
        $this->load->helper('download');
        force_download('data-n_absen.xlsx', NULL);
    }

}