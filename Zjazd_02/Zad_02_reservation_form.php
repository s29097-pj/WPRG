<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz rezerwacji hotelu</title>
</head>
<body>
<h2>Formularz rezerwacji hotelu</h2>
<form id="reservationForm" action="Zad_02_reservation_summary.php" method="post">
    <!-- Pole wyboru ilości osób -->
    <label for="quantity">Ilość osób:</label>
    <select name="quantity" id="quantity">
        <?php for ($i = 1; $i <= 4; $i++): ?>
            <!-- Tworzenie opcji dla ilości osób -->
            <option value="<?php echo $i; ?>" <?php echo ($i == 1) ? 'selected' : ''; ?>><?php echo $i; ?></option>
        <?php endfor; ?>
    </select><br><br>

    <!-- Kontener na dynamicznie generowane pola dla danych każdej osoby -->
    <div id="guestsInfoContainer">
        <!-- Tutaj będą dynamicznie generowane pola dla danych każdej osoby -->
    </div>

    <!-- Pola dla osoby rezerwującej -->
    <h3>Dane osoby rezerwującej</h3>
    <label for="booking_name">Imię:</label>
    <input type="text" name="booking_name" id="booking_name" required><br><br>
    <label for="booking_surname">Nazwisko:</label>
    <input type="text" name="booking_surname" id="booking_surname" required><br><br>
    <label for="booking_address">Adres:</label>
    <input type="text" name="booking_address" id="booking_address" required><br><br>
    <label for="booking_credit_card">Dane karty kredytowej:</label>
    <input type="text" name="booking_credit_card" id="booking_credit_card" required><br><br>
    <label for="booking_email">E-mail:</label>
    <input type="email" name="booking_email" id="booking_email" required><br><br>

    <!-- Pole dla potrzeby dostawienia łóżka dla dziecka -->
    <label for="child_bed">Potrzeba dostawienia łóżka dla dziecka:</label>
    <input type="checkbox" name="child_bed" id="child_bed"><br><br>

    <!-- Pole dla wyboru udogodnień -->
    <label for="amenities">Udogodnienia:</label><br>
    <input type="checkbox" name="amenities[]" value="klimatyzacja"> Klimatyzacja<br>
    <input type="checkbox" name="amenities[]" value="popielniczka"> Popielniczka dla palacza<br><br>

    <!-- Przycisk submit -->
    <input type="submit" value="Zarezerwuj">
</form>

<script>
    // Funkcja do generowania pól dla dodatkowych osób
    function generateAdditionalGuestFields(quantity) {
        var container = document.getElementById("guestsInfoContainer");
        container.innerHTML = ""; // Wyczyszczenie kontenera

        // Pętla generująca pola dla każdej osoby
        for (var i = 0; i < quantity; i++) {
            var guestNumber = i + 1;
            container.innerHTML += `
                <h3>Dane osoby ${guestNumber}</h3>
                <label for="name${guestNumber}">Imię:</label>
                <input type="text" name="name${guestNumber}" id="name${guestNumber}" required><br><br>
                <label for="surname${guestNumber}">Nazwisko:</label>
                <input type="text" name="surname${guestNumber}" id="surname${guestNumber}" required><br><br>
                <!-- Dodaj tutaj inne pola danych osoby -->
            `;
        }
    }

    // Wywołanie funkcji na początku dla domyślnej ilości osób
    generateAdditionalGuestFields(1);

    // Nasłuchiwanie zmiany wartości w polu ilości osób
    document.getElementById("quantity").addEventListener("change", function() {
        var quantity = parseInt(this.value);
        generateAdditionalGuestFields(quantity); // Wywołanie funkcji generującej pola dla odpowiedniej ilości osób
    });
</script>
</body>
</html>
