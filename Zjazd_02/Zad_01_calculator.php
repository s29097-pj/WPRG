<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Prosty Kalkulator</title>
</head>
<body>
<h1>Prosty Kalkulator</h1>
<form method="post" action="">
    <!-- Pole tekstowe do wprowadzenia pierwszej liczby -->
    <label for="first">Pierwsza liczba:</label>
    <input type="text" id="first" name="first" required><br>

    <!-- Lista rozwijana do wyboru działania -->
    <label for="operation">Wybierz działanie:</label>
    <select id="operation" name="operation">
        <option value="add">Dodawanie</option>
        <option value="subtract">Odejmowanie</option>
        <option value="multiply">Mnożenie</option>
        <option value="divide">Dzielenie</option>
    </select><br>

    <!-- Pole tekstowe do wprowadzenia drugiej liczby -->
    <label for="second">Druga liczba:</label>
    <input type="text" id="second" name="second" required><br>
    <!-- Przycisk do zatwierdzenia formularza -->
    <input type="submit" value="Oblicz">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobieranie wartości z formularza i konwersja na liczby zmiennoprzecinkowe
    $first = isset($_POST["first"]) ? floatval($_POST["first"]) : 0;
    $second = isset($_POST["second"]) ? floatval($_POST["second"]) : 0;
    $operation = isset($_POST["operation"]) ? $_POST["operation"] : '';

    // Wybór odpowiedniej operacji na podstawie wyboru użytkownika
    switch ($operation) {
        case "add":
            $result = $first + $second; // Dodawanie
            break;
        case "subtract":
            $result = $first - $second; // Odejmowanie
            break;
        case "multiply":
            $result = $first * $second; // Mnożenie
            break;
        case "divide":
            // Sprawdzenie, czy druga liczba nie jest zerem przed dzieleniem
            if ($second != 0) {
                $result = $first / $second; // Dzielenie
            } else {
                $result = "Nie można dzielić przez zero!"; // Komunikat o dzieleniu przez zero
            }
            break;
    }

    // Wyświetlenie wyniku działania
    echo "<p>Wynik: $result</p>";
}
?>
</body>
</html>
