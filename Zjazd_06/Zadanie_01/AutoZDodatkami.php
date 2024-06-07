<?php

require_once 'NoweAuto.php';

// Klasa AutoZDodatkami dziedziczy po klasie NoweAuto
class AutoZDodatkami extends NoweAuto {
    // Deklaracja dodatkowych zmiennych
    protected $alarm;
    protected $radio;
    protected $klimatyzacja;

    // Konstruktor klasy
    public function __construct($model, $cena, $kurs, $alarm, $radio, $klimatyzacja) {
        parent::__construct($model, $cena, $kurs); // Wywołanie konstruktora klasy nadrzędnej
        $this->alarm = $alarm; // Przypisanie wartości do alarmu
        $this->radio = $radio; // Przypisanie wartości do radia
        $this->klimatyzacja = $klimatyzacja; // Przypisanie wartości do klimatyzacji
    }

    // Metoda do obliczania ceny auta w Euro z dodatkami
    public function AutoCenaEuro() {
        $cenaDodatkow = $this->alarm + $this->radio + $this->klimatyzacja; // Sumowanie cen dodatków
        return $this->cena + $cenaDodatkow; // Dodanie ceny dodatków do ceny auta
    }

    // Metoda do obliczania ceny auta w PLN z dodatkami
    public function AutoCenaPLN() {
        return $this->AutoCenaEuro() * $this->kurs; // Przeliczenie ceny auta z dodatkami na PLN
    }

    // Metoda do obliczania ceny dodatków w Euro
    public function CenaDodatkowEuro() {
        return array('Alarm' => $this->alarm, 'Radio' => $this->radio, 'Klimatyzacja' => $this->klimatyzacja); // Zwraca tablicę z cenami dodatków w Euro
    }

    // Metoda do obliczania ceny dodatków w PLN
    public function CenaDodatkowPLN() {
        return array('Alarm' => $this->alarm * $this->kurs, 'Radio' => $this->radio * $this->kurs, 'Klimatyzacja' => $this->klimatyzacja * $this->kurs); // Zwraca tablicę z cenami dodatków w PLN
    }

    // Metoda do obliczania sumy cen dodatków w Euro
    public function SumaCenEuro() {
        return $this->alarm + $this->radio + $this->klimatyzacja; // Sumowanie cen dodatków
    }

    // Metoda do obliczania sumy cen dodatków w PLN
    public function SumaCenPLN() {
        return ($this->alarm + $this->radio + $this->klimatyzacja) * $this->kurs; // Przeliczenie sumy cen dodatków na PLN
    }
}
?>