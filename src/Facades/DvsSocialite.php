<?php

namespace Chondal\DvsSocialite\Facades;

use Illuminate\Support\Facades\Facade;

class DvsSocialite extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'dvs-socialite';
    }
}
