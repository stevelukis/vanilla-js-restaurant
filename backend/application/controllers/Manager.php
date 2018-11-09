<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 2018-11-09
 * Time: 12:14 PM
 */

class Manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('manager_model');
    }



}