<?php
class Login extends CI_Controller
{
    function index()
    {
        if ($this->session->userdata('masuk') == TRUE) {
            $url = base_url('admin/dashboard');
            redirect($url);
        };
        $this->load->view('admin/v_login');
    }
}
