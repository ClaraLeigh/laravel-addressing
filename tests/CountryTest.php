<?php

use Galahad\LaravelAddressing\AdministrativeArea;
use Galahad\LaravelAddressing\Country;

/**
 * Class CountryTest
 *
 * @author Junior Grossi <juniorgro@gmail.com>
 */
class CountryTest extends PHPUnit_Framework_TestCase
{
    public function testFindByCodeAndName()
    {
        $country = new Country;

        $us = $country->getByName('United States');
        $br = $country->getByName('Brazil');
        $brazil = $country->getByCode('BR');

        $this->assertEquals($us->getCode(), 'US');
        $this->assertEquals($br->getCode(), 'BR');
        $this->assertEquals($brazil->getName(), 'Brazil');
    }

    public function testGetAdministrativeAreasFirstRow()
    {
        $country = new Country;

        $brazil = $country->getByCode('BR');
        $acState = $brazil->getAdministrativeAreas()->getByKey(0);

        $us = $country->getByCode('US');
        $alabamaState = $us->getAdministrativeAreas()->getByKey(0);
        $coloradoState = $us->getAdministrativeAreas()->getByKey(9);

        $this->assertEquals($acState->getName(), 'Acre');
        $this->assertEquals($alabamaState->getName(), 'Alabama');
        $this->assertEquals($coloradoState->getName(), 'Colorado');
    }
}