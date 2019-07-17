<?php

namespace Connectkushal\Furl

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'furl';
    }
}
