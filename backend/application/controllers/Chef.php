<?php

class Chef extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('chef_model');
    }

    public function get_orders()
    {
        $result = $this->chef_model->getOrders();
        $this->loadResult($result);
    }

    public function in_progress()
    {
        $this->updateOrder(true);
    }

    public function done()
    {
        $this->updateOrder(false);
    }

    private function updateOrder($in_progress = true)
    {
        $params = $this->getPostedObject();

        $orderId = $params['id'];

        $result = $this->chef_model->updateOrder($orderId, $in_progress);
        $this->loadStatusResult($result);
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

    private function loadStatusResult($success = true)
    {
        $result = array(
            "status" => ($success ? "success" : "fail")
        );
        $this->loadResult($result);
    }

}