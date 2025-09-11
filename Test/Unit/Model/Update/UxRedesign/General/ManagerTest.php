<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Update\UxRedesign\General;

use Klarna\AdminSettings\Model\Update\UxRedesign\General\Manager;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Update\UxRedesign\General\Manager
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
        $this->manager->prepareMappingData();
    }

    public function testUpdateAllowSpecificCountriesUsingKeyAndValueFromCorrectMethod(): void
    {
        $result = [
            'key' => 'my_key',
            'value' => 'my_value'
        ];
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetAllowSpecificCountries')
            ->willReturn($result);
        $this->dependencyMocks['configWriter']->expects(static::once())
            ->method('saveConfig')
            ->with($result['key'], $result['value'], 'store_code', '1');

        $this->manager->setScope('store_code');
        $this->manager->setScopeCode('1');
        $this->manager->updateAllowSpecificCountries();
    }

    public function testUpdateSpecificCountriesUsingKeyAndValueFromCorrectMethod(): void
    {
        $result = [
            'key' => 'my_key',
            'value' => 'my_value'
        ];
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetSpecificCountries')
            ->willReturn($result);
        $this->dependencyMocks['configWriter']->expects(static::once())
            ->method('saveConfig')
            ->with($result['key'], $result['value'], 'store_code', '1');

        $this->manager->setScope('store_code');
        $this->manager->setScopeCode('1');
        $this->manager->updateSpecificCountries();
    }

    protected function setUp(): void
    {
        $this->manager = parent::setUpMocks(Manager::class);
    }
}