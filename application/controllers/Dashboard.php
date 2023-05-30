<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Dashboard';

        $this->load->model('extensions_m');
        $this->load->library('pagination');
        $this->load->library('encryption');
    }

    public function check_if_is_logged_in()
    {
        if(empty($_SESSION['logged_in']) || !isset($_SESSION['logged_in']))
        {
            redirect('auth/login','refresh');
        }
    }

    public function dash()
    {
        $this->check_if_is_logged_in();
        $config['base_url'] = base_url() . 'dashboard/dash';
        $config['total_rows'] = $this->extensions_m->get_count();
        $config['per_page'] = 20;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['title'] = "manage extensions";

        $data['extensions'] = $this->extensions_m->get_extensions($config['per_page'], $page, null);

        $data['campuses'] = $this->extensions_m->get_campuses();

        // echo "<pre>";
        // print_r($data);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_menu', $data);
        $this->load->view('templates/side_menubar', $data);
        $this->load->view('templates/manage_extensions', $data);
        $this->load->view('templates/footer', $data);
    }


   
    public function search_extensions()
    {
       // $config['base_url'] = base_url() . 'dashboard/search_extensions';

        // $config['per_page'] = 20;
        //$config["uri_segment"] = 3;

     //   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['title'] = "search extensions";

        $data['search'] =  $_POST['search'];
        // $data['search'] =  'Main';

        //$data['extensions'] = $this->extensions_m->get_extensions_by_search($config['per_page'], $page, $data['search']);

        $data['extensions'] = $this->extensions_m->get_extensions_by_search($data['search']);

        // $config['per_page'] = count($data['extensions']);
        // $config['total_rows'] = count($data['extensions']);

        // $this->pagination->initialize($config);
        // echo "<pre>";
        // print_r($data['extensions']);

        header('Content-Type: application/json');
        //  echo "<pre>";
        echo json_encode($data);


    }

    public function manage_admins()
    {
        $data['title'] = "Manage admins";
        $data['admins'] = $this->extensions_m->get_admins();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_menu', $data);
        $this->load->view('templates/side_menubar', $data);
        $this->load->view('manage_admins', $data);
        $this->load->view('templates/footer', $data);
    }
    public function manage_departments()
    {
        $data['title'] = "Manage Departments";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_menu', $data);
        $this->load->view('templates/side_menubar', $data);
        $this->load->view('manage_departments', $data);
        $this->load->view('templates/footer', $data);
    }
    public function create_new_admin()
    {
        $data['title'] = "Create New Admin";

        $this->form_validation->set_rules('fname', 'first name', 'required');
        $this->form_validation->set_rules('sname', 'surname', 'required');
        //  $this->form_validation->set_rules('oname', 'oname', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|is_unique[adminregistration.email]');
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[telephoneadmin.username]');
        $this->form_validation->set_rules('pass', 'pass', 'required');
        $this->form_validation->set_rules('conpass', 'conpass', 'required|matches[pass]');
        $this->form_validation->set_rules('admintype', 'Admin Type', 'required');
        $this->form_validation->set_rules('secret', 'Secret Word', 'required');

        if ($this->form_validation->run() === TRUE) {
            $data['post_1'] =
                [
                    'fname' => $this->input->post('fname'),
                    'surname' => $this->input->post('sname'),
                    'othernames' => $this->input->post('oname'),
                    'email' => $this->input->post('email'),
                    'adminType' => $this->input->post('admintype'),
                ];
            $data['post_2'] =
                [
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => password_hash($this->input->post('conpass'), PASSWORD_DEFAULT),
                    'secretWord' => $this->encryption->encrypt($this->input->post('secret')),
                ];

            if ($this->extensions_m->add_admin($data['post_1'], $data['post_2'])) {
                redirect('dashboard/manage_admins', 'refresh');
            } else {
                echo 'failed';
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/header_menu', $data);
            $this->load->view('templates/side_menubar', $data);
            $this->load->view('create_new_admin', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    public function dash_lim()
    {
        $config['base_url'] = base_url() . 'dashboard/dash';
        $config['total_rows'] = $this->extensions_m->get_count();
        $config['per_page'] = 20;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['title'] = "manage extensions";

        $data['extensions'] = $this->extensions_m->get_extensions('trialexcel', $config['per_page'], $page);

        $data['campuses'] = $this->extensions_m->get_campuses();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_menu', $data);
        $this->load->view('templates/side_menubar_lim', $data);
        $this->load->view('templates/manage_extensions', $data);
        $this->load->view('templates/footer', $data);
    }
    public function create_departments()
    {
        $data['title'] = "create new department";
        $data['campuses'] = $this->extensions_m->get_campuses();

        $this->form_validation->set_rules('department', 'department', 'required');
        $this->form_validation->set_rules('campus', 'campus', 'required');

        if ($this->form_validation->run() ===  TRUE) {
            $data = [
                'deptname' => $this->input->post('department'),
                'campus' => $this->input->post('campus'),
            ];

            if ($this->extensions_m->update_departments($data)) {
                redirect('dashboard/dash', 'refresh');
            }

        }
        else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/header_menu', $data);
            $this->load->view('templates/side_menubar', $data);
            $this->load->view('create_departments', $data);
            $this->load->view('templates/footer', $data);
        }

    }
    public function create_extension()
    {
        $data['title'] = "create new extensions";

        $data['departments'] = $this->extensions_m->get_departments();
        $data['campuses'] = $this->extensions_m->get_campuses();

        $this->form_validation->set_rules('department', 'department', 'required');
        $this->form_validation->set_rules('campus', 'campus', 'required');
        $this->form_validation->set_rules('code', 'code', 'required|is_unique[trialexcel.extnumber]');
        $this->form_validation->set_rules('assigned', 'assigned', 'required');


        if ($this->form_validation->run() ===  TRUE) {
            if ($this->input->post()) {
                $data = [
                    'deptname' => $this->input->post('department'),
                    'ccode' => $this->input->post('campus'),
                    'extnumber' => $this->input->post('code'),
                    'owerassigned' => $this->input->post('assigned'),
                ];

                if ($this->extensions_m->update_telephony($data)) {
                    redirect('dashboard/dash', 'refresh');
                }
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/header_menu', $data);
            $this->load->view('templates/side_menubar', $data);
            $this->load->view('create_extension', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    public function edit_extension($id)
    {
        $data['title'] = "Edit Extension";

        $data['campuses'] = $this->extensions_m->get_campuses();
        $data['depts'] = $this->extensions_m->get_departments();

        $data['user'] = $this->extensions_m->get_ext($id, 'trialexcel');

        // $this->form_validation->set_rules('department', 'department', 'required');
        // $this->form_validation->set_rules('campus', 'campus', 'required');
        $this->form_validation->set_rules('code', 'code', 'required');
        $this->form_validation->set_rules('assigned', 'assigned', 'required');

        //assigned
        if ($this->form_validation->run() === TRUE) {
            $data = [

                'deptname' => $this->input->post('department'),
                'ccode' => $this->input->post('campus'),
                'extnumber' => $this->input->post('code'),
                'owerassigned' => $this->input->post('assigned')
            ];
            if ($this->extensions_m->update_extension($data, $id)) {
                redirect('dashboard/dash', 'refresh');
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/header_menu', $data);
            $this->load->view('templates/side_menubar', $data);
            $this->load->view('edit_extension', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function edit_admin($id=5)
    {
        $data['title'] = "edit admin";
        $data['post_1'] = $this->extensions_m->get_edit_admins($id);

        
        $data['post_2'] = $this->extensions_m->get_admins_sens($data['post_1']['email']);

       
        //  echo "<pre>";
        // print_r($data['post_2']);
        // die;

        $this->form_validation->set_rules('fname', 'first name', 'required');
        $this->form_validation->set_rules('sname', 'surname', 'required');
        //  $this->form_validation->set_rules('oname', 'oname', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|is_unique[adminregistration.email]');
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[telephoneadmin.username]');
        $this->form_validation->set_rules('pass', 'pass', 'required');
        $this->form_validation->set_rules('conpass', 'conpass', 'required|matches[pass]');
        $this->form_validation->set_rules('admintype', 'Admin Type', 'required');
        $this->form_validation->set_rules('secret', 'Secret Word', 'required');

        if ($this->form_validation->run() === TRUE) {
            $data['info1'] =
                [
                    'fname' => $this->input->post('fname'),
                    'surname' => $this->input->post('sname'),
                    'othernames' => $this->input->post('oname'),
                    'email' => $this->input->post('email'),
                    'adminType' => $this->input->post('admintype'),
                ];
            $data['info2'] =
                [
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => password_hash($this->input->post('conpass'), PASSWORD_DEFAULT),
                    'secretWord' => $this->encryption->encrypt($this->input->post('secret')),
                ];

            if ($this->extensions_m->update_admin($data['post_1'], $data['post_2'])) {
                redirect('dashboard/manage_admins', 'refresh');
            } else {
                echo 'failed';
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/header_menu', $data);
            $this->load->view('templates/side_menubar', $data);
            $this->load->view('edit_admin', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    public function delete_extension($id)
    {
        if ($this->extensions_m->delete($id)) {
            redirect('dashboard/dash', 'refresh');
        }
    }

  
}
