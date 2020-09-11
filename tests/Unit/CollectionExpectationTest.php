<?php
namespace Schruptor\LaravelExpectation\Tests;

use Schruptor\LaravelExpectation\Expectation;
use Schruptor\LaravelExpectation\CollectionExpectation;
use function Schruptor\LaravelExpectation\expect;

beforeEach(function () {
    $this->collection = collect(['a' => 'A', 'b' => 'B', 'c' => 'C']);
    $this->array = ['a' => 'A', 'b' => 'B', 'c' => 'C'];
    $this->emptyCollection = collect([]);
});

it('asserts that an collection return the CollectionExpectation', function () {
    assertTrue(expect($this->collection) instanceof CollectionExpectation);
});

it('asserts that an collection can be empty', function () {
    assertTrue(Expectation::isThat($this->emptyCollection)->isEmpty()->resolve());
    assertFalse(Expectation::isThat($this->collection)->isEmpty()->resolve());
});

it('asserts that an collection can have a specific key', function () {
    assertTrue(Expectation::isThat($this->collection)->hasKey('a')->resolve());
});

it('asserts that an collection can have a specific value', function () {
    assertTrue(Expectation::isThat($this->collection)->hasValue('A')->resolve());
});

it('asserts that an array can be counted', function () {
    assertFalse(Expectation::isThat($this->collection)->hasCount(2)->resolve());
    assertTrue(Expectation::isThat($this->collection)->hasCount(3)->resolve());
});

it('asserts that an array can be counted and count is less than', function () {
    assertFalse(Expectation::isThat($this->collection)->hasCountLessThan(1)->resolve());
    assertTrue(Expectation::isThat($this->collection)->hasCountLessThan(4)->resolve());
});

it('asserts that an array can be counted and count is less than or equal', function () {
    assertFalse(Expectation::isThat($this->collection)->hasCountLessOrEqualThan(1)->resolve());
    assertTrue(Expectation::isThat($this->collection)->hasCountLessOrEqualThan(3)->resolve());
    assertTrue(Expectation::isThat($this->collection)->hasCountLessOrEqualThan(4)->resolve());
});

it('asserts that an array can be counted and count is greater than', function () {
    assertFalse(Expectation::isThat($this->collection)->hasCountGreaterThan(4)->resolve());
    assertTrue(Expectation::isThat($this->collection)->hasCountGreaterThan(1)->resolve());
});

it('asserts that an array can be counted and count is greater than or equal', function () {
    assertFalse(Expectation::isThat($this->collection)->hasCountGreaterOrEqualThan(4)->resolve());
    assertTrue(Expectation::isThat($this->collection)->hasCountGreaterOrEqualThan(3)->resolve());
    assertTrue(Expectation::isThat($this->collection)->hasCountGreaterOrEqualThan(1)->resolve());
});

it('asserts that array can be checked for a specific key', function (){
    assertTrue(
        Expectation::isThat($this->collection)
            ->hasKey('a')
            ->resolve()
    );
    assertFalse(
        Expectation::isThat($this->collection)
            ->hasKey('z')
            ->resolve()
    );
});

it('asserts that array can be checked for specific keys', function (){
    assertTrue(
        Expectation::isThat($this->collection)
            ->hasKeys(['a', 'b', 'c'])
            ->resolve()
    );
    assertFalse(
        Expectation::isThat($this->collection)
            ->hasKeys(['z', 'x', 'y'])
            ->resolve()
    );
});

it('asserts that array can be checked for a specific value', function (){
    assertTrue(
        Expectation::isThat($this->collection)
            ->hasValue('B')
            ->resolve()
    );
    assertFalse(
        Expectation::isThat($this->collection)
            ->hasValue('X')
            ->resolve()
    );
});

it('asserts that array can be checked for specific values', function (){
    assertTrue(
        Expectation::isThat($this->collection)
            ->hasValues(['A', 'B', 'C'])
            ->resolve()
    );
    assertFalse(
        Expectation::isThat($this->collection)
            ->hasValues(['Z', 'X', 'Y'])
            ->resolve()
    );
});

it('asserts that an array is exactly the same', function (){
    assertTrue(
        Expectation::isThat($this->collection)
            ->is(collect($this->array))
            ->resolve()
    );
    assertFalse(
        Expectation::isThat($this->collection)
            ->is(collect(['a' => 'b']))
            ->resolve()
    );
});

it('asserts that an array is not exactly the same', function (){
    assertTrue(
        Expectation::isThat($this->collection)
            ->isNot(collect(['a' => 'b']))
            ->resolve()
    );
    assertFalse(
        Expectation::isThat($this->collection)
            ->isNot(collect($this->array))
            ->resolve()
    );
});