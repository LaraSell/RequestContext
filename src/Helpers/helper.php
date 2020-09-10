<?php

if (!function_exists('context')) {
    function context()
    {
        $args = func_get_args();

        if (count($args) === 0) {
            return app(\LaraSell\RequestContext\Managers\ContexManager::class);
        }

        if (count($args) === 1) {
            if (is_array($args[0])) {
                foreach ($args[0] as $key => $value) {
                    app(\LaraSell\RequestContext\Managers\ContexManager::class)->put($key, $value);
                }

                return;
            }

            return app(\LaraSell\RequestContext\Managers\ContexManager::class)->get($args[0]);
        }

        return app(\LaraSell\RequestContext\Managers\ContexManager::class)->put($args[0], $args[1]);
    }
}
