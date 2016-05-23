<?php

if (!function_exists('str_limit_words')) {
    function str_limit_words($str, $size, $end)
    {
        return mb_substr($str, 0, mb_strrpos(mb_substr($str, 0, $size, 'utf-8'), ' ', 'utf-8'), 'utf-8').' '.$end;
    }
}
