<?php

namespace Plains\Specifications;


use Plains\ConditionsBag;

class TypeRunwaySpecification extends Specification
{

    public function __construct(
        private string $typeRunway
    ){}

    public function isSatisfiedBy(ConditionsBag $item): bool
    {
        return $item->getTypeRunway() === $this->typeRunway;
    }
}
