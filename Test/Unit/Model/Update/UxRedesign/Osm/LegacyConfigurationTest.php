<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Update\UxRedesign\Osm;

use Klarna\AdminSettings\Model\Update\UxRedesign\Osm\LegacyConfiguration;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Store\Model\Store;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Update\UxRedesign\Osm\LegacyConfiguration
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

    public function testIsProductEnabledFlagFlagValueIsOneReturnsTrue(): void
    {
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('isSetFlag')
            ->with('klarna/osm/product_enabled', 'scope', 'id')
            ->willReturn('1');

        static::assertTrue($this->legacyConfiguration->isProductEnabledFlag('scope', 'id'));
    }

    public function testIsProductEnabledFlagFlagValueIsZeroReturnsFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('isSetFlag')
            ->with('klarna/osm/product_enabled', 'scope', 'id')
            ->willReturn('0');

        static::assertFalse($this->legacyConfiguration->isProductEnabledFlag('scope', 'id'));
    }

    public function testIsProductEnabledFlagFlagValueIsEmptyReturnsFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('isSetFlag')
            ->with('klarna/osm/product_enabled', 'scope', 'id')
            ->willReturn('');

        static::assertFalse($this->legacyConfiguration->isProductEnabledFlag('scope', 'id'));
    }

    public function testIsProductEnabledFlagFlagValueIsNullReturnsFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('isSetFlag')
            ->with('klarna/osm/product_enabled', 'scope', 'id')
            ->willReturn(null);

        static::assertFalse($this->legacyConfiguration->isProductEnabledFlag('scope', 'id'));
    }

    public function testIsCartEnabledFlagFlagValueIsOneReturnsTrue(): void
    {
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('isSetFlag')
            ->with('klarna/osm/cart_enabled', 'scope', 'id')
            ->willReturn('1');

        static::assertTrue($this->legacyConfiguration->isCartEnabled('scope', 'id'));
    }

    public function testIsCartEnabledFlagFlagValueIsZeroReturnsFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('isSetFlag')
            ->with('klarna/osm/cart_enabled', 'scope', 'id')
            ->willReturn('0');

        static::assertFalse($this->legacyConfiguration->isCartEnabled('scope', 'id'));
    }

    public function testIsCartEnabledFlagFlagValueIsEmptyReturnsFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('isSetFlag')
            ->with('klarna/osm/cart_enabled', 'scope', 'id')
            ->willReturn('');

        static::assertFalse($this->legacyConfiguration->isCartEnabled('scope', 'id'));
    }

    public function testIsCartEnabledFlagFlagValueIsNullReturnsFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('isSetFlag')
            ->with('klarna/osm/cart_enabled', 'scope', 'id')
            ->willReturn(null);

        static::assertFalse($this->legacyConfiguration->isCartEnabled('scope', 'id'));
    }

    public function testIsFooterEnabledFlagFlagValueIsOneReturnsTrue(): void
    {
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('isSetFlag')
            ->with('klarna/osm/footer_enabled', 'scope', 'id')
            ->willReturn('1');

        static::assertTrue($this->legacyConfiguration->isFooterEnabled('scope', 'id'));
    }

    public function testIsFooterEnabledFlagFlagValueIsZeroReturnsFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('isSetFlag')
            ->with('klarna/osm/footer_enabled', 'scope', 'id')
            ->willReturn('0');

        static::assertFalse($this->legacyConfiguration->isFooterEnabled('scope', 'id'));
    }

    public function testIsFooterEnabledFlagFlagValueIsEmptyReturnsFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('isSetFlag')
            ->with('klarna/osm/footer_enabled', 'scope', 'id')
            ->willReturn('');

        static::assertFalse($this->legacyConfiguration->isFooterEnabled('scope', 'id'));
    }

    public function testIsFooterEnabledFlagFlagValueIsNullReturnsFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('isSetFlag')
            ->with('klarna/osm/footer_enabled', 'scope', 'id')
            ->willReturn(null);

        static::assertFalse($this->legacyConfiguration->isFooterEnabled('scope', 'id'));
    }

    public function testGetThemeReturnsValue(): void
    {
        $expected = 'my return value';
        $this->dependencyMocks['scopeConfig']->expects(static::once())
            ->method('getValue')
            ->with('klarna/osm/theme', 'scope', 'id')
            ->willReturn($expected);

        static::assertEquals($expected, $this->legacyConfiguration->getTheme('scope', 'id'));
    }

    protected function setUp(): void
    {
        $this->legacyConfiguration = parent::setUpMocks(LegacyConfiguration::class);
        $this->store = $this->mockFactory->create(Store::class);
    }
}