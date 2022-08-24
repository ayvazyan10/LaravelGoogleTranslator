<?php

namespace Ayvazyan10\LaravelGoogleTranslator\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelGoogleTranslator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravelgoogletranslator';
    }
}
