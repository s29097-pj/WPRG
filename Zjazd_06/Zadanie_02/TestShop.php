<?php

require_once 'Product.php';
require_once 'Cart.php';

// Tworzenie produktów
$product1 = new Product("Laptop", 1500, 1);
$product2 = new Product("Telefon", 500, 2);

// Wyświetlanie informacji o produktach
echo $product1 . "<br>";
echo $product2 . "<br>";

// Tworzenie koszyka
$cart = new Cart();

// Dodawanie produktów do koszyka
$cart->addProduct($product1);
$cart->addProduct($product2);

// Wyświetlanie zawartości koszyka
echo $cart;

// Usuwanie produktu z koszyka
$cart->removeProduct($product1);

// Wyświetlanie zawartości koszyka po usunięciu produktu
echo $cart;

?>
