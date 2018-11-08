<?php

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
    }

    public function test()
    {
        $data['result'] = "LALALA";
        $this->load->view('result.php', $data);
    }

    public function menu()
    {
        $data['result'] = json_encode($this->pelanggan_model->getMenu());
        $this->load->view('result.php', $data);
    }

    public function register() {
        $data = $this->getPostedObject();

        $timestamp = $data['timestamp'];
        $tableNumber = $data['table_number'];

        $this->pelanggan_model->registerUser($timestamp, $tableNumber);
    }

    private function getPostedObject()
    {
        return json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
    }

}