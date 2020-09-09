<?php

namespace LaraSell\RequestContext\Facades;

use Illuminate\Support\Facades\Facade;
use LaraSell\RequestContext\Managers\ContextManager;

class Context extends Facade
{
    public static function getFacadeAccessor()
    {
        return ContextManager::class;
    }
}
