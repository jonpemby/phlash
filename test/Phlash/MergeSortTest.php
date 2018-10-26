<?php

namespace Phlash\Tests;

use Phlash\Arr;

class MergeSortTest extends TestCase
{
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
}
