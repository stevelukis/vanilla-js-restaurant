<?php

class Cashier_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getOrders($tableNumber)
    {
        $userId = $this->db->get('user', array(
            'table_number' => $tableNumber,
            'paid' => 'no'
        ))->row_array()['id'];
        $orders = $this->db->get_where('order', array('user_id' => $userId))->result_array();

        $result = [];

        foreach ($orders as $order) {
            $menu = $this->db->get_where('menu', array('id' => $order['menu_id']))->row_array();

            $order['menu_id'] = $menu['name'];
            $this->changeKey($order, "menu_id", "menu_name");

            $order['price'] = $menu['price'];

            array_push($result, $order);
        }

        return $result;
    }

    private function changeKey($array, $oldKey, $newKey)
    {
        $array[$newKey] = $array[$oldKey];
        unset($array[$oldKey]);
    }

}