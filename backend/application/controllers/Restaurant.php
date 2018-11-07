<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 2018-11-07
 * Time: 4:53 PM
 */

class Restaurant extends CI_Controller
{

    public function test()
    {
        $data['result'] = "LALALA";
        $this->load->view('result.php', $data);
    }

    private function getPostedObject()
    {
        return json_decode($this->security->xss_clean($this->input->raw_input_stream));
    }

}