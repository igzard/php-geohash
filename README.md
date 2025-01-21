# php-geohash

🌐 **Geohash** calculation in PHP

<p align="left">
    <p align="left">
        <a href="https://github.com/igzard/php-geohash/actions/workflows/tests.yml"><img src="https://img.shields.io/github/actions/workflow/status/igzard/php-geohash/tests.yml?label=tests&style=flat-square" alt="Tests passed"></a>
        <a href="https://packagist.org/packages/igzard/php-geohash"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/igzard/php-geohash"></a>
        <a href="https://packagist.org/packages/igzard/php-geohash"><img alt="Latest Version" src="https://img.shields.io/packagist/v/igzard/php-geohash"></a>
    </p>
</p>

The **PHP Geohash Generator** is a simple yet powerful tool that converts geographic coordinates (latitude and longitude) into a compact and highly useful **geohash** string. Perfect for efficiently storing, searching, and managing spatial data in your applications! 🚀

---

## What is a Geohash? 🤔

A geohash is an algorithm that divides the Earth into progressively smaller "boxes" and encodes the coordinates as a text string.

- **In short:** A geohash is a single string representation of a specific location on Earth.
- **Benefits:**
    - Compact and human-readable format.
    - Easy to compare: if two locations are close, their geohashes share the same prefix.
    - Ideal for fast searches and spatial grouping.

---

## Why use this library? 🎯

- **Easy to use**: Simply provide latitude and longitude, and get a geohash in return.
- **Precision-focused**: The algorithm supports up to 12-character geohashes for highly accurate encoding.
- **Perfect for location-based applications**: Whether storing spatial data, searching for locations, or displaying maps, this tool gets the job done efficiently.

---

------

## Installation & Usage 🛠️

> **Requires [PHP 8.3+](https://php.net/releases/)**

```bash
composer require igzard/php-geohash
```

```php
use Igzard\Geohash\Geohash;

// Generate a geohash for a specific location with latitude and longitude coordinates.
echo Geohash::generate(47.497913, 19.040236); // input: Budapest coordinates | output: u2mw1q8xmssz

// Generate a geohash with custom precision (default is 12), latitude interval, and longitude interval.
echo Geohash::generate(47.497913, 19.040236, [
    'precision' => 10,
    'latitude_interval' => [
        'min' => -70,
        'max' => 10,
    ],
    'longitude_interval' => [
        'min' => -80,
        'max' => 170,
    ],
]);
```

## Contributing 🤝

Thank you for considering contributing to the **Geohash PHP** library! 🎉
Here is some tooling to help you get started:

✅ Run **Code quality** check:
```bash
make code-quality
```

👷 Run **PHPUnit** tests:
```bash
make phpunit
```

🎨 Run **php-cs-fixer**:
```bash
make php-cs-fixer
```

🔥 Run **phpstan**:
```bash
make phpstan
```

🚀 Install dependencies with **composer**:
```bash
make composer-install
```

**Geohash PHP** was created by **[Gergely Ignácz](https://x.com/igz4rd)** under the **[MIT license](https://opensource.org/licenses/MIT)**.