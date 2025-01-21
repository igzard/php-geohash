<?php

declare(strict_types=1);

use Igzard\PhpSkeleton\Example;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testHello(): void
    {
        $example = new Example();
        $this->assertEquals('World', $example->hello());
    }
}