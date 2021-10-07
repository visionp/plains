<?php
namespace Plains;

use Plains\Specifications\SpecificationInterface;

class Plain implements PlainInterface
{

    public function __construct(
        public string $name,
        protected SpecificationInterface $specification
    ){}

    public function getName(): string
    {
        return $this->name;
    }

    public function can(ConditionsBag $airportParams): bool
    {
        return $this->specification->isSatisfiedBy($airportParams);
    }
}
