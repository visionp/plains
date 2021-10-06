<?php

namespace Plains\Specifications;


use Plains\ConditionsBag;

class DayTimeSpecification extends Specification
{

    public function __construct(
        private string $daytime
    ){}

    public function isSatisfiedBy(ConditionsBag $item): bool
    {
        if ($this->daytime === ConditionsBag::ANY) {
            return true;
        }
        return $item->getDaytime() === $this->daytime;
    }
}
