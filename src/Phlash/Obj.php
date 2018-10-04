<?php

namespace Phlash;

use Phlash\Support\AbstractCollection;

class Obj extends AbstractCollection
{
    /**
     * @var array  Internal representation of Obj's properties
     */
    protected $value;

    /**
     * @constructor
     * @param  mixed $value
     */
    public function __construct($value = [])
    {
        if (is_object($value)) {
            $this->value = (array) $value;
        } else {
            $this->value = $value;
        }
    }

    /**
     * @return Obj
     */
    public static function stub()
    {
        return new Obj([]);
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

        return new Obj($props);
    }
}
