<?php

declare(strict_types=1);

namespace Igzard\Geohash\Domain;

/**
 * @internal
 */
final class GeohashCalculator
{
    private const string BASE32 = '0123456789bcdefghjkmnpqrstuvwxyz';

    private array $latitudeInterval = [-90.0, 90.0];
    private array $longitudeInterval = [-180.0, 180.0];
    private int $precision = 12;

    public function withLatitudeInterval(float $from, float $to): self
    {
        $this->latitudeInterval = [$from, $to];

        return $this;
    }

    public function withLongitudeInterval(float $from, float $to): self
    {
        $this->longitudeInterval = [$from, $to];

        return $this;
    }

    public function withPrecision(int $precision): self
    {
        $this->precision = $precision;

        return $this;
    }

    /**
     * Calculate geohash from latitude and longitude with precision.
     *
     * @param float $latitude  Latitude
     * @param float $longitude Longitude
     *
     * @return string Geohash
     */
    public function calculate(float $latitude, float $longitude): string
    {
        $result = '';

        $isEven = true;
        $bit = 0;
        $ch = 0;

        while (\strlen($result) < $this->precision) {
            if ($isEven) {
                $this->refineInterval($this->longitudeInterval, $longitude, $ch, $bit);
            } else {
                $this->refineInterval($this->latitudeInterval, $latitude, $ch, $bit);
            }

            $isEven = !$isEven;

            if ($bit < 4) {
                ++$bit;
            } else {
                $result .= self::BASE32[$ch];
                $bit = 0;
                $ch = 0;
            }
        }

        return $result;
    }

    /**
     * Refine interval.
     *
     * @param array $interval Interval
     * @param float $value    Value
     * @param int   $ch       Ch
     * @param int   $bit      Bit
     */
    private function refineInterval(array &$interval, float $value, int &$ch, int $bit): void
    {
        $mid = ($interval[0] + $interval[1]) / 2;

        if ($value > $mid) {
            $ch |= (1 << (4 - $bit));
            $interval[0] = $mid;
        } else {
            $interval[1] = $mid;
        }
    }
}
