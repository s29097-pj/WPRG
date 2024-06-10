<?php

class Product {
    // Prywatne właściwości przechowujące nazwę, cenę i ilość produktu
    private $name;
    private $price;
    private $quantity;

    // Konstruktor inicjalizujący wszystkie właściwości produktu
    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    // Metody get i set dla nazwy produktu
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    // Metody get i set dla ceny produktu
    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    // Metody get i set dla ilości produktu
    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    // Metoda zwracająca szczegóły produktu jako ciąg znaków
    public function __toString() {
        return "Product: " . $this->name . ", Price: " . $this->price . ", Quantity: " . $this->quantity;
    }
}
?>