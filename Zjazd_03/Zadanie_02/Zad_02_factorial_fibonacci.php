<?php
// Definicja funkcji rekurencyjnej obliczającej silnię
function recursiveFactorial($n) {
    // Jeżeli n jest mniejsze lub równe 1, zwracamy 1
    // W przeciwnym razie, zwracamy n pomnożone przez wynik rekurencyjnego wywołania tej funkcji dla n-1
    return $n <= 1 ? 1 : $n * recursiveFactorial($n - 1);
}

// Definicja funkcji iteracyjnej obliczającej silnię
function iterativeFactorial($n) {
    $result = 1;
    // Mnożymy razem wszystkie liczby od 2 do n
    for ($i = 2; $i <= $n; $i++) {
        $result *= $i;
    }
    // Zwracamy wynik
    return $result;
}

// Definicja funkcji rekurencyjnej obliczającej ciąg Fibonacciego
function recursiveFibonacci($n) {
    // Jeżeli n jest mniejsze lub równe 1, zwracamy n
    // W przeciwnym razie, zwracamy sumę dwóch poprzednich wyrazów ciągu Fibonacciego
    if ($n <= 1) {
        return $n;
    } else {
        return (recursiveFibonacci($n - 1) + recursiveFibonacci($n - 2));
    }
}

// Definicja funkcji iteracyjnej obliczającej ciąg Fibonacciego
function iterativeFibonacci($n) {
    $a = 0;
    $b = 1;
    // Obliczamy kolejne wyrazy ciągu Fibonacciego
    for ($i = 0; $i < $n; $i++) {
        $temp = $a;
        $a = $b;
        $b = $temp + $b;
    }
    // Zwracamy n-ty wyraz ciągu Fibonacciego
    return $a;
}

// Wybieramy liczbę, dla której chcemy obliczyć silnię lub ciąg Fibonacciego
$number = 15;

// Mierzymy czas wykonania funkcji rekurencyjnej obliczającej silnię
$timeStart = microtime(true);
$resultRecursiveFactorial = recursiveFactorial($number);
$timeRecursiveFactorial = microtime(true) - $timeStart;

// Mierzymy czas wykonania funkcji iteracyjnej obliczającej silnię
$timeStart = microtime(true);
$resultIterativeFactorial = iterativeFactorial($number);
$timeIterativeFactorial = microtime(true) - $timeStart;

// Mierzymy czas wykonania funkcji rekurencyjnej obliczającej ciąg Fibonacciego
$timeStart = microtime(true);
$resultRecursiveFibonacci = recursiveFibonacci($number);
$timeRecursiveFibonacci = microtime(true) - $timeStart;

// Mierzymy czas wykonania funkcji iteracyjnej obliczającej ciąg Fibonacciego
$timeStart = microtime(true);
$resultIterativeFibonacci = iterativeFibonacci($number);
$timeIterativeFibonacci = microtime(true) - $timeStart;

// Wyświetlamy wyniki obliczeń i czasy wykonania
echo "Silnia rekurencyjna: $resultRecursiveFactorial<br>";
echo "Czas wykonania: $timeRecursiveFactorial sekund<br><br>";

echo "Silnia iteracyjna: $resultIterativeFactorial<br>";
echo "Czas wykonania: $timeIterativeFactorial sekund<br><br>";

echo "Fibonacci rekurencyjny: $resultRecursiveFibonacci<br>";
echo "Czas wykonania: $timeRecursiveFibonacci sekund<br><br>";

echo "Fibonacci iteracyjny: $resultIterativeFibonacci<br>";
echo "Czas wykonania: $timeIterativeFibonacci sekund<br><br>";

// Porównujemy czasy wykonania i wyświetlamy, która metoda była szybsza
$quickerMethodFactorial = $timeRecursiveFactorial < $timeIterativeFactorial ? 'rekurencyjna' : 'iteracyjna';
$timeDifferenceFactorial = abs($timeRecursiveFactorial - $timeIterativeFactorial);

$quickerMethodFibonacci = $timeRecursiveFibonacci < $timeIterativeFibonacci ? 'rekurencyjna' : 'iteracyjna';
$timeDifferenceFibonacci = abs($timeRecursiveFibonacci - $timeIterativeFibonacci);

echo "Funkcja obliczająca silnię metodą $quickerMethodFactorial była szybsza o $timeDifferenceFactorial sekund.<br>";
echo "Funkcja obliczająca ciąg Fibonacciego metodą $quickerMethodFibonacci była szybsza o $timeDifferenceFibonacci sekund.<br>";
?>