<?php

Class Guru extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_guru');
    }

 public function export_excel(){
           // $data = array( 'title' => 'Data Guru');
           //      $data['guru1'] = $this->Model_guru->dataTable();
 
           // $this->load->view('guru/vw_export_excel',$data);

    $this->load->library('CPHP_excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'DATA PNS/CPNS PENDIDIK SD NEGERI');
        $objPHPExcel->getActiveSheet()->setCellValue('A2', 'DI LINGKUNGAN SUDIN PENDIDIKAN WILAYAH II KOTA ADMINISTRASI JAKARTA UTARA');
        $objPHPExcel->getActiveSheet()->setCellValue('A3', 'Unit Kerja :');
        $objPHPExcel->getActiveSheet()->setCellValue('C3', 'SDN SUKAPURA 01 PAGI');

        $objPHPExcel->getActiveSheet()->setCellValue('A5', 'NIP');
        $objPHPExcel->getActiveSheet()->setCellValue('B5', 'Nama Guru');
        $objPHPExcel->getActiveSheet()->setCellValue('C5', 'NRK');
        $objPHPExcel->getActiveSheet()->setCellValue('D5', 'NUPTK');
        $objPHPExcel->getActiveSheet()->setCellValue('E5', 'LAHIR');
        $objPHPExcel->getActiveSheet()->setCellValue('E6', 'Tempat Lahir');
        $objPHPExcel->getActiveSheet()->setCellValue('F6', 'Tanggal Lahir');
        $objPHPExcel->getActiveSheet()->setCellValue('G5', 'PANGKAT');
        $objPHPExcel->getActiveSheet()->setCellValue('G6', 'Pangkat');
        $objPHPExcel->getActiveSheet()->setCellValue('H6', 'Golongan');
        $objPHPExcel->getActiveSheet()->setCellValue('I6', 'TMT');
        $objPHPExcel->getActiveSheet()->setCellValue('J5', 'STATUS KEPEGAWAIAN');
        $objPHPExcel->getActiveSheet()->setCellValue('J6', 'Status');
        $objPHPExcel->getActiveSheet()->setCellValue('K6', 'TMT');
        $objPHPExcel->getActiveSheet()->setCellValue('L5', 'Masa Kerja');
        $objPHPExcel->getActiveSheet()->setCellValue('L6', 'TH');
        $objPHPExcel->getActiveSheet()->setCellValue('M6', 'BL');
        $objPHPExcel->getActiveSheet()->setCellValue('N5', 'PENDIDIKAN TERAKHIR');
        $objPHPExcel->getActiveSheet()->setCellValue('N6', 'Nama Instansi');
        $objPHPExcel->getActiveSheet()->setCellValue('O6', 'Tahun Lulus');
        $objPHPExcel->getActiveSheet()->setCellValue('P6', 'Tingkat');
        $objPHPExcel->getActiveSheet()->setCellValue('Q6', 'Jurusan');
        $objPHPExcel->getActiveSheet()->setCellValue('R5', 'No. Ijazah');
        $objPHPExcel->getActiveSheet()->setCellValue('S5', 'Tipe Guru');
        $objPHPExcel->getActiveSheet()->setCellValue('S6', 'Guru Kelas');
        $objPHPExcel->getActiveSheet()->setCellValue('T6', 'Guru Mapel');
        $objPHPExcel->getActiveSheet()->setCellValue('U6', 'Jumlah');
        $objPHPExcel->getActiveSheet()->setCellValue('V5', 'Tugas Tambahan');
        $objPHPExcel->getActiveSheet()->setCellValue('W5', 'Riwayat Mutasi');
        $objPHPExcel->getActiveSheet()->setCellValue('X5', 'TMT Tugas di Sekolah Ini');
        $objPHPExcel->getActiveSheet()->setCellValue('Y5', 'Alamat Rumah');
        $objPHPExcel->getActiveSheet()->setCellValue('Z5', 'Ket Guru');
        $objPHPExcel->getActiveSheet()->setCellValue('AA5', 'No HP');

        $objPHPExcel->getActiveSheet()->getStyle("A1:AA2")->getFont()->setBold( true );        
        $objPHPExcel->getActiveSheet()->getStyle("A5:AA6")->getFont()->setBold( true );

       

$objPHPExcel->getActiveSheet()
    ->getStyle('A5:AA6')
    ->applyFromArray(
        array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'FFA07A')
            )
        )
    );

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(20);

        $objPHPExcel->getActiveSheet()->mergeCells('S5:U5');

        $objPHPExcel->getActiveSheet()->mergeCells('A1:AA1');
        $objPHPExcel->getActiveSheet()->mergeCells('A2:AA2');

        $objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
        $objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
        $objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
        $objPHPExcel->getActiveSheet()->mergeCells('D5:D6');
        $objPHPExcel->getActiveSheet()->mergeCells('E5:F5');

        $objPHPExcel->getActiveSheet()->mergeCells('G5:I5');

        $objPHPExcel->getActiveSheet()->mergeCells('J5:K5');

        $objPHPExcel->getActiveSheet()->mergeCells('L5:M5');

        $objPHPExcel->getActiveSheet()->mergeCells('N5:Q5');

        $objPHPExcel->getActiveSheet()->mergeCells('R5:R6');

        $objPHPExcel->getActiveSheet()->mergeCells('V5:V6');
        $objPHPExcel->getActiveSheet()->mergeCells('W5:W6');
        $objPHPExcel->getActiveSheet()->mergeCells('X5:X6');
        $objPHPExcel->getActiveSheet()->mergeCells('Y5:Y6');
        $objPHPExcel->getActiveSheet()->mergeCells('Z5:Z6');
        $objPHPExcel->getActiveSheet()->mergeCells('AA5:AA6');

        $guru = $this->db->get('tb_m_guru');
        $no=7;

        foreach ($guru->result() as $row){

            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no, $row->NIP);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no, $row->Nama_Guru);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$no, $row->NRK);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$no, $row->NUPTK);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$no, $row->Tempat_Lahir);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$no, $row->Tanggal_Lahir);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$no, $row->Pangkat);
            $objPHPExcel->getActiveSheet()->setCellValue('H'.$no, $row->Golongan);
            $objPHPExcel->getActiveSheet()->setCellValue('I'.$no, $row->TMT);
            $objPHPExcel->getActiveSheet()->setCellValue('J'.$no, $row->Status);
            $objPHPExcel->getActiveSheet()->setCellValue('K'.$no, $row->TMT_Status);
            $objPHPExcel->getActiveSheet()->setCellValue('L'.$no, $row->Masa_Kerja_TH);
            $objPHPExcel->getActiveSheet()->setCellValue('M'.$no, $row->Masa_Kerja_BL);
            $objPHPExcel->getActiveSheet()->setCellValue('N'.$no, $row->Nama_Instansi);
            $objPHPExcel->getActiveSheet()->setCellValue('O'.$no, $row->TH_Lulus);
            $objPHPExcel->getActiveSheet()->setCellValue('P'.$no, $row->Tingkat);
            $objPHPExcel->getActiveSheet()->setCellValue('Q'.$no, $row->Jurusan);
            $objPHPExcel->getActiveSheet()->setCellValue('R'.$no, $row->No_Ijazah);
            $objPHPExcel->getActiveSheet()->setCellValue('S'.$no, $row->ID_Tipe_Guru);
            $objPHPExcel->getActiveSheet()->setCellValue('U'.$no, $row->Jumlah);
            $objPHPExcel->getActiveSheet()->setCellValue('V'.$no, $row->Tugas_Tambahan);
            $objPHPExcel->getActiveSheet()->setCellValue('W'.$no, $row->Riwayat_Mutasi);
            $objPHPExcel->getActiveSheet()->setCellValue('X'.$no, $row->TMT_Tugas);
            $objPHPExcel->getActiveSheet()->setCellValue('Y'.$no, $row->Alamat_Rumah);
            $objPHPExcel->getActiveSheet()->setCellValue('Z'.$no, $row->Ket_Guru);
            $objPHPExcel->getActiveSheet()->setCellValue('AA'.$no, $row->No_HP);
            
            $no++;
        }
        
  $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        )
    );
    $objPHPExcel->getActiveSheet()->getStyle("A7:AA7")->applyFromArray($style);

    $objPHPExcel->getActiveSheet()->getStyle("A1:AA1")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("A2:AA2")->applyFromArray($style);

    $objPHPExcel->getActiveSheet()->getStyle("A5:A6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("B5:B6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("C5:C6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("D5:D6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("E5:E6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("F5:F6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("G5:G6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("H5:H6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("I5:I6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("J5:J6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("K5:K6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("L5:L6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("M5:M6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("N5:N6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("O5:O6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("P5:P6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("Q5:Q6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("R5:R6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("S5:U5")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("S6:T6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("U5:U6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("V5:V6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("W5:W6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("X5:X6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("Y5:Y6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("Z5:Z6")->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle("AA5:AA6")->applyFromArray($style);

    
    

        $styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('A5:AA6')->applyFromArray($styleArray);
// $objPHPExcel->getActiveSheet()->getStyle('A7:AA7')->applyFromArray($styleArray);
unset($styleArray);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
        $objWriter->save("data-guru.xlsx");
        $this->load->helper('download');
        force_download('data-guru.xlsx', NULL);
    }
      

    function data() {
        // nama tabel
        $table = 'tb_m_guru';
        // nama PK
        $primaryKey = 'NIP';
        // list field
        $columns = array(
            array('db' => 'NIP', 'dt' => 'NIP'),
            array('db' => 'Nama_Guru', 'dt' => 'Nama_Guru'),
            array('db' => 'NRK', 'dt' => 'NRK'),
            array('db' => 'NUPTK', 'dt' => 'NUPTK'),			
            array('db' => 'Tempat_Lahir', 'dt' => 'Tempat_Lahir'),
            array('db' => 'Tanggal_Lahir', 'dt' => 'Tanggal_Lahir'),
            array('db' => 'Pangkat', 'dt' => 'Pangkat'),
            array('db' => 'Golongan', 'dt' => 'Golongan'),
            array('db' => 'TMT', 'dt' => 'TMT'),
            array('db' => 'Status', 'dt' => 'Status'),
		
	
            array(
                'db' => 'NIP',
                'dt' => 'aksi',
                'formatter' => function( $d)
                 {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('guru/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('guru/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $data['dataGuru'] = $this->Model_guru->dataTable();

        $this->template->load('template', 'guru/list',$data);
    }

    public function printguru()
    {
        $data['dataGuru'] = $this->Model_guru->dataTable();
        // $data['rombel1']= $this->Model_siswa->getNamaRombel();
        $output = $this->load->view('guru/r_guru',$data,true);
        return $this->gen_pdf($output);
    }

    public function gen_pdf($html){
        ob_start();
         $this->load->library('MPDF56/mpdf');
         $mpdf=new mPDF('utf-8', $paper = 'A4-L');
         ob_clean();
         $mpdf->WriteHTML($html);
         $mpdf->Output();
    }


    function data_by_guru_excel(){
        $this->load->library('CPHP_excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setCellValue('A1', ['NIP']);
        $objPHPExcel->getActiveSheet()->setCellValue('B1', ['Nama_Guru']);
        
        $NIP = $_POST['NIP'];
        $this->db->where('NIP',$NIP);
        $guru = $this->db->get('tb_m_guru');
        $no=2;
        foreach ($guru->result() as $row){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no, $row['NIP']);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no, $row->Nama_Guru);
            $no++;
        }
    }



    function add() {

        //         $data=array(
        //     'dataCombo'=>$this->Model_guru->getCombo1(),
        //     'tipe_selected' => '',
        //     // 'siswa_selected' => '',
            
        // );
       
        $data['dataCombo'] = $this->Model_guru->getCombo1();
        $data['dataCombo1'] = $this->Model_guru->getCombo2();
        $data['dataCombo2'] = $this->Model_guru->getCombo3();
        if (isset($_POST['submit'])) {
            $this->Model_guru->save();
            redirect('guru');
        } else {
            $this->template->load('template', 'guru/add',$data);
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_guru->update();
            $this->session->set_flashdata('success','Data Guru telah berhasil diubah.');
            redirect('guru');
        }else{
            $NIP      = $this->uri->segment(3);
            $data['guru'] = $this->db->get_where('tb_m_guru',array('NIP'=>$NIP))->row_array();
            $this->template->load('template', 'guru/edit',$data);
        }
    }
    
public function editguru($id) 
    {
        //         $data['dataCombo'] = $this->Model_guru->getCombo1();
        // $data['dataCombo1'] = $this->Model_guru->getCombo2();
        // $data['dataCombo2'] = $this->Model_guru->getCombo3();
        $data=array(
            "getrow"=>$this->db->where('NIP',$id)->get('tb_m_guru')->row_array(),
            "id"=>$id,
            "dataCombo" => $this->Model_guru->getCombo1(),
            "dataCombo1" => $this->Model_guru->getCombo2(),
            "dataCombo2" => $this->Model_guru->getCombo3()

        );
        if(isset($_POST['submit'])){
            $this->Model_guru->update();
            redirect('guru');
        }else{
        $NIP      = $this->uri->segment(3);
            $data['guru'] = $this->db->get_where('tb_m_guru',array('NIP'=>$NIP))->row_array();
            $this->template->load('template', 'guru/edit',$data);
        }
        
    }

    function delete(){
        $NIP = $this->uri->segment(3);
        if(!empty($NIP)){
            // proses delete data
            $this->db->where('NIP',$NIP);
            $this->db->delete('tb_m_guru');
        }
        redirect('guru');
    }

}