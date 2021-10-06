<?php
namespace Plains\Tests\Specifications;

use Plains\Specifications\TypeRunwaySpecification;
use Plains\ConditionsBag;
use Plains\Specifications\WeatherSpecification;


class SpecificationTest extends \PHPUnit\Framework\TestCase
{

    public function testTypeRunwaySpecification()
    {
        $specification = new TypeRunwaySpecification(ConditionsBag::WATER);
        $conditionsBag = new \Plains\ConditionsBag();
        $conditionsBag->setTypeRunway(ConditionsBag::WATER);

        $this->assertTrue($specification->isSatisfiedBy($conditionsBag));

        $conditionsBag = new \Plains\ConditionsBag();
        $this->assertFalse($specification->isSatisfiedBy($conditionsBag));

        $conditionsBag = new \Plains\ConditionsBag();
        $conditionsBag->setTypeRunway(ConditionsBag::Runway);
        $this->assertFalse($specification->isSatisfiedBy($conditionsBag));
    }

    public function testWeatherSpecification()
    {
        $specification = new WeatherSpecification(ConditionsBag::GOOD);
        $conditionsBag = new \Plains\ConditionsBag();
        $conditionsBag->setWeather(ConditionsBag::GOOD);

        $this->assertTrue($specification->isSatisfiedBy($conditionsBag));

        $specification = new WeatherSpecification(ConditionsBag::ANY);
        $conditionsBag = new \Plains\ConditionsBag();

        $this->assertTrue($specification->isSatisfiedBy($conditionsBag));

        $specification = new WeatherSpecification(ConditionsBag::GOOD);
        $conditionsBag = new \Plains\ConditionsBag();

        $this->assertFalse($specification->isSatisfiedBy($conditionsBag));
    }
}
