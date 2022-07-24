<?php

/*
 * Complete the 'palindromeIndex' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING s as parameter.
 */
function palindromeIndex($s) {
    $len = strlen($s);
    $even = $len % 2 === 0;
    $l = (int)($len / 2);

    for ($x = 0; $x < $l; $x++) {
        $reverse = $len - 1 - $x;
        if ($s[$x] == $s[$reverse]) {
            continue;
        }

        $count = $l - $x - ($even ? 1 : 0);
        if (substr($s, $x, $count) == strrev(substr($s, $l, $count))) {
            return $reverse;
        }

        return $x;
    }

    return -1;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = rtrim(fgets(STDIN), "\r\n");

    $result = palindromeIndex($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
