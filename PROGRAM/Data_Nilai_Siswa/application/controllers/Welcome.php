<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->output->delete_cache();
        //$this->load->view('template');
        $this->template->load('template', 'table-example');
    }

    function guzzle() {
        //step1
        $cSession = curl_init();
//step2
        curl_setopt($cSession, CURLOPT_URL, "https://reguler.zenziva.net/apps/smsapi.php?userkey=wq8ed6&passkey=testing&nohp=089699935552&pesan=asasasasasasasasasas");
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
//step3
        $result = curl_exec($cSession);
//step4
        curl_close($cSession);
//step5
        echo $result;
    }


   

}
