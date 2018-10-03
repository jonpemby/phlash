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

    public function testArrAt()
    {
        $array = new Arr([1, 2, 3]);

        $this->assertEquals(1, $array->at(0));
        $this->assertEquals(2, $array->at(1));
        $this->assertEquals(3, $array->at(2));
    }

    public function testArrChunk()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $chunks = $array->chunk(2);

        $this->assertCount(3, $chunks);

        $this->assertCount(2, $chunks->at(0));
        $this->assertContains(1, $chunks->at(0));
        $this->assertContains(2, $chunks->at(0));

        $this->assertCount(2, $chunks->at(1));
        $this->assertContains(3, $chunks->at(1));
        $this->assertContains(4, $chunks->at(1));

        $this->assertCount(2, $chunks->at(2));
        $this->assertContains(5, $chunks->at(2));
        $this->assertContains(6, $chunks->at(2));
    }

    public function testArrChunkDoesNotOverflow()
    {
        $array = new Arr([1, 2, 3, 4, 5]);

        $chunks = $array->chunk(2);

        $this->assertCount(3, $chunks);

        $subchunk = $chunks->at(2);

        $this->assertCount(1, $subchunk);
    }

    public function testArrDifference()
    {
        $array = new Arr([1, 2]);

        $other = [2, 3];

        $this->assertContains(1, $array->difference($other));
    }

    public function testArrDifferenceBy()
    {
        $array = new Arr([1.2, 2.2]);

        $other = [2.5, 3.1];

        $this->assertContains(1.2, $array->differenceBy($other, function ($value) {
            return floor($value);
        }));
    }

    public function testArrDifferenceWith()
    {
        $array = new Arr([['a' => 1, 'b' => 2], ['a' => 2, 'b' => 1]]);

        $other = [['a' => 1, 'b' => 2]];

        $this->assertContains(['a' => 2, 'b' => 1], $array->differenceWith($other, function ($value, $otherValue) {
            return $value['a'] === $otherValue['a'] && $value['b'] === $otherValue['b'];
        }));
    }

    public function testArrDrop()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $dropped = $array->drop(3);

        $this->assertCount(3, $dropped);

        $this->assertContains(4, $dropped);
        $this->assertContains(5, $dropped);
        $this->assertContains(6, $dropped);
    }

    public function testDropRight()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $dropped = $array->dropRight(3);

        $this->assertCount(3, $dropped);

        $this->assertContains(1, $dropped);
        $this->assertContains(2, $dropped);
        $this->assertContains(3, $dropped);
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
}
