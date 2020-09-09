<?php

namespace LaraSell\RequestContext\Facades;

use Illuminate\Support\Facades\Facade;
use LaraSell\RequestContext\Managers\ContextManager;

class Context extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ContextManager::class;
    }
}
