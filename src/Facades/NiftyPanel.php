<?php

namespace Willywes\NiftyPanel\Facades;

use Illuminate\Support\Facades\Facade;

class NiftyPanel extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'niftypanel';
    }
}
