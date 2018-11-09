<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 2018-11-09
 * Time: 9:47 PM
 */

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