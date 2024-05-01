<?php
// Sprawdź czy liczba została przesłana z formularza
if(isset($_POST['number'])) {
    // Pobierz liczbę z formularza
    $number = intval($_POST['number']);

    // Sprawdź czy liczba jest dodatnia i całkowita
    if($number > 1 && $number == $_POST['number']) {
        // Sprawdź czy liczba jest liczbą pierwszą
        $is_prime = is_prime($number);

        if($is_prime) {
            echo "$number jest liczbą pierwszą.";
        } else {
            echo "$number nie jest liczbą pierwszą.";
        }
    } else {
        echo "Proszę wprowadzić dodatnią liczbę całkowitą większą od 1.";
    }
} else {
    echo "Proszę wprowadzić liczbę.";
}

// Funkcja sprawdzająca czy liczba jest liczbą pierwszą
function is_prime($number) {
    // Jeśli liczba jest mniejsza lub równa 1, nie jest to liczba pierwsza
    if($number <= 1) {
        return false;
    }

    // Sprawdzaj tylko do pierwiastka kwadratowego z liczby,
    // ponieważ żadna liczba pierwsza większa od 2 nie będzie miała dzielnika większego niż jej pierwiastek kwadratowy
    $sqrt = sqrt($number);
    for($i = 2; $i <= $sqrt; $i++) {
        // Jeśli liczba jest podzielna przez jakąś inną liczbę, to nie jest liczbą pierwszą
        if($number % $i == 0) {
            return false;
        }
    }
    return true;
}
?>

