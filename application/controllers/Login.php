<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
    }

    function index() 
    {
        $data = array(
            'title' => set_value('title'),
            'action' => site_url('login/login_user')
        );
        $this->load->view('templates/header', $data);
        $this->load->view('login/login', $data);
        //$this->load->view('templates/footer', $data);
    }

    function login_user()
    {
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[6]|max_length[50]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $result = $this->Login_model->login_user();

            switch($result) {
                case 'logged_in':
                    $data['info'] = 'logged in';
                    $this->load->view('login/test', $data);
                    break;
                case 'incorrect_password':
                    $data['info'] = 'incorrectpass';
                    $this->load->view('login/test', $data);
                    break;
                case 'not_activated':
                    $data['info'] = 'not activated';
                    $this->load->view('login/test', $data);
                    break;
                case 'email_not_found':
                    $data['info'] = 'email not found';
                    $this->load->view('login/test', $data);
                    break;
            }
        }
        
    }
}