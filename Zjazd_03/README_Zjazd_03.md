## Zjazd 03 

### Data i czas  

#### Zad_01
**Utwórz prosty formularz, który pozwoli na wybranie daty urodzenia.** 
Dane powinny zostać przesłane za pomocą metody GET. Po podaniu daty przez użytkownika, należy za pomocą osobnych funkcji sprawdzić i wyświetlić następujące informacje:
- w jaki dzień tygodnia urodził się użytkownik;
- ukończone lata użytkownika;
- ilość dni do najbliższych, przyszłych urodzin. 

#### Zad_02

**Napisz funkcję rekurencyjną liczącą silnię lub dowolny wyraz ciągu Fibonacciego oraz jej zwykły odpowiednik (nierekurencyjny).** 
Obie funkcje powinny przyjmować stosowny argument. Następnie zmierz działanie obu funkcji dla argumentu podanego przez użytkownika i wyświetl informacje o tym, która funkcja i o ile działała szybciej. 

### Struktura plików 

#### Zad_03
**Stwórz prosty formularz do obsługi zadania.** 
Napisz funkcję, która przyjmie jako pierwszy argument ścieżkę (np. "./php/images/network"), jako drugi nazwę katalogu, a jako trzeci, opcjonalny parametr rodzaj operacji do wykonania:
- read - odczytanie wszystkich elementów w katalogu (domyślna wartość parametru);
- delete - usunięcie wskazanego katalogu w podanej ścieżce;
- create - stworzenie katalogu w podanej ścieżce. 
Zwróć odpowiedni komunikat (listę elementów lub czy udało się stworzyć/usunąć katalog).
Przy próbie odczytu pamiętaj o sprawdzeniu, czy dany katalog istnieje, a przy próbie usunięcia - czy katalog jest pusty i czy istnieje. Pamiętaj również o sprawdzeniu, czy ostatnim znakiem ścieżki jest "/" - ułatwi to wykonanie powyższych instrukcji.



