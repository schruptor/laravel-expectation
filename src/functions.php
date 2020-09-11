<?php

namespace Schruptor\LaravelExpectation;

use Schruptor\LaravelExpectation\Expectation;

function expect($expected) : Expectation
{
    return Expectation::isThat($expected);
}