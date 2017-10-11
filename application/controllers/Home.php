<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('site/Site_model');
    }

    public function index()
    {
        $data['validation']= '';
        if (isset($_SESSION['alert']))
        {
            $data['validation'] = $this->session->flashdata('alert');
        }

        $data['session'] = $this->session->userdata('logged_in');
        $this->twig->display('site/home',$data);
    }
}