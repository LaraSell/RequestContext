<?php

if (!function_exists('context')) {
    function context()
    {
        $args = func_get_args();

        if (count($args) === 0) {
            return app(\LaraSell\RequestContext\Managers\ContextManager::class);
        }

        if (count($args) === 1) {
            if (is_array($args[0])) {
                foreach ($args[0] as $key => $value) {
                    app(\LaraSell\RequestContext\Managers\ContextManager::class)->put($key, $value);
                }

                return;
            }

            return app(\LaraSell\RequestContext\Managers\ContextManager::class)->get($args[0]);
        }

        return app(\LaraSell\RequestContext\Managers\ContextManager::class)->put($args[0], $args[1]);
    }
}
