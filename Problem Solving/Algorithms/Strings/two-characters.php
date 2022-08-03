<?php

function is_valid($str)
{
    $last = null;
    for ($x = 0, $l = strlen($str); $x < $l; $x++) {
        if ($last == $str[$x]) {
            return false;
        }

        $last = $str[$x];
    }

    return true;
}

/*
 * Complete the 'alternate' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING s as parameter.
 */

function alternate($s)
{
    $chars = array_values(array_unique(str_split($s, 1)));
    $l = count($chars);
    if ($l < 2) {
        return 0;
    }

    $max = 0;
    for ($x = 0; $x < $l - 1; $x++) {
        for ($y = $x + 1; $y < $l; $y++) {
            $tmp = $chars;
            unset($tmp[$x], $tmp[$y]);
            $str = str_replace($tmp, '', $s);
            if (is_valid($str)) {
                $max = max($max, strlen($str));
            }
        }
    }

    return $max;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$l = intval(trim(fgets(STDIN)));

$s = rtrim(fgets(STDIN), "\r\n");

$result = alternate($s);

fwrite($fptr, $result . "\n");

fclose($fptr);
