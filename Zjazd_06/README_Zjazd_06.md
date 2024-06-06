## Zjazd 06

### Zadania - programowanie obiektowe

### Zadanie 1 (3 pkt)

Zaprojektuj klasy oraz ich zawartość, tj. pola, właściwości oraz metody.

1. Klasą bazową będzie klasa `NoweAuto`, zawierająca informacje takie jak:
   * model auta - string;
   * cena w Euro - int/float;
   * aktualny kurs Euro/PLN - float.
2.	Klasa `NoweAuto` będzie obliczała cenę auta w PLN za pomocą metody `ObliczCene`.
3. Klasą potomną względem klasy `NoweAuto` będzie klasa `AutoZDodatkami`, która zawierać będzie dodatkowe pola podnoszące cenę auta:
   * alarm - int/float;
   * radio - int/float;
   * klimatyzacja - int/float.
4.	Klasa `AutoZDodatkami`, będzie posiadała również metodę do obliczania ceny auta w PLN. 
W tym przypadku należy przesłonić metodę `ObliczCene` z klasy bazowej.
5.	Metoda `ObliczCene` w klasie `AutoZDodatkami`, 
będzie sumować cenę samochodu oraz cenę poszczególnych dodatków i dopiero wtedy zwracać wartość samochodu.
6. Klasa `Ubezpiecznie`, będzie klasą potomną względem klasy `AutoZDodatkami` i będzie zawierać:
   * procentowa wartość ubezpieczenia - float,
   * liczba lat posiadania samochodu - int.
7.	Klasa Ubezpieczenie również będzie posiadać metodę ObliczCene, która będzie obliczać wartość ubezpieczenia na podstawie procentowej wartości ubezpieczenia i wartości samochodu pomniejszoną o 1% za każdy rok posiadania samochodu. (procentowa wartość * (wartość samochodu z dodatkami * ((100-liczba lat)/100))) 

### Zadanie 2 (2 pkt)

Zdefiniuj system zarządzania sklepem internetowym. 
System powinien zawierać klasy reprezentujące produkty oraz koszyk. 
Oto szczegółowe wymagania:

**Klasa Product:**
1.	Powinna posiadać prywatne właściwości `$name`, `$price` oraz `$quantity`.
2.	Powinna mieć konstruktor do inicjalizacji wszystkich właściwości.
3.	Powinna mieć metody `get` oraz `set` dla wszystkich właściwości.
4.	Powinna mieć metodę `__toString()`, która zwraca ciąg reprezentujący szczegóły produktu.
Przykładowe wywołanie metody `toString(): Product: Laptop, Price: 1500, Quantity: 1`.

**Klasa Cart:**
1.	Powinna posiadać prywatne właściwości `$products` (tablica produktów).
2.	Powinna mieć konstruktor inicjalizujący pustą tablicę produktów.
3.	Powinna mieć metodę `addProduct(Product $product)`, która dodaje produkt do koszyka.
4.	Powinna mieć metodę `removeProduct(Product $product)`, która usuwa produkt z koszyka.
5.	Powinna mieć metodę `getTotal()`, która zwraca całkowitą cenę produktów w koszyku.
6.	Powinna mieć metodę `__toString()`, która zwraca listę wszystkich produktów w koszyku wraz z całkowitą ceną. 

**Przykładowe wywołanie metody `toString()`:**

    ```  
    Products in cart: 
    Product: Laptop, Price: 1500, Quantity: 1 
    Total price: 1500 
    ```