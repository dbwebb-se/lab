<?php

/**
 * Split a md5 hash and make it a integer.
 */
function md5_to_int($md5)
{
    static $inc = 0;

    $inc++;

    $parts = str_split($md5, 2);

    $sum = $inc;
    foreach ($parts as $val) {
        $sum += $val;
    }
    return $sum;
}



/**
 * Create random integer within a range.
 */
function rand_int($min, $max)
{
    mt_srand(md5_to_int(KEY));
    return mt_rand($min, $max);
}



/**
 * Create random float within a range.
 */
function rand_float($min, $max, $precision)
{
    mt_srand(md5_to_int(KEY));
    $factor = pow(10, $precision);
    return mt_rand($min*$factor, $max*$factor) / $factor;
}
