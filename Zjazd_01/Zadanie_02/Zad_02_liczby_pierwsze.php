<?php

// Zakres liczb, dla którego chcemy znaleźć liczby pierwsze
$poczatek = 1;
$koniec = 100;

// Wypisanie komunikatu informującego o zakresie
echo "Liczby pierwsze od $poczatek do $koniec: <br>";

// Iteracja przez liczby w zadanym zakresie
for ($i = $poczatek; $i <= $koniec; $i++) {
    // Sprawdzenie, czy aktualna liczba jest liczbą pierwszą
    $czy_pierwsza = true;
    if ($i <= 1) {
        $czy_pierwsza = false;
    } else {
        for ($j = 2; $j <= sqrt($i); $j++) {
            if ($i % $j == 0) {
                $czy_pierwsza = false;
                break;
            }
        }
    }

    // Jeśli liczba jest pierwsza, wypisanie jej na ekranie
    if ($czy_pierwsza) {
        echo $i . " ";
    }
}

?>
