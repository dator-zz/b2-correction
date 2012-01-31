<?php

function translate($word) {
    $alphabet = array(
        'A' => 'D',
        'B' => 'W',
        'C' => 'H',
        'D' => 'G',
        'E' => 'Q',
        'F' => 'J',
        'G' => 'S',
        'H' => 'Z',
        'I' => 'P',
        'J' => 'U',
        'K' => 'B',
        'L' => 'K',
        'M' => 'A',
        'N' => 'X',
        'O' => 'I',
        'P' => 'O',
        'Q' => 'M',
        'R' => 'L',
        'S' => 'R',
        'T' => 'N',
        'U' => 'E',
        'V' => 'C',
        'W' => 'V',
        'X' => 'F',
        'Y' => 'T',
        'Z' => 'Y',  
    );

    $newWord = '';

    $word = explode('.', $word);
    for($i = 0; $i < count($word); $i++) {
        $newWord .= $alphabet[strtoupper($word[$i])];
    }
    return $newWord;
}

echo translate("a.p.r.i.c.o.t");


