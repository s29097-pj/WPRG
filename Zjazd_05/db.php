<?php
// a) Nawiązanie połączenia z bazą danych
$servername = "localhost";
$username = "root";
$password = "Qwerty12";
$dbname = "wprgDB";
$port = "3306";

// Utworzenie połączenia
$conn = new mysqli($servername, $username, $password, "", $port); // Początkowo nie podajemy nazwy bazy danych

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sprawdzenie, czy baza danych już istnieje
$dbExistsQuery = "SHOW DATABASES LIKE '" . $dbname . "'";
$dbExistsResult = $conn->query($dbExistsQuery);

if ($dbExistsResult->num_rows == 0) {
    // Baza danych nie istnieje, więc ją tworzymy
    $createDbQuery = "CREATE DATABASE " . $dbname;
    if ($conn->query($createDbQuery) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
} else {
    echo "Database already exists";
}

// Teraz możemy wybrać naszą bazę danych
$conn->select_db($dbname);

// b) Wykonanie polecenia SELECT i przećwiczenie poleceń
$sql = "SELECT * FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Number of rows: " . $result->num_rows . "<br>";
  // Wyświetlenie danych każdego wiersza
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Email: " . $row["email"]. " - Registration date: " . $row["reg_date"]. "<br>";
  }
} else {
  echo "0 results";
}

// c) Wykonanie polecenia INSERT INTO
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>