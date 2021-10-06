<?php
namespace Plains\Tests\Plains;

use Plains\ConditionsBag;
use Plains\PlainFactory;
use Plains\PlainInterface;

class AeropraktA24Test extends \PHPUnit\Framework\TestCase
{

    public function testRunway()
    {
        $plain = $this->buildPlain();

        $conditions = new ConditionsBag();
        $conditions->setAction(ConditionsBag::TAKE_OFF);
        $conditions->setTypeRunway(ConditionsBag::Runway);

        $this->assertTrue($plain->can($conditions));

        $conditions->setAction(ConditionsBag::LAND);
        $conditions->setTypeRunway(ConditionsBag::WATER);
        $this->assertTrue($plain->can($conditions));

        $conditions->setAction(ConditionsBag::FLY);
        $conditions->setTypeRunway(ConditionsBag::WATER);
        $this->assertFalse($plain->can($conditions));
    }

    public function testFly()
    {
        $plain = $this->buildPlain();

        $conditions = new ConditionsBag();
        $conditions->setAction(ConditionsBag::FLY);
        $conditions->setDaytime(ConditionsBag::DAY);

        $this->assertFalse($plain->can($conditions));

        $conditions->setWeather(ConditionsBag::GOOD);
        $this->assertTrue($plain->can($conditions));
    }

    private function buildPlain(): PlainInterface
    {
        return PlainFactory::buildAeropraktA24();
    }
}
