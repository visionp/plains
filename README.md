Example:

```
use Plains\ConditionsBag;
use Plains\Plain;
use Plains\Specifications\ActionSpecification;
use Plains\Specifications\AndSpecification;
use Plains\Specifications\DayTimeSpecification;
use Plains\Specifications\OrSpecification;
use Plains\Specifications\TypeRunwaySpecification;
use Plains\Specifications\WeatherSpecification;

$specificationCanTakeoffLandOnRunway = new AndSpecification(
    new OrSpecification(
        new ActionSpecification(ConditionsBag::LAND),
        new ActionSpecification(ConditionsBag::TAKE_OFF)
    ),
    new TypeRunwaySpecification(ConditionsBag::Runway)
);


$specificationCanTakeoffLandOnWater = new AndSpecification(
    new OrSpecification(
        new ActionSpecification(ConditionsBag::LAND),
        new ActionSpecification(ConditionsBag::TAKE_OFF)
    ),
    new TypeRunwaySpecification(ConditionsBag::WATER)
);
$specificationCanFlyDayTimeGoodWeather = new AndSpecification(
    new ActionSpecification(ConditionsBag::FLY),
    new DayTimeSpecification(ConditionsBag::DAY),
    new WeatherSpecification(ConditionsBag::GOOD)
);

$specification = new OrSpecification(
    $specificationCanTakeoffLandOnRunway,
    $specificationCanTakeoffLandOnWater,
    $specificationCanFlyDayTimeGoodWeather,
);

$plain = new Plain('AeropraktA24', $specification);

$conditions = new ConditionsBag();
$conditions->setAction(ConditionsBag::TAKE_OFF);
$conditions->setTypeRunway(ConditionsBag::Runway);

$plain->can($conditions);
        
```
