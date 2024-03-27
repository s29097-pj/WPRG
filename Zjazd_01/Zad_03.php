<?php

// Funkcja do obliczania N-tej liczby Fibonacciego i wypisywania nieparzystych elementów tablicy
function fibonacciegoNieparzyste($n) {
    // Utworzenie tablicy na ciąg Fibonacciego
    $fib = array();

    // Obliczenie ciągu Fibonacciego i zapisanie go do tablicy
    $fib[0] = 0;
    $fib[1] = 1;
    for ($i = 2; $i < $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }

    // Wypisanie nieparzystych elementów tablicy wraz z numerami linii
    echo "Nieparzyste elementy N-tej liczby Fibonacciego:<br>";
    foreach ($fib as $key => $value) {
        if ($value % 2 != 0) {
            echo ($key + 1) . ": " . $value . "<br>";
        }
    }
}

// Określenie N-tej liczby Fibonacciego, którą chcemy wygenerować
$n = 10; // Przykładowa wartość

// Wywołanie funkcji i wyliczenie N-tej liczby Fibonacciego oraz wypisanie nieparzystych elementów tablicy
fibonacciegoNieparzyste($n);

?>

