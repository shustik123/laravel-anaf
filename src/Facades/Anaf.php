<?php

namespace Andali\Anaf\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Andali\Anaf\Anaf
 */
class Anaf extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-anaf';
    }
}
