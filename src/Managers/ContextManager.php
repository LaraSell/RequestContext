<?php

namespace LaraSell\RequestContext\Managers;

use LaraSell\RequestContext\Exceptions\UnregisteredContextException;

class ContextManager
{
    /**
     * The collection of contexts
     * 
     * @var array
     */
    private $contexts = [];

    /**
     * Add a context to the collection
     * 
     * @param string|array $key
     * @param mixed $value
     * @return void
     */
    public function put($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $arrayKey => $arrayValue) {
                $this->bind((string) $arrayKey, $arrayValue);
            }
        } else {
            $this->bind((string) $key, $value);
        }
    }

    /**
     * Get a value from the contexts
     * 
     * @param $key
     * @throws UnregisteredContextException
     * @return mixed
     */
    public function get($key)
    {
        if (isset($this->contexts[$key])) {
            return $this->contexts[$key];
        }

        throw new UnregisteredContextException('No context registered for ' . $key);
    }

    /**
     * Get all contexts
     * 
     * @return array
     */
    public function all()
    {
        return $this->contexts;
    }

    /**
     * Store a key value pair into the collection
     * 
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function bind(string $key, $value)
    {
        $this->contexts[$key] = $value;
    }
}
