<?php

class Ubezpieczenie extends AutoZDodatkami {
    public $procentUbezpieczenia; // Procentowa wartość ubezpieczenia
    public $liczbaLat; // Liczba lat posiadania samochodu

    // Konstruktor klasy
    public function __construct($model, $cena, $kurs, $alarm, $radio, $klimatyzacja, $procentUbezpieczenia, $liczbaLat) {
        parent::__construct($model, $cena, $kurs, $alarm, $radio, $klimatyzacja); // Wywołanie konstruktora klasy nadrzędnej
        $this->procentUbezpieczenia = $procentUbezpieczenia; // Przypisanie wartości do procentowej wartości ubezpieczenia
        $this->liczbaLat = $liczbaLat; // Przypisanie wartości do liczby lat
    }

    // Metoda do obliczania wartości ubezpieczenia w PLN
    public function AutoCenaPLN() {
        $cenaDodatkow = $this->alarm + $this->radio + $this->klimatyzacja; // Sumowanie cen dodatków
        $cenaAutaiDodatkow = ($this->cena + $cenaDodatkow) * $this->kurs; // Dodanie ceny dodatków do ceny auta i przeliczenie na PLN
        $wartoscUbezpieczenia = $this->procentUbezpieczenia * ($cenaAutaiDodatkow * ((100 - $this->liczbaLat) / 100)); // Obliczanie wartości ubezpieczenia
        return $wartoscUbezpieczenia; // Zwracanie wartości ubezpieczenia
    }

    // Metoda do obliczania wartości ubezpieczenia w Euro
    public function AutoCenaEuro() {
        $cenaDodatkow = $this->alarm + $this->radio + $this->klimatyzacja; // Sumowanie cen dodatków
        $cenaAutaiDodatkow = $this->cena + $cenaDodatkow; // Dodanie ceny dodatków do ceny auta
        $wartoscUbezpieczenia = $this->procentUbezpieczenia * ($cenaAutaiDodatkow * ((100 - $this->liczbaLat) / 100)); // Obliczanie wartości ubezpieczenia
        return $wartoscUbezpieczenia; // Zwracanie wartości ubezpieczenia
    }
}
?>