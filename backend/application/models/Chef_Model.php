<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 2018-11-09
 * Time: 9:44 PM
 */

class Chef_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getOrders()
    {
        $orders = $this->db->get_where('order', array('cooked_status' => 'not_yet'))->result_array();

        $result = [];

        foreach ($orders as $order) {
            $menu = $this->db->get_where('menu', array('id' => $order['menu_id']))->row_array();

            $order['menu_id'] = $menu['name'];
            $this->changeKey($order, "menu_id", "menu_name");

            unset($order['cooked_status']);

            array_push($result, $order);
        }

        return $result;
    }

    public function updateOrder($orderId, $inProgress = true)
    {
        $this->db->where('id', $orderId);

        $newStatus = $inProgress ? 2 : 3;

        return $this->db->update('order', array('cooked_status' => $newStatus));
    }

    private function changeKey($array, $oldKey, $newKey)
    {
        $array[$newKey] = $array[$oldKey];
        unset($array[$oldKey]);
    }

}