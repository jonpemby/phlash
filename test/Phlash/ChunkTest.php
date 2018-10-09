<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\chunk;

class ChunkTest extends TestCase
{
    public function testChunkArr()
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

    public function testChunkFunction()
    {
        $array = [1, 2, 3, 4, 5, 6];

        $chunks = chunk($array, 2);

        $this->assertCount(3, $chunks);

        $this->assertCount(2, $chunks[0]);
        $this->assertContains(1, $chunks[0]);
        $this->assertContains(2, $chunks[0]);


        $this->assertCount(2, $chunks[1]);
        $this->assertContains(3, $chunks[1]);
        $this->assertContains(4, $chunks[1]);

        $this->assertCount(2, $chunks[2]);
        $this->assertContains(5, $chunks[2]);
        $this->assertContains(6, $chunks[2]);
    }
}
