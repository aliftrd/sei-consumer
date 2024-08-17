<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('dd')) {
    function dd(...$params)
    {
        echo '<pre>';
        print_r($params);
        echo '</pre>';
        die;
    }
}
