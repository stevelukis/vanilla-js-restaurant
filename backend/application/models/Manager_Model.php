<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 2018-11-09
 * Time: 12:14 PM
 */

class Manager_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function addCategory($categoryName) {
        return $this->db->insert('category', array('name' => $categoryName));
    }

    public function getCategories() {
        $result = $this->db->get('category')->result_array();
        return $result;
    }

    public function updateCategory($category) {
        $this->db->where('id', $category['id']);
        return $this->db->update('category', $category);
    }

    public function deleteCategory($categoryId) {
        return $this->db->delete('category', array('id' => $categoryId));
    }

}