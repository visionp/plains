<?php

namespace Plains;


class Hangar
{
    /**
     * @var PlainInterface[]
     */
    private array $plains = [];

    public function addPlain(PlainInterface $plain)
    {
        $this->plains[] = $plain;
    }

    public function getCountPlains(): array
    {
        $result = [];

        foreach ($this->plains as $plain) {
            $name = $plain->getName();
            if (!isset($result[$name])) {
                $result[$name] = 1;
                continue;
            }
            $result[$name]++;
        }

        return $result;
    }
}
