<?php

namespace Plains;


class ConditionsBag
{
    const FLY = 'fly';
    const TAKE_OFF = 'take_off';
    const LAND = 'land';
    const WATER = 'water';
    const Runway = 'runway';
    const GOOD = 'good';
    const ANY = 'any';
    const DAY = 'day';

    private ?string $weather = null;
    private ?string $typeRunway = null;
    private ?string $daytime = null;
    private ?string $action = null;

    /**
     * @param string $weather
     */
    public function setWeather(string $weather): void
    {
        $this->weather = $weather;
    }

    /**
     * @param string $typeRunway
     */
    public function setTypeRunway(string $typeRunway): void
    {
        $this->typeRunway = $typeRunway;
    }

    /**
     * @param string $daytime
     */
    public function setDaytime(string $daytime): void
    {
        $this->daytime = $daytime;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    public function getWeather(): ?string
    {
        return $this->weather;
    }

    public function getTypeRunway(): ?string
    {
        return $this->typeRunway;
    }

    public function getDaytime(): ?string
    {
        return $this->daytime;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }
}
