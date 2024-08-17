<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectController extends SEI_Controller
{
    protected $baseUrl = "http://192.168.1.123:8080";

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['RestClient' => 'rc']);
    }

    public function index()
    {
        $projects = $this->rc->get($this->baseUrl . "/proyek")->data;
        $locations = $this->rc->get($this->baseUrl . "/lokasi")->data;

        return $this->render('project/index', compact('projects', 'locations'));
    }

    public function create()
    {
        $payload = [
            'nama_proyek' => $this->input->post('nama_proyek'),
            'client' => $this->input->post('client'),
            'pimpinan_proyek' => $this->input->post('pimpinan'),
            'lokasi' => $this->input->post('lokasi'),
            'tgl_mulai' => date('Y-m-d H:i:s', strtotime($this->input->post('tgl_mulai'))),
            'tgl_selesai' => date('Y-m-d H:i:s', strtotime($this->input->post('tgl_selesai'))),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $this->rc->post($this->baseUrl . '/proyek', $payload);

        redirect(base_url('/proyek'));
    }

    public function edit($id)
    {
        $payload = [
            'nama_proyek' => $this->input->post('nama_proyek'),
            'client' => $this->input->post('client'),
            'pimpinan_proyek' => $this->input->post('pimpinan'),
            'lokasi' => $this->input->post('lokasi'),
            'tgl_mulai' => date('Y-m-d H:i:s', strtotime($this->input->post('tgl_mulai'))),
            'tgl_selesai' => date('Y-m-d H:i:s', strtotime($this->input->post('tgl_selesai'))),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $this->rc->put($this->baseUrl . '/proyek/' . $id, $payload);

        redirect(base_url('/proyek'));
    }

    public function delete($id)
    {
        $this->rc->delete($this->baseUrl . '/proyek/' . $id);

        redirect(base_url('/proyek'));
    }
}
