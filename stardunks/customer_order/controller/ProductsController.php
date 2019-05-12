<?php
require_once 'model/ProductsLogic.php';
require_once 'utilities/utilitieshtml.php';

class ProductsController
{
    public function __construct()
    {
        $this->ProductsLogic = new ProductsLogic();
        $this->htmlElements = new htmlElements();
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function handleRequest()
    {
        try {
            $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
            switch ($op) {
                case 'create':
                    if ($_POST['name'] == null) {
                        include 'view/create.php';
                    } else {
                        $this->collectCreateContact($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['address']);
                    }
                    break;
                case 'reads':
                    $this->collectReadContacts();
                    break;
                case 'read':
                    $this->collectReadContact($_REQUEST['id']);
                    break;
                case 'update':
                    if ($_POST['name'] == null) {
                        include 'view/update.php';
                    } else {
                        $this->collectUpdateContact($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['address']);
                    }
                    break;
                case 'searchBar':
                    $this->collectSearchProducts($_REQUEST['input']);
                    break;
                case 'delete':
                    $this->collectDeleteContact($_REQUEST['id']);
                    break;
                default:
                    $this->collectReadProducts();
                    break;
            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }

    }

    public function collectCreateContact($name, $phone, $email, $address)
    {
        $products = $this->ProductsLogic->createContact($name, $phone, $email, $address);
        include 'view/create.php';
    }

    public function collectUpdateContact()
    {
        include 'view/update.php';
    }

    public function collectSearchProducts($input)
    {   
        $searchOutput = "";
        $searchOutput = $this->ProductsLogic->searchBar($input);    
        $result = $this->htmlElements->createTable($searchOutput);  
        include 'view/ViewProducts.php';
    }
    public function collectReadContact($id)
    {

        $products = $this->ProductsLogic->readContact($id);
        include 'view/ViewProducts.php';


    }

    public function collectReadProducts()
    {
        $products = $this->ProductsLogic->readProducts();
        $result = $this->htmlElements->createTable($products);
        include 'view/ViewProducts.php';
    }

    public function collectDeleteContact($id)
    {
        //echo "Gebruiker is verwijderd";
        $products = $this->ProductsLogic->deleteContact($id);
        include 'view/delete.php';

    }
}
