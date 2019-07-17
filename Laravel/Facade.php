<?php

namespace Connectkushal\Furl\Laravel;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'furl';
    }
}
