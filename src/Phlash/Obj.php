<?php

namespace Phlash;

use Phlash\Support\AbstractCollection;

class Obj extends AbstractCollection
{
    /**
     * @var array  Internal representation of Obj's properties
     */
    protected $value = [];

    /**
     * @var object  Proxy on which to call methods
     */
    protected $proxy = null;

    /**
     * @constructor
     * @param  mixed $value
     */
    public function __construct($value = [], $proxy = null)
    {
        $this->value = (array) $value;

        if (is_object($value)) {
            $this->proxy = $value;
        } elseif (is_object($proxy)) {
            $this->proxy = $proxy;
        }
    }

    /**
     * @return Obj
     */
    public static function stub()
    {
        return new Obj();
    }

    /**
     * Assign all of the properties of the argument objects to the Obj
     *
     * @param  array ...$args
     * @return Obj
     */
    public function assign(...$args)
    {
        $props = $this->toArray();

        foreach ($args as $obj) {
            foreach ($obj as $prop => $val) {
                $props[$prop] = $val;
            }
        }

        return $this->from($props);
    }

    /**
     * Given a set of properties, creates a new Obj w/ the same proxy as $this.
     * Also assigns changes to properties to the new proxy for syncing.
     *
     * @param  mixed  Properties to pass to the new object
     * @return Obj
     */
    public function from($props)
    {
        $proxy = $this->proxy;

        if (is_object($proxy)) foreach ($props as $key => $value) {
            $proxy->{$key} = $value;
        }

        return new Obj($props, $proxy);
    }

    /**
     * Map the keys of an Obj given an $iteratee that receives the $key and $value.
     *
     * @param  callable  $iteratee
     * @return Obj
     */
    public function mapKeys(callable $iteratee)
    {
        $arr = [];

        foreach ($this->value as $key => $value) {
            $arr[$iteratee($key, $value)] = $value;
        }

        return $this->from($arr);
    }

    /**
     * Creates a new Obj from the same keys as $this mapped through the $iteratee.
     *
     * @param  callable  $iteratee
     * @return Obj
     */
    public function mapValues(callable $iteratee)
    {
        $arr = [];

        foreach ($this->value as $key => $value) {
            $arr[$key] = $iteratee($key, $value);
        }

        return $this->from($arr);
    }

    /**
     * Creates a new Obj from the properties absent the given $args.
     *
     * @param  mixed ...$args
     * @return Obj
     */
    public function omit(...$args)
    {
        $arr = [];

        $keys = Arr::from($args)->flattenDeep()->value();

        foreach ($this->value as $key => $value) {
            if (! in_array($key, $keys)) $arr[$key] = $value;
        }

        return $this->from($arr);
    }

    /**
     * Creates a new Obj from properties present in the given $args.
     *
     * @param  mixed  ...$args
     * @return Obj
     */
    public function pick(...$args)
    {
        $arr = [];

        $keys = Arr::from($args)->flattenDeep()->value();

        foreach ($this->value as $key => $value) {
            if (in_array($key, $keys)) $arr[$key] = $value;
        }

        return $this->from($arr);
    }

    /**
     * @return mixed  Returns the object set as the proxy or the object representation of the Obj.
     */
    public function unwrap()
    {
        return $this->proxy ?: (object) $this->value;
    }
}
