<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LocationController extends SEI_Controller
{
    protected $baseUrl = "http://192.168.1.123:8080";

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['RestClient' => 'rc']);
        $this->load->helper('form');
    }

    public function index()
    {
        $response = $this->rc->get($this->baseUrl . "/lokasi");
        $locations = $response->data;

        return $this->render('location/index', compact('locations'));
    }

    public function create()
    {
        $payload = [
            'nama_lokasi' => $this->input->post('nama_lokasi'),
            'kota' => $this->input->post('kota'),
            'provinsi' => $this->input->post('provinsi'),
            'negara' => $this->input->post('negara'),
        ];

        $this->rc->post($this->baseUrl . '/lokasi', $payload);

        redirect(base_url('/lokasi'));
    }

    public function edit($id)
    {
        $payload = [
            'nama_lokasi' => $this->input->post('nama_lokasi'),
            'kota' => $this->input->post('kota'),
            'provinsi' => $this->input->post('provinsi'),
            'negara' => $this->input->post('negara'),
        ];

        $this->rc->put($this->baseUrl . '/lokasi/' . $id, $payload);

        redirect(base_url('/lokasi'));
    }

    public function delete($id)
    {
        $this->rc->delete($this->baseUrl . '/lokasi/' . $id);

        redirect(base_url('/lokasi'));
    }
}
