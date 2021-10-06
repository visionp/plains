<?php
namespace Plains;


interface PlainInterface
{
    public function getName(): string;
    public function can(ConditionsBag $airportParams): bool;
}
