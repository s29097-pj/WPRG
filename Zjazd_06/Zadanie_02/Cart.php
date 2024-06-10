<?php

class Cart {
    // Prywatna właściwość przechowująca produkty w koszyku
    private $products;

    // Konstruktor inicjalizujący pustą tablicę produktów
    public function __construct() {
        $this->products = array();
    }

    // Metoda dodająca produkt do koszyka
    public function addProduct(Product $product) {
        array_push($this->products, $product);
    }

    // Metoda usuwająca produkt z koszyka
    public function removeProduct(Product $product) {
        $index = array_search($product, $this->products);
        if($index !== FALSE){
            unset($this->products[$index]);
        }
    }

    // Metoda obliczająca całkowitą cenę produktów w koszyku
    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice() * $product->getQuantity();
        }
        return $total;
    }

    // Metoda zwracająca listę wszystkich produktów w koszyku wraz z całkowitą ceną
    public function __toString() {
        $output = "<br><u>Products in cart:</u><br>";
        foreach ($this->products as $product) {
            $output .= $product . "<br>";
        }
        $output .= "Total price: " . $this->getTotal() . "<br>";
        return $output;
    }
}
?>