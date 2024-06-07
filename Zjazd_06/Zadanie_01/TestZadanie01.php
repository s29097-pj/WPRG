<?php

// Dołączanie plików z definicjami klas
require_once 'NoweAuto.php';
require_once 'AutoZDodatkami.php';
require_once 'Ubezpieczenie.php';

// Tworzenie instancji klasy NoweAuto
$noweAuto = new NoweAuto("Model A", 10000, 4.5);

// Wyświetlanie informacji o nowym aucie
echo "Informacje o nowym aucie:<br>" . $noweAuto . "<br><br>";

// Wyświetlanie ceny nowego auta w PLN
echo "Cena nowego auta w PLN:<br>" . $noweAuto->AutoCenaPLN() . "<br><br>";

// Tworzenie instancji klasy AutoZDodatkami
$autoZDodatkami = new AutoZDodatkami("Model B", 10000, 4.5, 500, 300, 200);

// Wyświetlanie ceny dodatków w Euro
echo "Cena dodatków w Euro:<br>";
foreach ($autoZDodatkami->CenaDodatkowEuro() as $dodatek => $cena) {
    echo $dodatek . ": " . $cena . "<br>";
}

// Wyświetlanie sumy cen dodatków w Euro
echo "Suma cen dodatków w Euro: " . $autoZDodatkami->SumaCenEuro() . "<br><br>";

// Wyświetlanie ceny dodatków w PLN
echo "Cena dodatków w PLN:<br>";
foreach ($autoZDodatkami->CenaDodatkowPLN() as $dodatek => $cena) {
    echo $dodatek . ": " . $cena . "<br>";
}

// Wyświetlanie sumy cen dodatków w PLN
echo "Suma cen dodatków w PLN: " . $autoZDodatkami->SumaCenPLN() . "<br><br>";

// Wyświetlanie ceny auta z dodatkami w PLN
echo "Cena auta z dodatkami w PLN:<br>" . $autoZDodatkami->AutoCenaPLN() . "<br><br>";

// Wyświetlanie ceny auta z dodatkami w Euro
echo "Cena auta z dodatkami w Euro:<br>" . $autoZDodatkami->AutoCenaEuro() . "<br><br>";

// Tworzenie instancji klasy Ubezpieczenie
$ubezpieczenie = new Ubezpieczenie("Model C", 10000, 4.5, 500, 300, 200, 0.1, 2);

// Wyświetlanie szczegółowych informacji na temat składników ubezpieczenia
echo "Procentowa wartość ubezpieczenia: " . $ubezpieczenie->procentUbezpieczenia . "<br>";
echo "Liczba lat: " . $ubezpieczenie->liczbaLat . "<br>";
echo "Wartość ubezpieczenia w Euro: " . $ubezpieczenie->AutoCenaEuro() . "<br>";
echo "Wartość ubezpieczenia w PLN: " . $ubezpieczenie->AutoCenaPLN() . "<br>";

?>