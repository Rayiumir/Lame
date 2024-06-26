<?php

namespace Rayium\Lame\Facade;

use Illuminate\Support\Facades\Facade;

class LameFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'Lame';
    }
}
