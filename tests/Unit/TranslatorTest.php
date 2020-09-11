<?php

use Schruptor\LaravelExpectation\Translator;
use Schruptor\LaravelExpectation\CollectionExpectation;
use function Schruptor\LaravelExpectation\expect;

beforeEach(function () {
    $this->string = 'Testing';
    $this->int = 1;
    $this->bool = true;
    $this->array = ['a' => 'A'];
    $this->collection = collect(['a' => 'A']);
    $this->translator = new Translator;
});

it('can get the translation for collection', function () {
    $arrayTroughClass = $this->translator->get(get_class(expect($this->collection)));

    $arrayThroughVariable = array_merge($this->translator->getLookup()[CollectionExpectation::class], $this->translator->getLookup()['Schruptor\Expectation\Expectation']);

    assertEquals($arrayThroughVariable, $arrayTroughClass);
});