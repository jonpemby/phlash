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
}
