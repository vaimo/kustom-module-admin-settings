<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Configurations;

use Klarna\AdminSettings\Model\Configurations\Siwk;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Store\Model\Store;
use Magento\Store\Model\ScopeInterface;

/**
 * @coversDefaultClass \Klarna\Siwk\Model\Configuration\General
 */
class SiwkTest extends TestCase
{
    /**
     * @var Siwk
     */
    private Siwk $model;
    /**
     * @var Store
     */
    private Store $store;

    public function testIsEnabledReturnsValue(): void
    {
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/siwk/enabled', ScopeInterface::SCOPE_STORES, $this->store)
            ->willReturn('1');

        static::assertTrue($this->model->isEnabled($this->store));
    }

    public function testIsEnabledOnPositionNotEnabledReturnsFalse(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/siwk/placement', ScopeInterface::SCOPE_STORES, $this->store)
            ->willReturn('a,b');

        static::assertFalse($this->model->isEnabledOnPosition($this->store, 'c'));
    }

    public function testIsEnabledOnPositionEnabledReturnsTrue(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/siwk/placement', ScopeInterface::SCOPE_STORES, $this->store)
            ->willReturn('a,b');

        static::assertTrue($this->model->isEnabledOnPosition($this->store, 'b'));
    }

    public function testGetScopesReturnsValue(): void
    {
        $expected = 'a';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/siwk/scope', ScopeInterface::SCOPE_STORES, $this->store)
            ->willReturn($expected);

        $result = $this->model->getScopes($this->store);
        static::assertEquals($expected, $result);
    }

    public function testGetButtonThemeReturnsValue(): void
    {
        $expected = 'a';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/siwk/button_theme', ScopeInterface::SCOPE_STORES, $this->store)
            ->willReturn($expected);

        $result = $this->model->getButtonTheme($this->store);
        static::assertEquals($expected, $result);
    }

    public function testGetButtonShapeReturnsValue(): void
    {
        $expected = 'a';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/siwk/button_shape', ScopeInterface::SCOPE_STORES, $this->store)
            ->willReturn($expected);

        $result = $this->model->getButtonShape($this->store);
        static::assertEquals($expected, $result);
    }

    public function testGetButtonAlignmentReturnsValue(): void
    {
        $expected = 'a';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/siwk/button_alignment', ScopeInterface::SCOPE_STORES, $this->store)
            ->willReturn($expected);

        $result = $this->model->getButtonAlignment($this->store);
        static::assertEquals($expected, $result);
    }

    protected function setUp(): void
    {
        $this->model = parent::setUpMocks(Siwk::class);
        $this->store = $this->mockFactory->create(Store::class);
    }
}