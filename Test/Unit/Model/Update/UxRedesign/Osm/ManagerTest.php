<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Update\UxRedesign\Osm;

use Klarna\AdminSettings\Model\Update\UxRedesign\Osm\Manager;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Update\UxRedesign\Osm\Manager
 */
class ManagerTest extends TestCase
{
    /**
     * @var Manager
     */
    private Manager $manager;

    public function testPrepareMappingDataPreparationMethodIsCalled(): void
    {
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('prepareMappingData');
        $this->manager->prepareMappingData('a', 'b');
    }

    public function testUpdatePositionUsingKeyAndValueFromCorrectMethod(): void
    {
        $result = [
            'key' => 'my_key',
            'value' => 'my_value'
        ];
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetPosition')
            ->willReturn($result);
        $this->dependencyMocks['configWriter']->expects(static::once())
            ->method('saveConfig')
            ->with($result['key'], $result['value'], 'store_code', '1');

        $this->manager->setScope('store_code');
        $this->manager->setScopeCode('1');
        $this->manager->updatePosition();
    }

    public function testUpdatePositionReturnsEmptyKeyAndValueImpliesNoDataWriting(): void
    {
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetPosition')
            ->willReturn(['key' => '', 'value' => '']);
        $this->dependencyMocks['configWriter']->expects(static::never())
            ->method('saveConfig');

        $this->manager->updatePosition();
    }

    public function testUpdateThemeReturnsEmptyArrayImpliesNoDataWriting(): void
    {
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetTheme')
            ->willReturn([]);
        $this->dependencyMocks['configWriter']->expects(static::never())
            ->method('saveConfig');

        $this->manager->updateTheme();
    }

    public function testUpdateThemeReturnsOneArrayImpliesUsingKeyAndValueFromCorrectMethod(): void
    {
        $result = [
            [
                'key' => 'my_key',
                'value' => 'my_value'
            ]
        ];
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetTheme')
            ->willReturn($result);
        $this->dependencyMocks['configWriter']->expects(static::once())
            ->method('saveConfig')
            ->with($result[0]['key'], $result[0]['value'], 'store_code', '1');

        $this->manager->setScope('store_code');
        $this->manager->setScopeCode('1');
        $this->manager->updateTheme();
    }

    protected function setUp(): void
    {
        $this->manager = parent::setUpMocks(Manager::class);
    }
}