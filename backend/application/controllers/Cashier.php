<?php

class Cashier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("cashier_model");
    }

    public function get_orders()
    {
        $params = $this->getPostedObject();

        $id = $params['table_number'];

        $result = $this->cashier_model->getOrders($id);
        $this->loadResult($result);
    }

    private function getPostedObject()
    {
        return json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
    }

    private function loadResult($result)
    {
        $data['result'] = json_encode($result);
        $this->load->view('result.php', $data);
    }

}