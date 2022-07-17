<?php

function checkMagazine($magazine, $note) {
    foreach ($note as $word) {
        $index = array_search($word, $magazine);
        if ($index === false) {
            return print 'No';
        }

        unset($magazine[$index]);
    }

    return print 'Yes';
}