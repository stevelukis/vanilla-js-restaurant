<?php

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
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

    public function order_status() {
        $params = $this->getPostedObject();
        $userId = $params['user_id'];

        $result = $this->customer_model->getOrderStatus($userId);
        $data['result'] = json_encode($result);
        $this->load->view('result.php', $data);
    }

    public function register() {
        $params = $this->getPostedObject();

        $timestamp = $params['timestamp'];
        $tableNumber = $params['table_number'];

        $this->pelanggan_model->registerUser($timestamp, $tableNumber);
    }

    private function getPostedObject()
    {
        return json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
    }

}