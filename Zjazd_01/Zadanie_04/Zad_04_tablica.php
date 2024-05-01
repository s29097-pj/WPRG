<?php

// Tekst do przekształcenia na tablicę
$tekst = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

// Użycie funkcji explode() do podziału tekstu na tablicę, używając spacji jako separatora
$tablica_slow = explode(" ", $tekst);

// Licznik elementów tablicy
$licznik = count($tablica_slow);

// Usuwanie znaków interpunkcyjnych
for ($i = $licznik - 1; $i >= 0; $i--) {
    // Sprawdzenie, czy aktualny element jest znakiem interpunkcyjnym
    if (strpos(",.!?;:", $tablica_slow[$i]) !== false) {
        // Usunięcie znaku poprzez przesunięcie każdego następnego elementu o jeden do tyłu
        for ($j = $i; $j < $licznik - 1; $j++) {
            $tablica_slow[$j] = $tablica_slow[$j + 1];
        }
        // Zmniejszenie licznika, aby uwzględnić usunięcie elementu
        $licznik--;
    }
}

// Skrócenie tablicy do właściwej długości po usunięciu elementów
$tablica_slow = array_slice($tablica_slow, 0, $licznik);

// Tablica asocjacyjna
$tablica_asocjacyjna = array();

// Tworzenie tablicy asocjacyjnej
foreach ($tablica_slow as $klucz => $wartosc) {
    // Sprawdzenie, czy klucz jest liczbą parzystą
    if ($klucz % 2 == 0) {
        // Ustawienie elementów parzystych jako klucze, a elementów po nich jako wartości
        $tablica_asocjacyjna[$wartosc] = isset($tablica_slow[$klucz + 1]) ? $tablica_slow[$klucz + 1] : null;
    }
}

// Wypisanie tablicy asocjacyjnej
foreach ($tablica_asocjacyjna as $klucz => $wartosc) {
    echo $klucz . " => " . $wartosc . "<br>";
}

?>
