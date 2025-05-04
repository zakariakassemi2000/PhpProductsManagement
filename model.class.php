<?php
define("USER", 'root');
define("PASS", '');

class Model
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=mit4', USER, PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function addProduct($product)
    {
        $query = $this->db->prepare('INSERT INTO products (num, name, description, date, price, type) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute($product);
    }

    public function allProducts()
    {
        $query = $this->db->prepare('SELECT * FROM products');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
