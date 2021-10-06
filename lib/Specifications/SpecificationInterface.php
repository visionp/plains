<?php

namespace Plains\Specifications;


use Plains\ConditionsBag;

interface SpecificationInterface
{
    public function isSatisfiedBy(ConditionsBag $item): bool;
}
