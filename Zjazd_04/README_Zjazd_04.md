## Zjazd 04

### Zadania - cookies, sesje, mail

Do zadania z rezerwacją hotelu (z warsztatu 2) dopisać użycie ciasteczek i sesji.

a) `Ciasteczka` 

Formularz, który zostanie wypełniony, po wyłączeniu, następnie włączeniu przeglądarki ma się wczytać do stanu sprzed wyłączenia. Dodać też przycisk, który wyczyści formularz, czyli usunie ciasteczka. Ciasteczka mają mieć ustalona żywotność.

> [!TIP]
>  - Stan formularza jest zapisywany do ciasteczek za każdym razem, gdy użytkownik wprowadza zmiany w formularzu. To jest realizowane przez funkcję `saveFormState()`, która jest wywoływana za każdym razem, gdy zdarzenie `change` jest wywoływane na formularzu.
>  - Stan formularza jest wczytywany z ciasteczek za każdym razem, gdy strona jest ładowana. To jest realizowane przez funkcję `loadFormState()`, która jest wywoływana za każdym razem, gdy zdarzenie `load` jest wywoływane na oknie.
>  - Jest przycisk, który czyści formularz i usuwa ciasteczka. To jest realizowane przez funkcję `clearFormState()`, która jest wywoływana za każdym razem, gdy przycisk do czyszczenia formularza jest kliknięty.
>  - Ciasteczka mają ustawioną żywotność na 7 dni. To jest realizowane przez dodanie daty wygaśnięcia do ciasteczka w funkcji `saveFormState()`.

b) `Sesje`

Wykorzystując mechanizm sesji dodać możliwość logowania. Dane do logowania mogą być "na sztywno" ustawione jako zmienne (formalna rejestracja i przechowanie kont użytkowników będzie do wykonania przy okazji zajęć z baz danych). Cały mechanizm ma działać następująco, po zalogowaniu uzyskuje się dostęp do formularza. Zalogowanie ma utworzyć sesje. Wylogowanie (należy dodać odpowiedni przycisk) ma wykluczyć możliwość korzystania z formularza rezerwacji, czyli bez zalogowania się = otwartej sesji, nie można uzyskać dostępu do formularza.

> [!TIP]
> - Mechanizm logowania jest zaimplementowany za pomocą sesji. W pliku `login.php`, po prawidłowym zalogowaniu, tworzona jest sesja z kluczem `logged_in` ustawionym na `true`. Po zalogowaniu, użytkownik jest przekierowywany do formularza rezerwacji (`reservation_form.php`). W pliku `reservation_form.php`, na początku pliku, sprawdzane jest, czy użytkownik jest zalogowany (czyli czy sesja `logged_in` jest ustawiona i ma wartość `true`). Jeśli nie, użytkownik jest przekierowywany z powrotem do strony logowania.
> - Na stronie formularza rezerwacji (`reservation_form.php`), po zalogowaniu, użytkownik ma dostęp do formularza rezerwacji. Formularz umożliwia wprowadzenie danych rezerwacji, takich jak ilość osób, dane osobowe, czy potrzeba dostawienia łóżka dla dziecka, a także wybór udogodnień. 
> - Na stronie formularza rezerwacji, użytkownik ma również możliwość wylogowania się poprzez kliknięcie przycisku "Wyloguj". Kliknięcie tego przycisku przekierowuje użytkownika do pliku `logout.php`.
> - Plik `logout.php` niszczy sesję, usuwając wszystkie zmienne sesji i usuwając ciasteczko sesji, jeśli jest ustawione. Następnie przekierowuje użytkownika z powrotem do strony logowania (`login.php`).

c) Po zalogowaniu przywitać użytkownika rozpoznając jego login, ale nie ten wcześniej ustawiony jako zmienna, tylko używając ciasteczek.
W przypadku kiedy użytkownik jest niezalogowany, ma otrzymać informację o braku dostępu do tej części strony, gdzie można rezerwować hotel, a także informacje o tym, dlaczego nie może uzyskać tego dostępu (pytanie: dlaczego nie może uzyskać wspomnianego dostępu?).

> [!TIP]
> - Po zalogowaniu, na stronie formularza rezerwacji (`reservation_form.php`), użytkownik jest przywitany na górze strony. Witamy użytkownika, korzystając z ciasteczka sesji `username`, które jest ustawione po zalogowaniu.
> - Jeśli użytkownik nie jest zalogowany, na stronie formularza rezerwacji (`reservation_form.php`) wyświetlany jest komunikat, informujący użytkownika, że nie ma dostępu do formularza rezerwacji, ponieważ nie jest zalogowany.
> - Komunikat informujący użytkownika, że nie ma dostępu do formularza rezerwacji, jest wyświetlany, ponieważ na stronie formularza rezerwacji sprawdzane jest, czy użytkownik jest zalogowany (czyli czy sesja `logged_in` jest ustawiona i ma wartość `true`). Jeśli nie, użytkownik jest przekierowywany z powrotem do strony logowania.
