<?php

namespace Schruptor\LaravelExpectation;

class Translator extends \Schruptor\Expectation\Translator
{
    public static $laravelLookup = [
        CollectionExpectation::class => [
        ],
    ];

    public function getLookup()
    {
        return array_merge(static::$lookup, static::$laravelLookup);
    }
}