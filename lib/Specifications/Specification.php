<?php

namespace Plains\Specifications;


use Plains\ConditionsBag;

abstract class Specification implements SpecificationInterface
{
    abstract public function isSatisfiedBy(ConditionsBag $item): bool;
}
