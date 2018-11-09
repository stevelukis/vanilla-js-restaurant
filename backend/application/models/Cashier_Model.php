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

    public function updateUser($userId)
    {
        return $this->update('user', array('paid' => 2), 'id', $userId);
    }

    private function update($table, $params, $whereKey, $whereValue)
    {
        $this->db->where($whereKey, $whereValue);
        return $this->db->update($table, $params);
    }

    private function changeKey($array, $oldKey, $newKey)
    {
        $array[$newKey] = $array[$oldKey];
        unset($array[$oldKey]);
    }

}