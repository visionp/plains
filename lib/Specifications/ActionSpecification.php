<?php

namespace Plains\Specifications;


use Plains\ConditionsBag;

class ActionSpecification extends Specification
{

    public function __construct(
        private string $action
    ){}

    public function isSatisfiedBy(ConditionsBag $item): bool
    {
        return $this->action === $item->getAction();
    }
}
