<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Update\UxRedesign\Api;

use Klarna\AdminSettings\Model\Update\UxRedesign\Api\Manager;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Update\UxRedesign\Api\Manager
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

    public function testUpdateRegionUsingKeyAndValueFromCorrectMethod(): void
    {
        $result = [
            'key' => 'my_key',
            'value' => 'my_value'
        ];
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetRegion')
            ->willReturn($result);
        $this->dependencyMocks['configWriter']->expects(static::once())
            ->method('saveConfig')
            ->with($result['key'], $result['value'], 'store_code', '1');

        $this->manager->setScope('store_code');
        $this->manager->setScopeCode('1');
        $this->manager->updateRegion();
    }

    public function testUpdateRegionReturnsEmptyKeyAndValueImpliesNoDataWriting(): void
    {
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetRegion')
            ->willReturn(['key' => '', 'value' => '']);
        $this->dependencyMocks['configWriter']->expects(static::never())
            ->method('saveConfig');

        $this->manager->updateRegion();
    }

    public function testUpdateUserNameUsingKeyAndValueFromCorrectMethod(): void
    {
        $result = [
            'key' => 'my_key',
            'value' => 'my_value'
        ];
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetUserName')
            ->willReturn($result);
        $this->dependencyMocks['configWriter']->expects(static::once())
            ->method('saveConfig')
            ->with($result['key'], $result['value'], 'store_code', '1');

        $this->manager->setScope('store_code');
        $this->manager->setScopeCode('1');
        $this->manager->updateUserName();
    }

    public function testUpdateUserNameReturnsEmptyKeyAndValueImpliesNoDataWriting(): void
    {
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetUserName')
            ->willReturn(['key' => '', 'value' => '']);
        $this->dependencyMocks['configWriter']->expects(static::never())
            ->method('saveConfig');

        $this->manager->updateUserName();
    }

    public function testUpdatePasswordUsingKeyAndValueFromCorrectMethod(): void
    {
        $result = [
            'key' => 'my_key',
            'value' => 'my_value'
        ];
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetPassword')
            ->willReturn($result);
        $this->dependencyMocks['configWriter']->expects(static::once())
            ->method('saveConfig')
            ->with($result['key'], $result['value'], 'store_code', '1');

        $this->manager->setScope('store_code');
        $this->manager->setScopeCode('1');
        $this->manager->updatePassword();
    }

    public function testUpdatePasswordReturnsEmptyKeyAndValueImpliesNoDataWriting(): void
    {
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetPassword')
            ->willReturn(['key' => '', 'value' => '']);
        $this->dependencyMocks['configWriter']->expects(static::never())
            ->method('saveConfig');

        $this->manager->updatePassword();
    }

    public function testUpdateClientIdentifierUsingKeyAndValueFromCorrectMethod(): void
    {
        $result = [
            'key' => 'my_key',
            'value' => 'my_value'
        ];
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetClientIdentifier')
            ->willReturn($result);
        $this->dependencyMocks['configWriter']->expects(static::once())
            ->method('saveConfig')
            ->with($result['key'], $result['value'], 'store_code', '1');

        $this->manager->setScope('store_code');
        $this->manager->setScopeCode('1');
        $this->manager->updateClientIdentifier();
    }

    public function testUpdateClientIdentifierReturnsEmptyKeyAndValueImpliesNoDataWriting(): void
    {
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetClientIdentifier')
            ->willReturn(['key' => '', 'value' => '']);
        $this->dependencyMocks['configWriter']->expects(static::never())
            ->method('saveConfig');

        $this->manager->updateClientIdentifier();
    }

    public function testUpdateApiModeUsingKeyAndValueFromCorrectMethod(): void
    {
        $result = [
            'key' => 'my_key',
            'value' => 'my_value'
        ];
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetApiMode')
            ->willReturn($result);
        $this->dependencyMocks['configWriter']->expects(static::once())
            ->method('saveConfig')
            ->with($result['key'], $result['value'], 'store_code', '1');

        $this->manager->setScope('store_code');
        $this->manager->setScopeCode('1');
        $this->manager->updateApiMode();
    }

    public function testUpdateApiModeReturnsEmptyKeyAndValueImpliesNoDataWriting(): void
    {
        $this->dependencyMocks['mapper']->expects(static::once())
            ->method('getTargetApiMode')
            ->willReturn(['key' => '', 'value' => '']);
        $this->dependencyMocks['configWriter']->expects(static::never())
            ->method('saveConfig');

        $this->manager->updateApiMode();
    }

    protected function setUp(): void
    {
        $this->manager = parent::setUpMocks(Manager::class);
    }
}
