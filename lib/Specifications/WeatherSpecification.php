<?php

namespace Plains\Specifications;


use Plains\ConditionsBag;

class WeatherSpecification extends Specification
{

    public function __construct(
        private string $weather
    ){}

    public function isSatisfiedBy(ConditionsBag $item): bool
    {
        if ($this->weather === ConditionsBag::ANY) {
            return true;
        }
        return $item->getWeather() === $this->weather;
    }
}
