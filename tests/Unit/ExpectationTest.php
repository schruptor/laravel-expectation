<?php
namespace Schruptor\LaravelExpectation\Tests;

use Schruptor\Expectation\Expectation;
use Schruptor\Expectation\StringExpectation;
use function Schruptor\LaravelExpectation\expect;

beforeEach(function () {
    $this->string = 'Testing';
    $this->word = 'Test';
    $this->integer = 1;
    $this->float = 0.0000001;
    $this->array = ['a' => 'A', 'b' => 'B', 'c' => 'C'];
    $this->bool = true;
    $this->callable = function () { return true; };
    $this->object = (object) array('value' => true);
    $this->empty = '';
    $this->null = null;
    $this->dir = __DIR__;
    $this->file = $this->dir . '/ExpectationTest.php';
});

it('asserts that an collection return the CollectionExpectation', function () {
    assertTrue(Expectation::isThat($this->string) instanceof StringExpectation);
});

it('can access the parents class functions', function () {
    assertTrue(Expectation::isThat($this->integer)->isInt()->resolve());
    assertTrue(Expectation::isThat($this->string)->isString()->isLongerThan(5)->resolve());
});