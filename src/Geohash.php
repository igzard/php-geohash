<?php

declare(strict_types=1);

namespace Igzard\Geohash;

use Igzard\Geohash\Domain\GeohashCalculator;

final class Geohash
{
    private function __construct()
    {
    }

    protected function __clone()
    {
    }

    /**
     * Generate geohash from latitude and longitude.
     * You can customize the precision, longitude and latitude intervals in config.
     *
     * @param float $latitude  Latitude
     * @param float $longitude Longitude
     * @param array $config    ['precision' => 12, 'longitude_interval' => [-180.0, 180.0], 'latitude_interval' => [-90.0, 90.0]]
     *
     * @return string Geohash
     */
    public static function generate(float $latitude, float $longitude, array $config = []): string
    {
        $precision = $config['precision'] ?? 12;
        $longitudeInterval = $config['longitude_interval'] ?? [-180.0, 180.0];
        $latitudeInterval = $config['latitude_interval'] ?? [-90.0, 90.0];

        return (new GeohashCalculator())
            ->withLongitudeInterval($longitudeInterval[0], $longitudeInterval[1])
            ->withLatitudeInterval($latitudeInterval[0], $latitudeInterval[1])
            ->withPrecision($precision)
            ->calculate($latitude, $longitude);
    }
}
