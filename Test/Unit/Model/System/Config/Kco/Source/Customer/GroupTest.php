<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\System\Config\Source\Customer;

use Klarna\AdminSettings\Model\System\Config\Kco\Source\Customer\Group;
use PHPUnit\Framework\MockObject\MockObject;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\System\Config\Kco\Source\Customer\Group
 */
class GroupTest extends TestCase
{
    /**
     * @var Group
     */
    private $model;

    /**
     * @covers ::getAllOptions
     */
    public function testGetallOptions(): void
    {
        $this->dependencyMocks['groupManagement']->method('getLoggedInGroups')
            ->willReturn([]);
        $this->dependencyMocks['converter']->method('toOptionArray')
            ->willReturn([]);

        $expected = [['value' => -1, 'label' => ' ']];
        static::assertEquals($expected, $this->model->getAllOptions());
    }

    /**
     * @covers ::getAllOptions
     */
    public function testGetAllOptionsOfFilledAttribute(): void
    {
        $options = [[
            'value' => '1',
            'label' => 'foo'
        ]];
        $this->dependencyMocks['groupManagement']->method('getLoggedInGroups')
            ->willReturn([]);
        // Expecting different returns for the first and second run of this method
        // verifies if the method is run again and changes the value of _options
        $this->dependencyMocks['converter']->expects(static::atLeastOnce())
            ->method('toOptionArray')
            ->willReturn($options);

        // Running once to prepare for test by filling the class' _options parameter
        $result = $this->model->getAllOptions();

        static::assertEquals($result, $this->model->getAllOptions());
    }

    protected function setUp(): void
    {
        $this->model = parent::setUpMocks(Group::class);
    }
}
