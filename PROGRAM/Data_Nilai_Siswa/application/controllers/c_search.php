 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
  class C_search extends CI_Controller {
 
       function __construct()
       {
            parent::__construct();
            $this->load->helper(array('html','url','form'));
            $this->load->library('pagination');
            $this->load->model('Model_siswa');
       }
 
       public function index()
       {
            $dari      = $this->uri->segment('3');
            $sampai = 5;
            $like      = '';
             
            //hitung jumlah row
            $jumlah= $this->Model_siswa->jumlah();
 
            //inisialisasi array
            $config = array();
 
            //set base_url untuk setiap link page
            $config['base_url'] = base_url().'index.php/C_search/index/';
 
            //hitung jumlah row
           $config['total_rows'] = $jumlah;
 
           //mengatur total data yang tampil per page
           $config['per_page'] = $sampai;
 
           //mengatur jumlah nomor page yang tampil
           $config['num_links'] = $jumlah;
 
           //mengatur tag
           $config['num_tag_open'] = '<li>';
           $config['num_tag_close'] = '</li>';
           $config['next_tag_open'] = "<li>";
           $config['next_tagl_close'] = "</li>";
           $config['prev_tag_open'] = "<li>";
           $config['prev_tagl_close'] = "</li>";
           $config['first_tag_open'] = "<li>";
           $config['first_tagl_close'] = "</li>";
           $config['last_tag_open'] = "<li>";
           $config['last_tagl_close'] = "</li>";
           $config['cur_tag_open'] = '&nbsp;<a class="current">';
           $config['cur_tag_close'] = '</a>';
           $config['next_link'] = 'Next';
           $config['prev_link'] = 'Previous';
 
           //inisialisasi array 'config' dan set ke pagination library
           $this->pagination->initialize($config);
           
           
 
           //inisialisasi array
            $data = array();
 
            //ambil data buku dari database
           $data['data_buku'] = $this->Model_siswa->lihat($sampai, $dari, $like);
 
           //Membuat link
           $str_links = $this->pagination->create_links();
           $data["links"] = explode('&nbsp;',$str_links );
           $data['title'] = 'Tutorial Pagination CodeIgniter | https://recodeku.blogspot.com';
 
           $this->load->view('siswa/list',$data);
      }
 
       public function cari()
       {
 
            //mengambil nilai keyword dari form pencarian
     $search = (trim($this->input->post('key',true)))? trim($this->input->post('key',true)) : '';
 
     //jika uri segmen 3 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 3
     $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;
 
     //mengambil nilari segmen 4 sebagai offset
            $dari      = $this->uri->segment('4');
 
            //limit data yang ditampilkan
            $sampai = 5;
 
            //inisialisasi variabel $like
            $like      = '';
 
            //mengisi nilai variabel $like dengan variabel $search, digunakan sebagai kondisi untuk menampilkan data
            if($search) $like = "(judul LIKE '%$search%')";
             
            //hitung jumlah row
            $jumlah= $this->m_searching->jumlah($like);
 
            //inisialisasi array
            $config = array();
 
            //set base_url untuk setiap link page
            $config['base_url'] = base_url().'index.php/C_search/cari/'.$search;
 
            //hitung jumlah row
           $config['total_rows'] = $jumlah;
 
           //mengatur total data yang tampil per page
           $config['per_page'] = $sampai;
 
           //mengatur jumlah nomor page yang tampil
           $config['num_links'] = $jumlah;
 
           //mengatur tag
           $config['num_tag_open'] = '<li>';
           $config['num_tag_close'] = '</li>';
           $config['next_tag_open'] = "<li>";
           $config['next_tagl_close'] = "</li>";
           $config['prev_tag_open'] = "<li>";
           $config['prev_tagl_close'] = "</li>";
           $config['first_tag_open'] = "<li>";
           $config['first_tagl_close'] = "</li>";
           $config['last_tag_open'] = "<li>";
           $config['last_tagl_close'] = "</li>";
           $config['cur_tag_open'] = '&nbsp;<a class="current">';
           $config['cur_tag_close'] = '</a>';
           $config['next_link'] = 'Next';
           $config['prev_link'] = 'Previous';
 
           //inisialisasi array 'config' dan set ke pagination library
           $this->pagination->initialize($config);
           
           
 
           //inisialisasi array
            $data = array();
 
            //ambil data buku dari database
           $data['data_buku'] = $this->m_searching->lihat($sampai, $dari, $like);
 
           //Membuat link
           $str_links = $this->pagination->create_links();
           $data["links"] = explode('&nbsp;',$str_links );
           $data['title'] = 'Tutorial Searching with Pagination CodeIgniter | https://recodeku.blogspot.com';
 
           $this->load->view('siswa/list',$data);
      }  
 }