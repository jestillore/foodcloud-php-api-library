<?php

namespace Foodcloud\APILibrary\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the foodcloud facade class.
 *
 * @author Jillberth Estillore <ejillberth@gmail.com>
 */
class Foodcloud extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Foodcloud\APILibrary\Foodcloud::class;
    }
}
