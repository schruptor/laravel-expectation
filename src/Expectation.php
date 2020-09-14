<?php

namespace Schruptor\LaravelExpectation;

use Illuminate\Support\Collection;
use Schruptor\Expectation\ArrayExpectation;
use Schruptor\Expectation\StringExpectation;
use Schruptor\Expectation\NumericExpectation;

class Expectation extends \Schruptor\Expectation\Expectation
{
    protected $expected;
    protected $result = null;

    protected $translationClass = Translator::class;

    protected function __construct($expected)
    {
        $this->expected = $expected;
    }

    /**
     * @param $expected
     * @return self|ArrayExpectation|StringExpectation|NumericExpectation|CollectionExpectation
     */
    public static function isThat($expected)
    {
        if ($expected instanceof Collection) {
            return new CollectionExpectation($expected);
        }

        if (is_array($expected)) {
            return new ArrayExpectation($expected);
        }

        if (is_string($expected)) {
            return new StringExpectation($expected);
        }

        if (is_numeric($expected)) {
            return new NumericExpectation($expected);
        }

        return new self($expected);
    }

    public function __call($name, $arguments)
    {
        $translator = new $this->translationClass;

        dd($translator);

    }
}