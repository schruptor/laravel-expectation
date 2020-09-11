<?php

namespace Schruptor\LaravelExpectation;

use Illuminate\Support\Collection;

class CollectionExpectation extends Expectation
{
    public function is($check)
    {
        $this->setResult($this->expected->toArray() == $check->toArray());

        return $this;
    }

    public function isEmpty()
    {
        $this->setResult($this->expected->isEmpty());

        return $this;
    }

    public function hasCount(int $count)
    {
        $this->setResult($this->expected->count() === $count);

        return $this;
    }

    public function hasCountGreaterThan(int $count)
    {
        $this->setResult($this->expected->count() > $count);

        return $this;
    }

    public function hasCountGreaterOrEqualThan(int $count)
    {
        $this->setResult($this->expected->count() >= $count);

        return $this;
    }

    public function hasCountLessThan(int $count)
    {
        $this->setResult($this->expected->count() < $count);

        return $this;
    }

    public function hasCountLessOrEqualThan(int $count)
    {
        $this->setResult($this->expected->count() <= $count);

        return $this;
    }

    public function hasValue($value)
    {
        $this->setResult($this->expected->values()->filter(function($collectionValue) use ($value){ return $value == $collectionValue;})->count() == 1);

        return $this;
    }

    public function hasValues(Array $values)
    {
        foreach ($values as $value){
            $this->hasValue($value);
        }

        return $this;
    }

    public function hasKey($key)
    {
        $this->setResult($this->expected->keys()->filter(function($collectionKey) use ($key){ return $key == $collectionKey;})->count() == 1);

        return $this;
    }

    public function hasKeys(Array $keys)
    {
        foreach ($keys as $key){
            $this->hasKey($key);
        }

        return $this;
    }
}