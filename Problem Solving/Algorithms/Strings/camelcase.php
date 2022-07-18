<?php
function camelcase($s) {
    $result = preg_split('/(?=[A-Z])/', $s);

    return count($result);
}