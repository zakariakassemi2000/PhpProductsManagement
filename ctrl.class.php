<?php
require 'model.class.php';

class Ctrl
{
    private $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function productForm()
    {
        include 'view.html';
    }

    public function allProductsAction()
    {
        $products = $this->model->allProducts();
		include 'allProductsView.php';

    }

    public function addProduct()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $date = $_POST['date'];
        $price = $_POST['price'];
        
        $this->model->addProduct([null, $name, $description, $date, $price, $type]);
        header('Location: ctrl.class.php?action=allProducts');
        exit;
    }

    public function action()
    {
        $action = "productForm";
        if (isset($_GET['action'])) $action = $_GET['action'];
        if (isset($_POST['action'])) $action = $_POST['action'];

        switch ($action) {
            case 'allProducts':
                $this->allProductsAction();
                break;
            case 'productForm':
                $this->productForm();
                break;
            case 'addProd':
                $this->addProduct();
                break;
            default:
                $this->productForm();
        }
    }
}

$ctrl = new Ctrl();
$ctrl->action();
