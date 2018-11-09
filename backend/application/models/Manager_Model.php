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
        return $this->add('category', $categoryName);
    }

    public function getCategories() {
        return $this->getAll('category');
    }

    public function updateCategory($category) {
        return $this->update('category', $category, 'id', $category['id']);
    }

    public function deleteCategory($categoryId) {
        $this->delete('category', array('id' => $categoryId));
    }

    public function addMenu($menu) {
        return $this->add('menu', $menu);
    }

    public function updateMenu($menu) {
        return $this->update('menu', $menu, "id", $menu['id']);
    }

    public function deleteMenu($menuId) {
        return $this->delete('menu', array('id' => $menuId));
    }

    private function add($table, $params) {
        return $this->db->insert($table, $params);
    }

    private function update($table, $params, $whereKey, $whereValue) {
        $this->db->where($whereKey, $whereValue);
        return $this->db->update($table, $params);
    }

    private function delete($table, $params) {
        return $this->db->delete($table, $params);
    }

    private function getAll($table) {
        return $this->db->get($table)->result_array();
    }
}