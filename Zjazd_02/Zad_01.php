<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Prosty Kalkulator</title>
</head>
<body>
<h1>Prosty Kalkulator</h1>
<form method="post" action="">
    <label for="first">Pierwsza liczba:</label>
    <input type="text" id="first" name="first" required><br>

    <label for="operation">Wybierz działanie:</label>
    <select id="operation" name="operation">
        <option value="add">Dodawanie</option>
        <option value="subtract">Odejmowanie</option>
        <option value="multiply">Mnożenie</option>
        <option value="divide">Dzielenie</option>
    </select><br>

    <label for="second">Druga liczba:</label>
    <input type="text" id="second" name="second" required><br>
    <input type="submit" value="Oblicz">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first = floatval($_POST["first"]);
    $second = floatval($_POST["second"]);
    $operation = $_POST["operation"];

    switch ($operation) {
        case "add":
            $result = $first + $second;
            break;
        case "subtract":
            $result = $first - $second;
            break;
        case "multiply":
            $result = $first * $second;
            break;
        case "divide":
            if ($second != 0) {
                $result = $first / $second;
            } else {
                $result = "Nie można dzielić przez zero!";
            }
            break;
        default:
            $result = "Nieprawidłowe działanie.";
    }

    echo "<p>Wynik: $result</p>";
}
?>
</body>
</html>

