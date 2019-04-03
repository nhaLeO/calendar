<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

        public function view($page = 'home')
        {
            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
                    // Whoops, we don't have a page for that!
                    show_404();
            }

            $this->load->view('pages/'.$page);
        }

        public function index()
        {
                $now = new DateTime();

                $data_calendar = $this->input->post('data');

                $filename = "template_" . $now->format('YmdHis');
                
                $tpl_a = fopen(APPPATH."views/pages/template_a.php", "r") or die("Unable to open file!");
                $data_a = fread($tpl_a,filesize(APPPATH."views/pages/template_a.php"));

                fclose($tpl_a);

                $tpl_b = fopen(APPPATH."views/pages/template_b.php", "r") or die("Unable to open file!");
                $data_b = fread($tpl_b,filesize(APPPATH."views/pages/template_b.php"));

                fclose($tpl_b);


                $tpl = fopen(APPPATH."views/pages/" . $filename . ".php", "w") or die("Unable to open file!");
                fwrite($tpl, $data_a);
                fwrite($tpl, $data_calendar);
                fwrite($tpl, $data_b);
                
                fclose($tpl);

                //filename
                $this->session->set_userdata('filename', $filename);
        }
}
