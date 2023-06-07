<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('auth_m');
        $this->load->model('extensions_m');
        $this->load->library('form_validation');
        $this->load->library('encryption');
    }
    public function login()
    {
        $this->logged_in();
        // $this->load->view('welcome_message');
        $this->form_validation->set_rules('username', 'username', 'required');

        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === TRUE) {
            //check if user is registered
            if ($this->auth_m->email_exists($this->input->post('username'))) {
                $login = $this->auth_m->login($this->input->post('username'), $this->input->post('password'));
                if ($login)
                //    echo "correct";         
                {
                    $logged_in_sess = [
                        'admin_type' => $login['adminType'],
                        'logged_in' => TRUE,


                    ];
                    $this->session->set_userdata($logged_in_sess); // sets the session of the logged in user
                    if ($_SESSION['admin_type'] == 'Superadmin') {
                        $this->session->set_flashdata('theme', "admin");
                        redirect('dashboard/dash', 'load');
                    } else {
                        redirect('dashboard/dash_lim', 'load');
                    }
                } else

                    echo "incorrect";
            }
        } else {
            // echo base_url();
            //       die;
            $this->load->view('login', $data = null);
        }
    }


    public function hash_admin_pass()
    {
        // echo $username;
        // echo "sasa";
        //$this->extensions_m->hash_admin_pass();
    }

    public function logged_in()
    {
        if (isset($_SESSION['logged_in'])) {
            if ($_SESSION['logged_in'] == TRUE) {
                redirect('dashboard/dash', 'refresh');
            }
        }
    }
    public function logout()
    {
        //$this->session->sess_destroy();
        session_destroy();
        redirect('auth/login', 'refresh');
    }
    public function key()
    {
        $key = bin2hex($this->encryption->create_key(16));
        echo ($key);
        //print_r($key);
    }
}
