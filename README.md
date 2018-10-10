![Phlash](./img/phlash_logo@2x.png)

[![Build Status](https://travis-ci.org/jonpemby/phlash.svg?branch=master)](https://travis-ci.org/jonpemby/phlash)

A lodash inspired library of helper functions for PHP.

## Fits Into Your Existing Code

Phlash is meant to be a helpful addition to your code. Phlash adheres directly to your coding style with the help of PHP's dynamic `__call` method. Phlash automatically checks for a function signature matching the one you called for a myriad of styles. While Phlash is written in the `camelCased` style, it will work with any style.

For example:

```php
$collection = phlash([1, 2, 3, 4, 5, 6])->dropRight(3);  // [1, 2, 3]
$collection = phlash([1, 2, 3, 4, 5, 6])->drop_right(3); // [1, 2, 3]
$collection = phlash([1, 2, 3, 4, 5, 6])->DropRight(3);  // [1, 2, 3]
```

Will all work!

## Object Oriented With Functional Support

Phlash supports a variety of paradigms but most importantly the OO and functional paradigms. Methods can easily be chained from a new object. If you would rather call a function without having to deal with an object you can!

For example:

```php
Phlash\Arr::from()->fill(null, 0, 3);
// [null, null, null]

phlash([])->fill(null, 0, 3);
// [null, null, null]

fill([], null, 0, 3);
// [null, null, null]
```

While under the hood Phlash uses objects, Phlash supports your favorite paradigm as best it can.

## Higher Order Property Accessors

Phlash supports higher order property accessors for collections. For example:

```php
$array = phlash([
    ['foo' => 1],
    ['foo' => 2],
    ['foo' => 3],
    ['foo' => 4],
    ['foo' => 5],
    ['foo' => 6],
]);

$array->foo;
// [1, 2, 3, 4, 5, 6]
```

And yes, this method is chainable to other methods of the same collection. This makes it so much easier to map collections of objects to properties without having to write a map function to handle it for you.

## Thanks

* Nan Pemberton for supporting my dream to become a programmer and for being by my side no matter what!
* Taylor Otwell for writing Laravel and inspiring me to be awesome
* You for reading this and showing interest in Phlash. Even if you don't use Phlash, writing PHP keeps the project alive! Thanks for being awesome.
