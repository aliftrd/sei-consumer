<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SEI_Controller extends CI_Controller
{
    protected function render($view, $params = [])
    {
        $this->load->view('template/header', $params);
        $this->load->view($view, $params);
        $this->load->view('template/footer', $params);
    }
}
