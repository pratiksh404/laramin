<?php

namespace Pratiksh\Laramin\Tests;

use Orchestra\Testbench\TestCase;
use Pratiksh\Laramin\LaraminServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaraminServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
