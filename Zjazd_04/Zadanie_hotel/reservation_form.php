<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz rezerwacji hotelu</title>
    <link rel="stylesheet" href="reservation_style.css">
</head>
<body>

<?php
session_start();

// Sprawdzamy, czy użytkownik jest zalogowany
if (!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
    // Jeśli nie, przekierowujemy do strony logowania
    header("Location: login.php");
    exit;
}

// Jeśli użytkownik jest zalogowany, wyświetlamy powitanie
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
    echo "<span class='welcome-message'>Witaj, " . $_COOKIE["user_login"] . "</span>";
} else {
    // Jeśli użytkownik nie jest zalogowany, wyświetlamy informację o braku dostępu
    echo "Nie masz dostępu do tej części strony. Musisz się zalogować, aby móc rezerwować hotel.";
}

?>

<h2>Formularz rezerwacji hotelu</h2>
<form id="reservationForm" action="reservation_summary.php" method="post">
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
    <label>
        <input type="checkbox" name="amenities[]" value="klimatyzacja">
    </label> Klimatyzacja<br>
    <label>
        <input type="checkbox" name="amenities[]" value="popielniczka">
    </label> Popielniczka dla palacza<br><br>

    <!-- Przycisk submit -->
    <input type="submit" value="Zarezerwuj">

    <!-- Przerwa między przyciskami -->
    <br><br>

    <!-- Przycisk wylogowywania -->
    <a href="logout.php" class="logout-button">Wyloguj</a>
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

    // Funkcja do zapisywania stanu formularza do ciasteczek
    function saveFormState() {
        var form = document.getElementById("reservationForm");
        var formState = {};

        // Iterujemy przez wszystkie pola formularza
        for (var i = 0; i < form.elements.length; i++) {
            var element = form.elements[i];

            // Zapisujemy stan pola do obiektu formState
            formState[element.name] = element.value;
        }

        // Ustawiamy datę wygaśnięcia ciasteczka na 7 dni od teraz
        var expirationDate = new Date();
        expirationDate.setDate(expirationDate.getDate() + 7);

        // Zapisujemy stan formularza do ciasteczka
        document.cookie = "formState=" + JSON.stringify(formState);
    }

    // Funkcja do wczytywania stanu formularza z ciasteczek
    function loadFormState() {
        var form = document.getElementById("reservationForm");

        // Wczytujemy stan formularza z ciasteczka
        var formState = JSON.parse(document.cookie.replace(/(?:^|.*;\s*)formState\s*=\s*([^;]*).*$|^.*$/, "$1"));

        // Iterujemy przez wszystkie pola formularza
        for (var i = 0; i < form.elements.length; i++) {
            var element = form.elements[i];

            // Przywracamy stan pola z obiektu formState
            if (formState[element.name]) {
                element.value = formState[element.name];
            }
        }
    }

    // Funkcja do czyszczenia stanu formularza
    function clearFormState() {
        // Usuwamy ciasteczko
        document.cookie = "formState=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

        // Czyścimy formularz
        document.getElementById("reservationForm").reset();
    }

    // Nasłuchujemy na zmiany w formularzu
    document.getElementById("reservationForm").addEventListener("change", saveFormState);

    // Wczytujemy stan formularza przy ładowaniu strony
    window.addEventListener("load", loadFormState);

    // Dodajemy przerwę między formularzem a przyciskiem
    document.body.appendChild(document.createElement("br"));

    // Dodajemy przycisk do czyszczenia formularza
    var clearButton = document.createElement("button");
    clearButton.textContent = "Wyczyść formularz i ciasteczka";
    clearButton.addEventListener("click", function(event) {
        event.preventDefault(); // Zapobiegamy domyślnej akcji przycisku
        clearFormState();
    });
    document.body.appendChild(clearButton);

</script>
</body>
</html>
