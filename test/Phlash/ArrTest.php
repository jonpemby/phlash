<?php

namespace Phlash\Tests;

use Phlash\Arr;

class ArrTest extends TestCase
{
    public function testNewArr()
    {
        $array = new Arr();

        $this->assertCount(0, $array);
    }

    public function testDropWhile()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $dropped = $array->dropWhile(function ($n) {
            return $n < 4;
        });

        $this->assertCount(3, $dropped);

        $this->assertContains(4, $dropped);
        $this->assertContains(5, $dropped);
        $this->assertContains(6, $dropped);
    }

    public function testArrDropWhileDoesNotInfiniteLoopOrError()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $dropped = $array->dropWhile(function ($v) {
            return true;
        });

        $this->assertSame([], $dropped->value());
    }

    public function testDropRightWhile()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $dropped = $array->dropRightWhile(function ($n) {
            return $n > 3;
        });

        $this->assertCount(3, $dropped);

        $this->assertContains(1, $dropped);
        $this->assertContains(2, $dropped);
        $this->assertContains(3, $dropped);
    }

    public function testArrDropRightWhileDoesNotInfiniteLoopOrError()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $dropped = $array->dropRightWhile(function ($v) {
            return true;
        });

        $this->assertSame([], $dropped->value());
    }

    public function testFill()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $filled = $array->fill(null, 3);

        $this->assertCount(6, $filled);

        $this->assertEquals(1, $filled->at(0));
        $this->assertEquals(2, $filled->at(1));
        $this->assertEquals(3, $filled->at(2));

        $this->assertNull($filled->at(3));
        $this->assertNull($filled->at(4));
        $this->assertNull($filled->at(5));
    }

    public function testFind()
    {
        $array = new Arr([1, 2, 3, 7, 4, 5, 6]);

        $found = $array->find(function ($v) {
            return $v === 7;
        });

        $this->assertEquals(7, $found);
    }

    public function testFindIndex()
    {
        $array = new Arr([1, 2, 3, 7, 4, 5, 6]);

        $found = $array->findIndex(function ($v) {
            return $v === 7;
        });

        $this->assertEquals(3, $found);
    }

    /**
     * @expectedException  Phlash\NotFoundException
     */
    public function testFindOrFail()
    {
        $array = new Arr([1, 2, 3, 4, 5]);

        $array->findOrFail(function ($v) {
            return $v === 6;
        });
    }

    public function testFindOrDefault()
    {
        $array = new Arr(['foo' => 1], ['foo' => 2], ['bar' => 3]);

        $found = $array->findOrDefault(['bar' => 1], function ($v) {
            if (isset($v['bar']) && $v['bar'] < 3)
                return true;

            return false;
        });

        $this->assertSame(['bar' => 1], $found);
    }

    public function testFindLastIndex()
    {
        $array = new Arr([1, 2, 3, 7, 4, 5, 7, 6]);

        $found = $array->findLastIndex(function ($v) {
            return $v === 7;
        });

        $this->assertEquals(6, $found);
    }

    public function testFirst()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertEquals(1, $array->first());
        $this->assertEquals(1, $array->head()); // @alias
    }

    public function testFlatten()
    {
        $array = new Arr([1, [2, 3, 4], 5, 6]);

        $this->assertSame(
            [1, 2, 3, 4, 5, 6],
            $array->flatten()->value()
        );
    }

    public function testFlattenDeep()
    {
        $array = new Arr([1, [2, [3, [4, [5, [6]]]]]]);


        $this->assertSame(
            [1, 2, 3, 4, 5, 6],
            $array->flattenDeep()->value()
        );
    }

    public function testFrom()
    {
        $array = Arr::from([1, 2, 3, 4, 5, 6]);

        $other = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertSame($other->value(), $array->value());
    }

    public function testIndex()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertEquals(2, $array->index(3));
    }

    public function testInitial()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertSame([1, 2, 3, 4, 5], $array->initial()->value());
    }

    public function testLast()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertEquals(6, $array->last());
        $this->assertEquals(6, $array->tail());
    }

    public function testMap()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertSame(
            [2, 4, 6, 8, 10, 12],
            $array->map(function ($n) {
                return 2 * $n;
            })->value()
        );
    }

    public function testMapReduce()
    {
        $array = new Arr([
            ['foo' => 2],
            ['foo' => 4],
            ['foo' => 6],
            ['foo' => 8],
            ['foo' => 10],
        ]);

        $this->assertEquals(30, $array->mapReduce('foo', function ($value, $carry) {
            return $value + $carry;
        }));
    }

    public function testMergeSort()
    {
        $arr = new Arr([5, 2, 1, 4, 3, 7, 8, 10, 9, 6]);

        $this->assertSame(
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            $arr->mergeSort(function ($a, $b) {
                return $a <=> $b;
            })->value()
        );
    }

    public function testMergeSortWithDuplicates()
    {
        $arr = new Arr([1, 5, 2, 3, 2, 5, 1, 1, 4, 5]);

        $this->assertSame(
            [1, 1, 1, 2, 2, 3, 4, 5, 5, 5],
            $arr->mergeSort(function ($a, $b) {
                return $a <=> $b;
            })->value()
        );
    }

    public function testReduce()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertEquals(21, $array->reduce(function ($value, $carry) {
            return $value + $carry;
        }));

        $this->assertEquals(25, $array->reduce(4, function ($value, $carry) {
            return $value + $carry;
        }));
    }

    public function testReverse()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertSame([6, 5, 4, 3, 2, 1], $array->reverse()->value());
    }

    public function testSlice()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertSame([1, 2, 3], $array->slice(0, 3)->value());
        $this->assertSame([2, 3, 4, 5], $array->slice(1, 5)->value());
        $this->assertSame([4, 5, 6], $array->slice(3)->value());
    }

    public function testUnique()
    {
        $array = new Arr([1, 2, 5, 4, 2, 3, 4, 5, 6, 1]);

        $this->assertSame([1, 2, 5, 4, 3, 6], $array->unique()->value());
    }
}

