<?php

require_once "DataHandler.php";

class ProductsLogic
{
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "stardunks", "root", "");
    }

    public function __destruct()
    {
    }

    public function createContact($name, $phone, $email, $address)
    {
        try {
            $sql = "INSERT INTO contacts(`name`,`phone`,`email`,`location`)VALUES('$name', '$phone', '$email', '$address');";
            echo "test1";
            $result = $this->DataHandler->createData($sql);
            echo "test2";
            return $result;
        }catch (Exception $e){
            throw $e;
        }
    }

    public function readProducts(){
        try {
            $sql = "SELECT * FROM products;";
            $result = $this->DataHandler->readsData($sql);
            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }

    public function searchBar($input){
        try {
            $sql = "SELECT * FROM products WHERE product_name LIKE '%". $input ."%'";
            $result = $this->DataHandler->searchBar($sql);
            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }

    public function readContact($id)
    {
        try {

            $sql = "SELECT * FROM contacts WHERE id =" . $id;

            $result = $this->DataHandler->readsData($sql);

            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }

    public function updateContact($name, $phone, $email, $address)
    {
    }

    public function deleteContact($id)
    {
        try {
            $sql = "DELETE FROM contacts WHERE id =" . $id ;
            $result = $this->DataHandler->deleteData($sql);
            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }
    
}