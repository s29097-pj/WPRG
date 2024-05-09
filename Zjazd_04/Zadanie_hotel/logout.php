<?php
session_start();

// Usuwamy wszystkie zmienne sesji.
$_SESSION = array();

// Jeśli jest ustawione ciasteczko sesji, usuwamy je.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Niszczymy sesję.
session_destroy();

// Przekierowujemy do strony logowania
header("Location: login.php");
exit;
?>
