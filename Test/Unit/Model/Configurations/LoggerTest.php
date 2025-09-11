<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Configuration;

use Klarna\AdminSettings\Model\Configurations\Logger;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Store\Model\Store;
use Magento\Store\Model\ScopeInterface;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Configurations\Logger
 */
class LoggerTest extends TestCase
{

    /**
     * @var Logger
     */
    private Logger $model;
    /**
     * @var Store
     */
    private Store $store;

    public function testIsEnabledReturnsValue(): void
    {
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api/debug', ScopeInterface::SCOPE_STORES, $this->store)
            ->willReturn('1');

        static::assertTrue($this->model->isEnabled($this->store));
    }

    protected function setUp(): void
    {
        $this->model = parent::setUpMocks(Logger::class);
        $this->store = $this->mockFactory->create(Store::class);
    }
}
