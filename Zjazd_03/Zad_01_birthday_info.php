<?php
// birthday_info.php

// Funkcja przyjmuje datę urodzenia jako argument i zwraca dzień tygodnia, w którym urodził się użytkownik.
function getDayOfWeek($birthdate) {
    $daysOfWeek = ['Monday' => 'Poniedziałek', 'Tuesday' => 'Wtorek', 'Wednesday' => 'Środa', 'Thursday' => 'Czwartek', 'Friday' => 'Piątek', 'Saturday' => 'Sobota', 'Sunday' => 'Niedziela'];
    $dayOfWeekEnglish = date('l', strtotime($birthdate));
    return $daysOfWeek[$dayOfWeekEnglish] ?? '';
}

// Funkcja przyjmuje datę urodzenia jako argument i zwraca wiek użytkownika.
function getAge($birthdate) {
    $birthdate = new DateTime($birthdate);
    $today = new DateTime();
    $interval = $today->diff($birthdate);
    return $interval->y;
}

// Funkcja przyjmuje datę urodzenia jako argument i zwraca ilość dni do najbliższych, przyszłych urodzin.
function getDaysUntilNextBirthday($birthdate) {
    $birthdate = new DateTime($birthdate);
    $today = new DateTime();
    $nextBirthday = (clone $birthdate)->setDate($today->format('Y'), $birthdate->format('m'), $birthdate->format('d'));

    if($today > $nextBirthday) {
        $nextBirthday->modify('+1 year');
    }

    return $today->diff($nextBirthday)->days;
}

// Sprawdzamy, czy formularz został wysłany i czy data urodzenia została podana.
if(isset($_GET['birthdate'])) {
    $birthdate = $_GET['birthdate'];
    // Wyświetlamy wyniki wewnątrz diva z klasą 'result'
    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<title>Wyniki</title>";
    echo "<link rel='stylesheet' href='Zad_01_birthday_info.css'>";
    echo "</head>";
    // Dodajemy nagłówek z wynikami.
    echo "<h1>Informacje urodzinowe</h1>";
    echo "<body>";
    echo "<div class='result'>";
    // Wyświetlamy dzień tygodnia urodzenia.
    echo "<p>Dzień tygodnia urodzenia: " . getDayOfWeek($birthdate) . "</p>";
    // Wyświetlamy wiek użytkownika.
    echo "<p>Wiek (lat): " . getAge($birthdate) . "</p>";
    // Wyświetlamy ilość dni do najbliższych urodzin.
    echo "<p>Dni do najbliższych urodzin: " . getDaysUntilNextBirthday($birthdate) . "</p>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
}
?>

