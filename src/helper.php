<?php

if (!function_exists('google')) {
    function google()
    {
        return new Ayvazyan10\LaravelGoogleTranslator\LaravelGoogleTranslator();
    }
}

