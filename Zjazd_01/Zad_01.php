<?php

// Tablica zawierająca nazwy owoców
$owoce = array("jabłko", "banan", "pomarańcza");

// Pętla przechodząca przez każdy owoc w tablicy
foreach ($owoce as $owoc) {
    // Odwrócenie owocu
    $owoc_odwrocony = '';
    for ($i = mb_strlen($owoc, 'UTF-8') - 1; $i >= 0; $i--) {
        $owoc_odwrocony .= mb_substr($owoc, $i, 1, 'UTF-8');
    }

    // Sprawdzenie czy owoc zaczyna się od litery "p"
    $czy_zaczyna_sie_p = mb_substr(mb_strtolower($owoc, 'UTF-8'), 0, 1, 'UTF-8') === 'p' ? 'Tak' : 'Nie';

    // Wyświetlenie owocu od tyłu oraz informacji o pierwszej literze
    echo "Owoc $owoc, nazwa odwrócona $owoc_odwrocony. Czy zaczyna się od litery 'p'?: $czy_zaczyna_sie_p <br>";
}

?>