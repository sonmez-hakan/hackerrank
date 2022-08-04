<?php

class Solution
{
    protected $matrix = [];

    public function __construct($matrix)
    {
        $this->matrix = $matrix;
    }

    public function solve()
    {
        $max = PHP_INT_MIN;
        for ($x = 0, $rl = count($this->matrix); $x < $rl; $x++) {
            for ($y = 0, $cl = count($this->matrix); $y < $cl; $y++) {
                if ($this->matrix[$x][$y] == 1) {
                    $max = max($max, $this->check($x, $y));
                }
            }
        }

        return $max;
    }

    protected function check($r, $c)
    {
        $this->matrix[$r][$c] = 0;
        $size = 1;
        for ($x = $r - 1; $x <= $r + 1; $x++) {
            for ($y = $c - 1; $y <= $c + 1; $y++ ) {
                if (($this->matrix[$x][$y] ?? 0) == 1) {
                    $size += $this->check($x, $y);
                }
            }
        }

        return $size;
    }
}

//$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$STDIN = fopen('tc.txt', 'r');

$n = intval(trim(fgets($STDIN)));

$m = intval(trim(fgets($STDIN)));

$matrix = array();

for ($i = 0; $i < $n; $i++) {
    $matrix_temp = rtrim(fgets($STDIN));

    $matrix[] = array_map('intval', preg_split('/ /', $matrix_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = (new Solution($matrix))->solve();
echo  $result . PHP_EOL;
//fwrite($fptr, $result . "\n");

fclose($STDIN);
