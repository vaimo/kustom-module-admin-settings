<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Configurations;

use Klarna\AdminSettings\Model\Configurations\Osm;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Store\Model\Store;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Configurations\Osm
 */
class OsmTest extends TestCase
{
    /**
     * @var Osm
     */
    private Osm $osm;
    /**
     * @var Store
     */
    private Store $store;

    public function testIsEnabledWillReturnValue(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('isSetFlag')
            ->with('klarna/osm/enabled', 'stores', $this->store)
            ->willReturn(1);

        static::assertTrue($this->osm->isEnabled($this->store));
    }

    public function testIsEnabledOnCartPageCartIsPartOfListImpliesReturningTrue(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/osm/position', 'stores', $this->store)
            ->willReturn('cart, x');

        static::assertTrue($this->osm->isEnabledOnCartPage($this->store));
    }

    public function testIsEnabledOnCartPageCartIsNotPartOfListImpliesReturningFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/osm/position', 'stores', $this->store)
            ->willReturn('product, footer');

        static::assertFalse($this->osm->isEnabledOnCartPage($this->store));
    }

    public function testIsEnabledOnProductPageProductIsPartOfListImpliesReturningTrue(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/osm/position', 'stores', $this->store)
            ->willReturn('product, x');

        static::assertTrue($this->osm->isEnabledOnProductPage($this->store));
    }

    public function testIsEnabledOnProductPageProductIsNotPartOfListImpliesReturningFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/osm/position', 'stores', $this->store)
            ->willReturn('footer, cart');

        static::assertFalse($this->osm->isEnabledOnProductPage($this->store));
    }

    public function testIsEnabledOnFooterIsPartOfListImpliesReturningTrue(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/osm/position', 'stores', $this->store)
            ->willReturn('footer, x');

        static::assertTrue($this->osm->isEnabledOnFooter($this->store));
    }

    public function testIsEnabledOnFooterIsNotPartOfListImpliesReturningFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/osm/position', 'stores', $this->store)
            ->willReturn('product, cart');

        static::assertFalse($this->osm->isEnabledOnFooter($this->store));
    }

    public function testGetThemeWillReturnValue(): void
    {
        $expected = 'abc';
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/osm/theme', 'stores', $this->store)
            ->willReturn($expected);

        static::assertEquals($expected, $this->osm->getTheme($this->store));
    }

    public function testIsCustomThemeWordCustomIsSetReturnsTrue(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/osm/theme', 'stores', $this->store)
            ->willReturn('custom');

        static::assertTrue($this->osm->isCustomTheme($this->store));
    }

    public function testIsCustomThemeWordCustomIsSetReturnsFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/osm/theme', 'stores', $this->store)
            ->willReturn('customm');

        static::assertFalse($this->osm->isCustomTheme($this->store));
    }

    public function testGetCustomThemeNameReturnsValue(): void
    {
        $expected = 'abc';
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/osm/custom_theme_name', 'stores', $this->store)
            ->willReturn($expected);

        static::assertEquals($expected, $this->osm->getCustomThemeName($this->store));
    }

    protected function setUp(): void
    {
        $this->osm = parent::setUpMocks(Osm::class);
        $this->store = $this->mockFactory->create(Store::class);
    }
}
