<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="reservation_style.css">
</head>
<body>
    <?php
    // Rozpoczęcie sesji
    session_start();

    // Ustalamy dane do logowania
    $login = "admin";
    $password = "password";

    // Sprawdzamy, czy formularz został wysłany
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sprawdzamy, czy dane są prawidłowe
        if ($_POST["login"] == $login && $_POST["password"] == $password) {
            // Jeśli tak, tworzymy sesję
            $_SESSION["logged_in"] = true;

            // Ustawiamy ciasteczko z loginem użytkownika
            setcookie("user_login", $_POST["login"], time() + (86400 * 30), "/"); // 86400 = 1 dzień

            // Przekierowujemy do formularza rezerwacji
            header("Location: reservation_form.php");
            exit;
        } else {
            // Jeśli dane są nieprawidłowe, wyświetlamy błąd
            echo "Nieprawidłowe dane logowania";
        }
    }

    // Wyświetlamy formularz logowania
    echo '
    <h2>Logowanie do systemu rezerwacji</h2>
    <form method="post">
        Login: <input type="text" name="login"><br>
        Hasło: <input type="password" name="password"><br>
        <br>
        <input type="submit" value="Zaloguj">
    </form>
    ';
    ?>
</body>
</html>