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
        $this->load->model('Manager_Model');
    }

    public function add_category() {
        $params = $this->getPostedObject();
        $category = $params['category'];
        $success = $this->Manager_Model->addCategory($category);

        $this->loadStatusResult($success);
    }

    public function get_categories() {
        $result = $this->Manager_Model->getCategories();
        $this->loadResult($result);
    }

    public function delete_category() {
        $params = $this->getPostedObject();

        $categoryId = $params['id'];
        $success = $this->Manager_Model->deleteCategory($categoryId);
        $this->loadStatusResult($success);
    }

    public function update_category() {
        $params = $this->getPostedObject();
        $success = $this->Manager_Model->updateCategory($params);
        $this->loadStatusResult($success);
    }

    public function add_menu() {
        $params = $this->getPostedObject();
        $success = $this->Manager_Model->addMenu($params);
        $this->loadStatusResult($success);
    }

    public function delete_menu() {
        $params = $this->getPostedObject();

        $menuId = $params['id'];
        $success = $this->Manager_Model->deleteMenu($menuId);
        $this->loadStatusResult($success);
    }

    public function update_menu() {
        $params = $this->getPostedObject();
        $success = $this->Manager_Model->updateMenu($params);
        $this->loadStatusResult($success);
    }

    private function loadStatusResult($success = true) {
        $result = array(
            "status" => ($success ? "success" : "fail")
        );
        $this->loadResult($result);
    }

    private function loadResult($result) {
        $data['result'] = json_encode($result);
        $this->load->view('result.php', $data);
    }

    private function getPostedObject()
    {
        return json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
    }

}