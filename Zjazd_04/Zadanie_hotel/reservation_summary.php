<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reservation_style.css">
    <title>Podsumowanie rezerwacji</title>
</head>
<body>
<h2>Podsumowanie rezerwacji</h2>
<?php
// Sprawdzenie, czy formularz został wysłany metodą POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie ilości osób z formularza
    $quantity = isset($_POST["quantity"]) ? $_POST["quantity"] : "";

    // Wyświetlenie ilości osób
    echo "<p>Ilość osób: $quantity</p>";

    // Pobranie danych osoby rezerwującej
    $booking_name = isset($_POST["booking_name"]) ? $_POST["booking_name"] : "";
    $booking_surname = isset($_POST["booking_surname"]) ? $_POST["booking_surname"] : "";
    $booking_address = isset($_POST["booking_address"]) ? $_POST["booking_address"] : "";
    $booking_credit_card = isset($_POST["booking_credit_card"]) ? $_POST["booking_credit_card"] : "";
    $booking_email = isset($_POST["booking_email"]) ? $_POST["booking_email"] : "";

    // Wyświetlenie danych osoby rezerwującej
    echo "<h3>Dane osoby rezerwującej</h3>";
    echo "<p>Imię: $booking_name</p>";
    echo "<p>Nazwisko: $booking_surname</p>";
    echo "<p>Adres: $booking_address</p>";
    echo "<p>Dane karty kredytowej: $booking_credit_card</p>";
    echo "<p>E-mail: $booking_email</p>";

    // Iteracja przez ilość osób i pobieranie danych z formularza
    for ($i = 1; $i <= $quantity; $i++) {
        // Pobranie danych kolejnych osób
        $name = isset($_POST["name$i"]) ? $_POST["name$i"] : "";
        $surname = isset($_POST["surname$i"]) ? $_POST["surname$i"] : "";

        // Wyświetlenie danych kolejnych osób
        echo "<h3>Dane osoby $i</h3>";
        echo "<p>Imię: $name</p>";
        echo "<p>Nazwisko: $surname</p>";
        // Dodaj tutaj inne pola danych osoby
    }

    // Sprawdzenie, czy potrzebne jest dostawienie łóżka dla dziecka
    $child_bed = isset($_POST["child_bed"]) ? "Tak" : "Nie";

    // Sprawdzenie, jakie udogodnienia zostały wybrane
    $amenities = isset($_POST["amenities"]) ? implode(", ", $_POST["amenities"]) : "Brak";

    // Wyświetlenie informacji o potrzebie dostawienia łóżka dla dziecka oraz wybranych udogodnieniach
    echo "<p>Potrzeba dostawienia łóżka dla dziecka: $child_bed</p>";
    echo "<p>Udogodnienia: $amenities</p>";
}
?>
</body>
</html>
