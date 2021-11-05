The task is to build the structure of classes and methods for:
1) Airplane Aeroprakt A-24 2) Airplane Curtiss NC-4 3) Airplane Boeing 747
   Considerations
1) They can all takeoff, fly, and land.
2) Aeroprakt A-24 and Boeing 747 have wheels, meaning they can takeoff and land on a runway.
3) Curtiss NC-4 and Aeroprakt A-24 can takeoff and land on water.
4) Aeroprakt A-24 and Curtiss NC-4 can only fly in the daytime and in good weather. 5) Boeing 747 can fly at any time and in any weather.


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
