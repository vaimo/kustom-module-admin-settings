<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\System\Config\Backend;

use Klarna\AdminSettings\Model\System\Config\Kco\Backend\Multiselect;
use Klarna\Base\Test\Unit\Mock\MockFactory;
use Magento\Framework\App\Cache\TypeList;
use Magento\Framework\App\Config;
use Magento\Framework\Event\Manager;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\System\Config\Kco\Backend\Multiselect
 */
class MultiselectTest extends TestCase
{
    /**
     * @var Multiselect|MockObject
     */
    private $model;

    /**
     * @covers ::beforeSave
     */
    public function testBeforeSaveNotArrayAndMinusValue(): void
    {
        $this->model->method('getValue')
            ->willReturn('-1');
        $this->model->expects(static::once())
            ->method('setValue')
            ->with(null);

        $this->model->beforeSave();
    }

    /**
     * @covers ::beforeSave
     */
    public function testBeforeSaveArrayWithMinusValue(): void
    {
        $this->model->method('getValue')
            ->willReturn(['-1']);
        $this->model->expects(static::once())
            ->method('setValue')
            ->with(null);

        $this->model->beforeSave();
    }

    /**
     * @covers ::beforeSave
     */
    public function testBeforeSaveArrayWithValidValue(): void
    {
        $this->model->method('getValue')
            ->willReturn(['foo']);
        $this->model->expects(static::never())
            ->method('setValue');

        $this->model->beforeSave();
    }

    protected function setUp(): void
    {
        $mockFactory   = new MockFactory($this);
        $context       = $mockFactory->create(Context::class);
        $registry      = $mockFactory->create(Registry::class);
        $config        = $mockFactory->create(Config::class);
        $cacheTypeList = $mockFactory->create(TypeList::class);
        $eventManager  = $mockFactory->create(Manager::class);

        $context->method('getEventDispatcher')
            ->willReturn($eventManager);

        // Using a partial mock instead of a real object to mock private and magic methods
        $this->model   = $this->getMockBuilder(Multiselect::class)
            ->setConstructorArgs([
                $context,
                $registry,
                $config,
                $cacheTypeList
            ])
            ->addMethods([
                'getValue',
                'setValue'
            ])->getMock();
    }
}
