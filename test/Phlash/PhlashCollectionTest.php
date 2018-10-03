<?php

namespace Phlash\Tests;

use function Phlash\collect;

class PhlashCollectionTest extends TestCase {
    /**
     * @return void
     */
    public function testItWorks()
    {
        $this->assertTrue(is_array(collect()));
    }
}
