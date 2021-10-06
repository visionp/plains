<?php

namespace Plains\Tests\Plains;


use Plains\ConditionsBag;
use Plains\PlainFactory;
use Plains\PlainInterface;

class BoeingTest extends \PHPUnit\Framework\TestCase
{

    public function testCanFly()
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
