<?php

namespace Phlash;

use ReflectionObject;

class Obj extends AbstractCollection
{
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
     * Assume the identity of the passed $obj.
     *
     * @param  object|array  $obj
     * @return Obj
     */
    public static function as($obj)
    {
        return new Obj($obj);
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
     * Create an object with the inverted properties.
     *
     * @return Obj
     */
    public function invert()
    {
        $arr = [];

        foreach ($this->value as $key => $value) {
            $arr[$value] = $key;
        }

        return $this->from($arr);
    }

    /**
     * Return a collection of the object's keys.
     *
     * @return Arr
     */
    public function keys()
    {
        $arr = [];

        foreach ($this->value as $key => $_v) {
            $arr[] = $key;
        }

        return new Arr($arr);
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
     * Get an array of the method names of this Obj.
     *
     * @return Arr
     */
    public function methods()
    {
        $reflected = is_null($this->proxy) ? null : new ReflectionObject($this->proxy);

        if (! $reflected)
            return Arr::from([]);

        return Arr::from($reflected->getMethods())->map(function ($method) {
            return $method->name;
        });
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
     * The same as `get` except if the $prop matches a method it returns the result.
     *
     * @param  string  $prop
     * @return mixed
     */
    public function result($prop)
    {
        if (method_exists($this->proxy, $prop))
            return $this->proxy->{$prop}();

        return $this->value[$prop];
    }

    /**
     * Create a collection of pairs with `[$key, $value]` from the enumerable keys and values of the object.
     *
     * @return Arr
     */
    public function toPairs()
    {
        $arr = [];

        foreach ($this->value as $key => $value) {
            $arr[] = [$key, $value];
        }

        return Arr::from($arr);
    }

    /**
     * @return mixed  Returns the object set as the proxy or the object representation of the Obj.
     */
    public function unwrap()
    {
        return $this->proxy ?: (object) $this->value;
    }    

    /**
     * Get the value wrapped by the Obj.
     *
     * @return mixed
     */
    public function value()
    {
        return $this->unwrap();
    }
}

