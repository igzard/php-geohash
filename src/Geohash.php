<?php

declare(strict_types=1);

namespace Igzard\Geohash;

use Igzard\Geohash\Contract\GeohashCalculatorInterface;
use Igzard\Geohash\Domain\Base32GeohashCalculator;

final class Geohash
{
    private static ?GeohashCalculatorInterface $geohashCalculator = null;

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

        return self::getGeohashCalculator()
            ->withLongitudeInterval($longitudeInterval[0], $longitudeInterval[1])
            ->withLatitudeInterval($latitudeInterval[0], $latitudeInterval[1])
            ->withPrecision($precision)
            ->calculate($latitude, $longitude);
    }

    /**
     * Set the calculator instance.
     *
     * @param GeohashCalculatorInterface $geohashCalculator Calculator instance
     */
    public static function setGeohashCalculator(GeohashCalculatorInterface $geohashCalculator): void
    {
        self::$geohashCalculator = $geohashCalculator !== self::$geohashCalculator ? $geohashCalculator : self::$geohashCalculator;
    }

    /**
     * Returns the calculator instance.
     */
    private static function getGeohashCalculator(): GeohashCalculatorInterface
    {
        if (null === self::$geohashCalculator) {
            self::$geohashCalculator = new Base32GeohashCalculator();
        }

        return self::$geohashCalculator;
    }
}
