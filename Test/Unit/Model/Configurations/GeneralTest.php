<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Configuration;

use Klarna\AdminSettings\Model\Configurations\General;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Store\Model\Store;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Configurations\General
 */
class GeneralTest extends TestCase
{
    /**
     * @var General
     */
    private General $general;
    /**
     * @var Store
     */
    private Store $store;

    public function testIsCountryAllowedAllCountryFlagTrueImpliesReturnTrue(): void
    {
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/general/allow_specific_countries', 'stores', $this->store)
            ->willReturn(0);
        static::assertTrue($this->general->isCountryAllowed($this->store, 'DE'));
    }

    public function testIsCountryAllowedCountryFlagFalseAndCountryPartOfCountryListImpliesReturnTrue(): void
    {
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/general/allow_specific_countries', 'stores', $this->store)
            ->willReturn(1);
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/general/specific_countries', 'stores', $this->store)
            ->willReturn('SE,DE,US');
        static::assertTrue($this->general->isCountryAllowed($this->store, 'DE'));
    }

    public function testIsCountryAllowedCountryFlagFalseAndCountryNotPartOfCountryListImpliesReturnFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/general/allow_specific_countries', 'stores', $this->store)
            ->willReturn(1);
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/general/specific_countries', 'stores', $this->store)
            ->willReturn('SE,FR,US');
        static::assertFalse($this->general->isCountryAllowed($this->store, 'DE'));
    }

    protected function setUp(): void
    {
        $this->general = parent::setUpMocks(General::class);
        $this->store = $this->mockFactory->create(Store::class);
    }
}