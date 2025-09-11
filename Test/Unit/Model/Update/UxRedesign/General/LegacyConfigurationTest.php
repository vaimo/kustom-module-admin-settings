<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Update\UxRedesign\General;

use Klarna\Base\Test\Unit\Mock\TestCase;
use Klarna\AdminSettings\Model\Update\UxRedesign\General\LegacyConfiguration;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Update\UxRedesign\General\LegacyConfiguration
 */
class LegacyConfigurationTest extends TestCase
{
    /**
     * @var LegacyConfiguration
     */
    private LegacyConfiguration $legacyConfiguration;

    public function testGetAllowSpecificCountryReturnsValue(): void
    {
        $expected = '1';
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('getValue')
            ->with('payment/klarna_kp/allowspecific', 'scope', 'id')
            ->willReturn($expected);

        static::assertEquals($expected, $this->legacyConfiguration->getAllowSpecificCountry('scope', 'id'));
    }

    public function testGetSpecificCountryListReturnsValue(): void
    {
        $expected = 'abc';
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('getValue')
            ->with('payment/klarna_kp/specificcountry', 'scope', 'id')
            ->willReturn($expected);

        static::assertEquals($expected, $this->legacyConfiguration->getSpecificCountryList('scope', 'id'));
    }

    protected function setUp(): void
    {
        $this->legacyConfiguration = parent::setUpMocks(LegacyConfiguration::class);
    }
}
