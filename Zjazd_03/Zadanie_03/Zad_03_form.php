<?php
// Definiowanie funkcji handleDirectory
function handleDirectory($path, $dirName, $operation = 'read') {
    // Sprawdzenie, czy ścieżka kończy się na "/"
    if (substr($path, -1) !== '/') {
        $path .= '/';
    }

    $fullPath = $path . $dirName;

    // Wybór operacji na podstawie wartości $operation
    switch ($operation) {
        case 'read':
            // Jeśli katalog istnieje, odczytaj i zwróć jego zawartość
            if (is_dir($fullPath)) {
                $files = array_diff(scandir($fullPath), array('.', '..'));
                if (empty($files)) {
                    return "Katalog jest pusty.";
                } else {
                    return implode(', ', $files);
                }
            } else {
                return "Katalog nie istnieje.";
            }
            break;
        case 'delete':
            // Jeśli katalog istnieje i jest pusty, usuń go
            if (is_dir($fullPath)) {
                if (count(scandir($fullPath)) == 2) { // Katalog jest pusty
                    rmdir($fullPath);
                    return "Katalog został usunięty.";
                } else {
                    return "Katalog nie jest pusty.";
                }
            } else {
                return "Katalog nie istnieje.";
            }
            break;
        case 'create':
            // Jeśli katalog nie istnieje, stwórz go
            if (!is_dir($fullPath)) {
                mkdir($fullPath);
                return "Katalog został stworzony.";
            } else {
                return "Katalog już istnieje.";
            }
            break;
        default:
            return "Nieznana operacja.";
    }
}

// Obsługa formularza po jego wysłaniu
if (isset($_POST['submit'])) {
    $path = $_POST['path'];
    $dirName = $_POST['dirName'];
    $operation = $_POST['operation'];

    // Wywołanie funkcji handleDirectory i wyświetlenie wyniku
    $result = handleDirectory($path, $dirName, $operation);
    echo $result;
}
?>