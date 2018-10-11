<?php

namespace Phlash;

class FuncProxy
{
    /**
     * Proxy upon which to call methods.
     *
     * @var mixed
     */
    protected $proxy;

    /**
     * Construct a new function proxy.
     *
     * @param  mixed  $proxy
     */
    public function __construct($proxy)
    {
        $this->proxy = $proxy;
    }

    /**
     * Calls any existing method on the `$proxy` and return `$proxy`.
     *
     * @return mixed|null
     */
    public function __call($method, $args)
    {
        if (method_exists($this->proxy, $method)) {
            $this->proxy->{$method}(...$args);

            return $this->proxy;
        }
    }
}
