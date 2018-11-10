<?php

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
    }

    public function menu()
    {
        $result = $this->customer_model->getMenu();
        $this->loadResult($result);
    }

    public function order_status() {
        $params = $this->getPostedObject();
        $userId = $params['user_id'];

        $result = $this->customer_model->getOrderStatus($userId);
        $this->loadResult($result);
    }

    public function register() {
        $params = $this->getPostedObject();

        $timestamp = $params['timestamp'];
        $tableNumber = $params['table_number'];

        $this->customer_model->registerUser($timestamp, $tableNumber);

        $this->loadStatusResult();
    }

    public function order()
    {
        $params = $this->getPostedObject();

        $result = $this->customer_model->addOrder($params);
        $this->loadStatusResult($result);
    }

    private function loadStatusResult($success = true) {
        $result = array(
            "status" => ($success ? "success" : "fail")
        );
        $this->loadResult($result);
    }

    private function loadResult($result) {
        $data['result'] = json_encode($result);
        $this->load->view('result.php', $data);
    }

    private function getPostedObject()
    {
        return json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
    }

}