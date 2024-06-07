## Zjazd 05

### Zadania - bazy danych

1. Utworzyć skrypt PHP:

    a) Nawiązać połączenie z bazą.

```mysql
$conn = new mysqli($servername, $username, $password, "", $port);
```

W PhpStorm w katalogu projektu utworzyć plik `db.php`.
W pliku `db.php` utworzyć skrypt łączący się z bazą danych.

Ustawienia bazy danych w MySQL Workbench:
- ustawienie wielu instancji serwera MySQL:
    - `Edit` -> `Preferences` -> `Others` --> `Allow more than one instance of MySQL Workbench to run`

![img_01.png](/img/img_01.png)

![img_02.png](/img/img_02.png)

![img_03.png](/img/img_03.png)

Ustawienie bazy w Windows 11:

![img_04.png](/img/img_04.png)

Ustawienie bazy w PHPStorm:

![img_05.png](/img/img_05.png)

b) Wykonać polecenie `SELECT` i przećwiczyć polecenia:
   - `mysqli_fetch_row`: Ta funkcja służy do pobierania wyników zapytania `SELECT` jako numerycznej tablicy. 
Każdy wiersz wyników jest zwracany jako tablica, gdzie klucze są indeksami numerycznymi reprezentującymi pozycję kolumny w wynikach.
   - `mysqli_fetch_array`: Ta funkcja jest podobna do `mysqli_fetch_row`, ale pozwala na pobieranie wyników jako asocjacyjnej tablicy, numerycznej tablicy lub obu. 
Domyślnie zwraca obie formy tablicy. Możesz kontrolować, jakie tablice są zwracane, przekazując drugi argument do `mysqli_fetch_array`. 
Na przykład, `mysqli_fetch_array($result, MYSQLI_ASSOC)` zwróci wyniki jako asocjacyjną tablicę.
   - `mysqli_num_rows`: Ta funkcja zwraca liczbę wierszy w wynikach zapytania `SELECT`. 
Jest to przydatne, jeśli chcesz wiedzieć, ile wierszy zostało zwróconych przez zapytanie `SELECT` przed iteracją przez wyniki.

```mysql
$sql = "SELECT * FROM MyGuests";
$result = $conn->query($sql);
```

c) Wykonać polecenie `INSERT INTO`, (by zaobserwować dodawanie przy pomocy php danych do bazy).

```mysql
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";
```

d) Załączyć skrypt PHP do repozytorium.

Logi z działania skryptu:

![img_06.png](/img/img_06.png)

![img_07.png](/img/img_07.png)
