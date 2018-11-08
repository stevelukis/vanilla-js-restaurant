<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 2018-11-07
 * Time: 6:22 PM
 */

class Pelanggan_Database extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    public function registerUser($timestamp = '0', $tableNumber = 0) {
        $data = array(
            'id' => $timestamp,
            'table_number' => $tableNumber
        );

        return $this->db->insert('user', $data);
    }

}