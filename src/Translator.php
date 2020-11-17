<?php

namespace Schruptor\LaravelExpectation;

class Translator extends \Schruptor\Expectation\Translator
{
    public $collectionLookup = [
        'CollectionExpectation' => [
        ],
    ];

    public function __construct()
    {
        $this->collectionLookup['Expectation'] = $this->lookup['Expectation'];
    }

    public function getLookup(string $name = null) : array
    {
        if ($name && key_exists($name, $this->lookup)) {
            array_merge(
                $this->lookup[$name],
                $this->collectionLookup
            );
        }

        return array_merge(
            $this->lookup,
            $this->collectionLookup
        );
    }
}