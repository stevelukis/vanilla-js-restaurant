<?php

class Pelanggan_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }


    public function registerUser($timestamp = '0', $tableNumber = 0)
    {
        $data = array(
            'id' => $timestamp,
            'table_number' => $tableNumber
        );

        return $this->db->insert('user', $data);
    }

    public function getMenu()
    {
        $menu = $this->db->get('menu')->result_array();

        $tempCategories = $this->db->get('category')->result_array();
        $categories = [];

        foreach ($tempCategories as $category) {
            $categories[$category['id']] = $category['name'];
        }

        $result = [];

        foreach ($menu as $item) {
            $tempCategoryId = $item['category_id'];
            unset($item['category_id']);
            $item['category'] = $categories[$tempCategoryId];
            array_push($result, $item);
        }
        return $result;
    }

}