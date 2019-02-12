<?php
if (!defined('BASEPATH')) 
    exit('No direct script access');

class Register extends CI_controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Occupations_model');
        $this->load->library('form_validation');        
    }

    function index()
    {
        $data = array(
            'title' => set_value('Login'),
            'action' => site_url('register/register_user'),
            'success' => '',
            'failed' => '',
            'organisations' => $this->Occupations_model->all_organizations(),
            'occupations' => $this->Occupations_model->all_occupations()
        );
        //$this->load->view('templates/header', $data);
        $this->load->view('login/register', $data);    
        //$this->load->view('templates/footer', $data);    
    }

    function register_user()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[3]|max_length[24]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[2]|max_length[24]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[6]|max_length[50]|valid_email|is_unique[users.usrEmail]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|matches[confirmpassword]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|min_length[6]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $result = $this->User_model->insert_user();

            if ($result) {
                $data = array (
                    'title' => set_value('Login'),
                    'action' => site_url('register'),
                    'success' => 'Registration succesful',
                );
                $this->load->view('login/login', $data);
            } else {
                $data = array (
                    'title' => set_value('Login'),
                    'failed' => 'Registration failed, please try again.',
                );
                $this->load->view('login/login', $data);
            }
        }
    }
}