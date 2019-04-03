<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->lang->load('jpcalendar', 'english');
        $this->load->view('welcome');
    }

    public function b_full_a1()
    {
        $c_type = trim($this->uri->segment(1));
        if ($c_type == "a-full") {
            $this->session->set_userdata('calendar_type', 'Ａ全・White');
            $this->session->set_userdata('calendar_price', 6800);
        } else {
            $this->session->set_userdata('calendar_type', 'B全・White');
            $this->session->set_userdata('calendar_price', 8980);
        }

        $directory = "./assets/images/thumbnail/*.{jpg,png,gif}";
        $images = glob($directory, GLOB_BRACE);
        $a_images = array();
        foreach($images as $image)
        {
            array_push($a_images, str_replace("./",base_url(),$image));
        }
        $data['images'] = $a_images;

        $this->lang->load('jpcalendar', 'english');
        $this->load->view('bFullA1', $data);
    }

    public function contact_info()
    {
        //$this->load->view('welcome');
        $this->lang->load('jpcalendar', 'english');
        $this->load->view('contact_info');
    }
}
