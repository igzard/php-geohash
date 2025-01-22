<?php

declare(strict_types=1);

namespace Igzard\Geohash\Contract;

interface GeohashCalculatorInterface
{
    public function withLatitudeInterval(float $from, float $to): self;

    public function withLongitudeInterval(float $from, float $to): self;

    public function withPrecision(int $precision): self;

    public function calculate(float $latitude, float $longitude): string;
}
