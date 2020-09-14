<?php

namespace Schruptor\LaravelExpectation;

use Schruptor\Expectation\Expectation as DefaultExpectation;

function expect($expected) : DefaultExpectation
{
    return Expectation::isThat($expected);
}