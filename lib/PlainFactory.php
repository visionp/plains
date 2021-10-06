<?php
namespace Plains;


use Plains\Specifications\ActionSpecification;
use Plains\Specifications\AndSpecification;
use Plains\Specifications\DayTimeSpecification;
use Plains\Specifications\OrSpecification;
use Plains\Specifications\SpecificationInterface;
use Plains\Specifications\TypeRunwaySpecification;
use Plains\Specifications\WeatherSpecification;

class PlainFactory
{

    public static function buildAeropraktA24(): PlainInterface
    {
        $specification = new OrSpecification(
            self::getSpecificationCanTakeoffLandOnRunway(),
            self::getSpecificationCanTakeoffLandOnWater(),
            self::getSpecificationCanFlyDayTimeGoodWeather(),
        );

        return new Plain('AeropraktA24', $specification);
    }

    public static function buildBoeing747(): PlainInterface
    {
        $specification = new OrSpecification(
            self::getSpecificationCanTakeoffLandOnRunway(),
            self::getSpecificationCanFlyAnyTimeAnyWeather(),
        );

        return new Plain('Boeing747', $specification);
    }

    public static function buildCurtissNc4(): PlainInterface
    {
        $specification = new OrSpecification(
            self::getSpecificationCanTakeoffLandOnWater(),
            self::getSpecificationCanFlyDayTimeGoodWeather(),
        );

        return new Plain('CurtissNC4', $specification);
    }

    protected static function getSpecificationCanTakeoffLandOnRunway(): SpecificationInterface
    {
        $specification = new OrSpecification(
            new ActionSpecification(ConditionsBag::LAND),
            new ActionSpecification(ConditionsBag::TAKE_OFF)
        );

        return new AndSpecification(
            $specification,
            new TypeRunwaySpecification(ConditionsBag::Runway)
        );
    }

    protected static function getSpecificationCanTakeoffLandOnWater(): SpecificationInterface
    {
        $specification = new OrSpecification(
            new ActionSpecification(ConditionsBag::LAND),
            new ActionSpecification(ConditionsBag::TAKE_OFF)
        );

        return new AndSpecification(
            $specification,
            new TypeRunwaySpecification(ConditionsBag::WATER)
        );
    }

    protected static function getSpecificationCanFlyDayTimeGoodWeather(): SpecificationInterface
    {
        return new AndSpecification(
            new ActionSpecification(ConditionsBag::FLY),
            new DayTimeSpecification(ConditionsBag::DAY),
            new WeatherSpecification(ConditionsBag::GOOD)
        );
    }

    protected static function getSpecificationCanFlyAnyTimeAnyWeather(): SpecificationInterface
    {
        return new AndSpecification(
            new ActionSpecification(ConditionsBag::TAKE_OFF),
            new DayTimeSpecification(ConditionsBag::ANY),
            new WeatherSpecification(ConditionsBag::ANY),
        );
    }
}
