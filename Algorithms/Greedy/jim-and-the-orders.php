<?php

/*
 * Complete the 'jimOrders' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts 2D_INTEGER_ARRAY orders as parameter.
 */

function jimOrders($orders)
{
    $digits = strlen(count($orders));
    $prefix = str_repeat('0', $digits);
    $result = [];
    foreach ($orders as $key => $order) {
        $result[(int)(($order[0] + $order[1]) . substr($prefix . $key, -$digits))] = $key + 1;
    }

    ksort($result);

    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$orders = array();

for ($i = 0; $i < $n; $i++) {
    $orders_temp = rtrim(fgets(STDIN));

    $orders[] = array_map('intval', preg_split('/ /', $orders_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = jimOrders($orders);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);

