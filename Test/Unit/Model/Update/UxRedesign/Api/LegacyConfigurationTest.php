<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Update\UxRedesign\Api;

use Klarna\AdminSettings\Model\Update\UxRedesign\Api\LegacyConfiguration;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Store\Model\Store;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Update\UxRedesign\Api\LegacyConfiguration
 */
class LegacyConfigurationTest extends TestCase
{
    /**
     * @var LegacyConfiguration
     */
    private LegacyConfiguration $legacyConfiguration;
    /**
     * @var Store
     */
    private Store $store;

    public function testGetApiVersionUsingTheCorrectKey(): void
    {
        $expected = 'my return value';
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('getValue')
            ->with('klarna/api/api_version', 'scope', 'scopeCode')
            ->willReturn($expected);

        static::assertEquals($expected, $this->legacyConfiguration->getApiVersion('scope', 'scopeCode'));
    }

    public function testGetMerchantIdUsingTheCorrectKey(): void
    {
        $expected = 'my return value';
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('getValue')
            ->with('klarna/api/merchant_id', 'scope', 'scopeCode')
            ->willReturn($expected);

        static::assertEquals($expected, $this->legacyConfiguration->getMerchantId('scope', 'scopeCode'));
    }

    public function testGetSharedSecretUsingTheCorrectKey(): void
    {
        $expected = 'my return value';
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('getValue')
            ->with('klarna/api/shared_secret', 'scope', 'scopeCode')
            ->willReturn($expected);

        static::assertEquals($expected, $this->legacyConfiguration->getSharedSecret('scope', 'scopeCode'));
    }

    public function testIsTestModeEnabledUsingTheCorrectKey(): void
    {
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('isSetFlag')
            ->with('klarna/api/test_mode', 'scope', 'scopeCode')
            ->willReturn(true);

        static::assertTrue($this->legacyConfiguration->isTestModeEnabled('scope', 'scopeCode'));
    }

    public function testGetKecClientIdentifierUsingTheCorrectKey(): void
    {
        $expected = 'my return value';
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('getValue')
            ->with('payment/kec/client_identifier', 'scope', 'scopeCode')
            ->willReturn($expected);

        static::assertEquals($expected, $this->legacyConfiguration->getKecClientIdentifier('scope', 'scopeCode'));
    }

    public function testGetOsmClientIdentifierUsingTheCorrectKey(): void
    {
        $expected = 'my return value';
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('getValue')
            ->with('klarna/osm/data_id', 'scope', 'scopeCode')
            ->willReturn($expected);

        static::assertEquals($expected, $this->legacyConfiguration->getOsmClientIdentifier('scope', 'scopeCode'));
    }

    protected function setUp(): void
    {
        $this->legacyConfiguration = parent::setUpMocks(LegacyConfiguration::class);
        $this->store = $this->mockFactory->create(Store::class);
    }
}
