<?php

declare(strict_types=1);

use Igzard\Geohash\Geohash;
use PHPUnit\Framework\TestCase;

class GeohashTest extends TestCase
{
    /**
     * @dataProvider locationDataProvider
     */
    public function testAssertWithDefaultData(float $latitude, float $longitude, string $expected): void
    {
        $this->assertEquals(
            $expected,
            Geohash::generate($latitude, $longitude)
        );
    }

    public function locationDataProvider(): array
    {
        return [
            'case 1# Budapest' => [
                'latitude' => 47.497913,
                'longitude' => 19.040236,
                'expected' => 'u2mw1q8xmssz',
            ],
            'case 2# New York' => [
                'longitude' => 40.730610,
                'latitude' => -73.935242,
                'expected' => 'dr5rtwccpbpb',
            ],
            'case 2# Moscow' => [
                'longitude' => 55.751244,
                'latitude' => 37.618423,
                'expected' => 'ucfv0j0ysc1k',
            ],
        ];
    }
}