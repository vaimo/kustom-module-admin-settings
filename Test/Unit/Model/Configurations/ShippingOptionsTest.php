<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Configurations;

use Klarna\AdminSettings\Model\Configurations\ShippingOptions;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Store\Model\Store;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Configurations\ShippingOptions
 */
class ShippingOptionsTest extends TestCase
{
    /**
     * @var ShippingOptions
     */
    private ShippingOptions $shippingOptions;
    /**
     * @var Store
     */
    private Store $store;

    public function testGetProductSizeUnitWillReturnValue(): void
    {
        $expected = 'abc';
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/shipping/product_unit', 'stores', $this->store)
            ->willReturn($expected);

        static::assertEquals($expected, $this->shippingOptions->getProductSizeUnit($this->store));
    }

    public function testGetProductLengthAttributeWillReturnValue(): void
    {
        $expected = 'abc';
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/shipping/length', 'stores', $this->store)
            ->willReturn($expected);

        static::assertEquals($expected, $this->shippingOptions->getProductLengthAttribute($this->store));
    }

    public function testGetProductWidthAttributeWillReturnValue(): void
    {
        $expected = 'abc';
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/shipping/width', 'stores', $this->store)
            ->willReturn($expected);

        static::assertEquals($expected, $this->shippingOptions->getProductWidthAttribute($this->store));
    }

    public function testGetProductHeightAttributeWillReturnValue(): void
    {
        $expected = 'abc';
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('klarna/shipping/height', 'stores', $this->store)
            ->willReturn($expected);

        static::assertEquals($expected, $this->shippingOptions->getProductHeightAttribute($this->store));
    }

    protected function setUp(): void
    {
        $this->shippingOptions = parent::setUpMocks(ShippingOptions::class);
        $this->store = $this->mockFactory->create(Store::class);
    }
}
