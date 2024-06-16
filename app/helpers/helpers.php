<?php

if (!function_exists('formatLikes')) {
    function formatLikes($number)
    {
        if ($number >= 1000000) {
            return number_format($number / 1000000, 0) . 'M';
        } elseif ($number >= 1000) {
            return number_format($number / 1000, 0) . 'K';
        } else {
            return $number;
        }
    }
}
