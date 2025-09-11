<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Configurations;

use Klarna\AdminSettings\Model\Configurations\Kec;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Store\Model\Store;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Configurations\Kec
 */
class KecTest extends TestCase
{
    /**
     * @var Kec
     */
    private Kec $kec;
    /**
     * @var Store
     */
    private Store $store;

    public function testIsEnabledUsingCorrectConfigKey(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('isSetFlag')
            ->with('payment/kec/enabled', 'stores', $this->store)
            ->willReturn(1);

        static::assertTrue($this->kec->isEnabled($this->store));
    }

    public function testIsEnabledOnCartPageCartIsPartOfListImpliesReturningTrue(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('payment/kec/position', 'stores', $this->store)
            ->willReturn('cart, x');

        static::assertTrue($this->kec->isEnabledOnCartPage($this->store));
    }

    public function testIsEnabledOnCartPageCartIsNotPartOfListImpliesReturningFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('payment/kec/position', 'stores', $this->store)
            ->willReturn('product, x');

        static::assertFalse($this->kec->isEnabledOnCartPage($this->store));
    }

    public function testIsEnabledOnProductPageProductIsPartOfListImpliesReturningTrue(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('payment/kec/position', 'stores', $this->store)
            ->willReturn('product');

        static::assertTrue($this->kec->isEnabledOnProductPage($this->store));
    }

    public function testIsEnabledOnProductPageProductIsNotPartOfListImpliesReturningFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('payment/kec/position', 'stores', $this->store)
            ->willReturn('cart, x');

        static::assertFalse($this->kec->isEnabledOnProductPage($this->store));
    }

    public function testIsEnabledOnMiniCartMiniCartIsPartOfListImpliesReturningTrue(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('payment/kec/position', 'stores', $this->store)
            ->willReturn('mini_cart');

        static::assertTrue($this->kec->isEnabledOnMiniCart($this->store));
    }

    public function testIsEnabledOnMiniCartMiniCartIsNotPartOfListImpliesReturningFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('payment/kec/position', 'stores', $this->store)
            ->willReturn('cart, x', 'product');

        static::assertFalse($this->kec->isEnabledOnMiniCart($this->store));
    }

    public function testGetThemeUsingCorrectConfigKey(): void
    {
        $expected = 'abc';
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('payment/kec/theme', 'stores', $this->store)
            ->willReturn($expected);

        static::assertEquals($expected, $this->kec->getTheme($this->store));
    }

    public function testGetShapeUsingCorrectConfigKey(): void
    {
        $expected = 'abc';
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('payment/kec/shape', 'stores', $this->store)
            ->willReturn($expected);

        static::assertEquals($expected, $this->kec->getShape($this->store));
    }

    protected function setUp(): void
    {
        $this->kec = parent::setUpMocks(Kec::class);
        $this->store = $this->mockFactory->create(Store::class);
    }
}
