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

    public function add_category() {
        $params = $this->getPostedObject();
        $category = $params['category'];
        $success = $this->manager_model->addCategory($category);

        $this->loadStatusResult($success);
    }

    public function get_categories() {
        $result = $this->manager_model->getCategories();
        $this->loadResult($result);
    }

    public function delete_category() {
        $params = $this->getPostedObject();

        $categoryId = $params['id'];
        $success = $this->manager_model->deleteCategory($categoryId);
        $this->loadStatusResult($success);
    }

    public function update_category() {
        $params = $this->getPostedObject();
        $success = $this->manager_model->updateCategory($params);
        $this->loadStatusResult($success);
    }

    public function add_menu() {
        $params = $this->getPostedObject();
        $success = $this->manager_model->addMenu($params);
        $this->loadStatusResult($success);
    }

    public function delete_menu() {
        $params = $this->getPostedObject();

        $menuId = $params['id'];
        $success = $this->manager_model->deleteMenu($menuId);
        $this->loadStatusResult($success);
    }

    public function update_menu() {
        $params = $this->getPostedObject();
        $success = $this->manager_model->updateMenu($params);
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