<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Configuration;

use Klarna\AdminSettings\Model\Configurations\Kp;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Store\Model\Store;
use Magento\Store\Model\ScopeInterface;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Configurations\Kp
 */
class KpTest extends TestCase
{

    /**
     * @var Kp
     */
    private Kp $model;
    /**
     * @var Store
     */
    private Store $store;

    public function testIsB2bEnabledReturnsValue(): void
    {
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('payment/klarna_kp/enable_b2b', ScopeInterface::SCOPE_STORES, $this->store)
            ->willReturn(true);

        static::assertTrue($this->model->isB2bEnabled($this->store));
    }

    public function testIsEnabledReturnsValue(): void
    {
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('payment/klarna_kp/active', ScopeInterface::SCOPE_STORES, $this->store)
            ->willReturn(true);

        static::assertTrue($this->model->isEnabled($this->store));
    }

    public function testGetSortOrderUsingCorrectConfigKey(): void
    {
        $expected = '6';
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('payment/klarna_kp/sort_order', 'stores', $this->store)
            ->willReturn($expected);

        static::assertEquals($expected, $this->model->getSortOrder($this->store));
    }

    public function testGetSortOrderUsingEmptyString(): void
    {
        $expected = '';
        $this->dependencyMocks['scopeConfig']->expects($this->once())
            ->method('getValue')
            ->with('payment/klarna_kp/sort_order', 'stores', $this->store)
            ->willReturn($expected);

        static::assertEquals($expected, $this->model->getSortOrder($this->store));
    }

    protected function setUp(): void
    {
        $this->model = parent::setUpMocks(Kp::class);
        $this->store = $this->mockFactory->create(Store::class);
    }
}
