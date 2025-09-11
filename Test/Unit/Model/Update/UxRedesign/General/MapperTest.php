<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Update\UxRedesign\General;

use Klarna\Base\Test\Unit\Mock\TestCase;
use Klarna\AdminSettings\Model\Update\UxRedesign\General\Mapper;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Update\UxRedesign\General\Mapper
 */
class MapperTest extends TestCase
{
    /**
     * @var Mapper
     */
    private Mapper $mapper;

    public function testGetTargetAllowSpecificCountriesReturnsCorrectKeyAndValue(): void
    {
        $this->mockConfigurationValues('abc', 'def');

        $result = $this->mapper->getTargetAllowSpecificCountries();
        static::assertEquals('klarna/general/allow_specific_countries', $result['key']);
        static::assertEquals('abc', $result['value']);
    }

    public function testGetTargetSpecificCountriesReturnsCorrectKeyAndValue(): void
    {
        $this->mockConfigurationValues('abc', 'def');

        $result = $this->mapper->getTargetSpecificCountries();
        static::assertEquals('klarna/general/specific_countries', $result['key']);
        static::assertEquals('def', $result['value']);
    }

    private function mockConfigurationValues(string $allowSpecificCountry, string $countryList): void
    {
        $this->dependencyMocks['legacyConfiguration']->method('getAllowSpecificCountry')->willReturn($allowSpecificCountry);
        $this->dependencyMocks['legacyConfiguration']->method('getSpecificCountryList')->willReturn($countryList);
        $this->mapper->prepareMappingData('scope', 'id');
    }

    protected function setUp(): void
    {
        $this->mapper = parent::setUpMocks(Mapper::class);
    }
}