<?php

class NoweAuto {
    // Deklaracja zmiennych
    protected $model;
    protected $cena;
    protected $kurs;

    // Konstruktor klasy
    public function __construct($model, $cena, $kurs) {
        $this->model = $model; // Przypisanie wartości do modelu
        $this->cena = $cena; // Przypisanie wartości do ceny
        $this->kurs = $kurs; // Przypisanie wartości do kursu
    }

    // Metoda do obliczania ceny auta w PLN
    public function AutoCenaPLN() {
        return $this->cena * $this->kurs; // Cena w Euro przeliczana na PLN
    }

    // Metoda do pobierania ceny auta w Euro
    public function AutoCenaEuro() {
        return $this->cena; // Zwraca cenę w Euro
    }

    // Metoda do wyświetlania informacji o aucie
    public function __toString() {
        // Zwraca informacje o modelu, cenie w Euro i kursie Euro/PLN
        return "Model: " . $this->model . ", <br> Cena w Euro: " . $this->cena . ", <br> Kurs Euro/PLN: " . $this->kurs;
    }
}
?>