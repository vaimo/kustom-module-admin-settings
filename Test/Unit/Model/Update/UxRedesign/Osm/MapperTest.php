<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Update\UxRedesign\Osm;

use Klarna\AdminSettings\Model\Update\UxRedesign\Osm\Mapper;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Store\Model\Store;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Update\UxRedesign\Osm\Mapper
 */
class MapperTest extends TestCase
{
    /**
     * @var Mapper
     */
    private Mapper $mapper;
    /**
     * @var Store
     */
    private Store $store;

    public function testGetTargetPositionProductDisabledCartDisabledFooterDisabledReturnsEmptyValue(): void
    {
        $this->mockConfigurationValues(false, false, false, 'default');

        $result = $this->mapper->getTargetPosition();
        static::assertEquals('klarna/osm/position', $result['key']);
        static::assertEquals('', $result['value']);
    }

    public function testGetTargetPositionProductEnabledCartDisabledFooterDisabledReturnsProductValue(): void
    {
        $this->mockConfigurationValues(true, false, false, 'default');

        $result = $this->mapper->getTargetPosition();
        static::assertEquals('klarna/osm/position', $result['key']);
        static::assertEquals('product', $result['value']);
    }

    public function testGetTargetPositionProductDisabledCartEnabledFooterDisabledReturnsCartValue(): void
    {
        $this->mockConfigurationValues(false, true, false, 'default');

        $result = $this->mapper->getTargetPosition();
        static::assertEquals('klarna/osm/position', $result['key']);
        static::assertEquals('cart', $result['value']);
    }

    public function testGetTargetPositionProductEnabledCartEnabledFooterDisabledReturnsProductCartValue(): void
    {
        $this->mockConfigurationValues(true, true, false, 'default');

        $result = $this->mapper->getTargetPosition();
        static::assertEquals('klarna/osm/position', $result['key']);
        static::assertEquals('product,cart', $result['value']);
    }

    public function testGetTargetPositionProductDisabledCartDisabledFooterEnabledReturnsFooterValue(): void
    {
        $this->mockConfigurationValues(false, false, true, 'default');

        $result = $this->mapper->getTargetPosition();
        static::assertEquals('klarna/osm/position', $result['key']);
        static::assertEquals('footer', $result['value']);
    }

    public function testGetTargetPositionProductEnabledCartDisabledFooterEnabledReturnsProductFooterValue(): void
    {
        $this->mockConfigurationValues(true, false, true, 'default');

        $result = $this->mapper->getTargetPosition();
        static::assertEquals('klarna/osm/position', $result['key']);
        static::assertEquals('product,footer', $result['value']);
    }

    public function testGetTargetPositionProductDisabledCartEnabledFooterEnabledReturnsCartFooterValue(): void
    {
        $this->mockConfigurationValues(false, true, true, 'default');

        $result = $this->mapper->getTargetPosition();
        static::assertEquals('klarna/osm/position', $result['key']);
        static::assertEquals('cart,footer', $result['value']);
    }

    public function testGetTargetPositionProductEnabledCartEnabledFooterEnabledReturnsProductCartFooterValue(): void
    {
        $this->mockConfigurationValues(true, true, true, 'default');

        $result = $this->mapper->getTargetPosition();
        static::assertEquals('klarna/osm/position', $result['key']);
        static::assertEquals('product,cart,footer', $result['value']);
    }

    public function testGetTargetThemeSettingBothKeysAndValues(): void
    {
        $expected = 'default';
        $this->mockConfigurationValues(true, true, true, $expected);

        $result = $this->mapper->getTargetTheme();
        $itemTheme = $result[0];
        $itemCustomThemeName = $result[1];

        static::assertEquals('klarna/osm/theme', $itemTheme['key']);
        static::assertEquals('custom', $itemTheme['value']);
        static::assertEquals('klarna/osm/custom_theme_name', $itemCustomThemeName['key']);
        static::assertEquals($expected, $itemCustomThemeName['value']);
    }

    private function mockConfigurationValues(
        bool $productEnabled,
        bool $cartEnabled,
        bool $footerEnabled,
        string $theme,
    ): void {
        $this->dependencyMocks['legacyConfiguration']->method('isProductEnabledFlag')->willReturn($productEnabled);
        $this->dependencyMocks['legacyConfiguration']->method('isCartEnabled')->willReturn($cartEnabled);
        $this->dependencyMocks['legacyConfiguration']->method('isFooterEnabled')->willReturn($footerEnabled);
        $this->dependencyMocks['legacyConfiguration']->method('getTheme')->willReturn($theme);
        $this->mapper->prepareMappingData('scope', 'id');
    }

    protected function setUp(): void
    {
        $this->mapper = parent::setUpMocks(Mapper::class);
        $this->store = $this->mockFactory->create(Store::class);
    }
}
