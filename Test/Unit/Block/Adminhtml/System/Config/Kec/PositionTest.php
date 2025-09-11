<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Block\Adminhtml\System\Config\Kec;

use Klarna\AdminSettings\Block\Adminhtml\System\Config\Kec\Position;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Block\Adminhtml\System\Config\Kec\Position
 */
class PositionTest extends TestCase
{
    /**
     * @var Position
     */
    private Position $position;

    public function testGetValuesNoFieldsDefinedImpliesEmptyResult(): void
    {
        $this->dependencyMocks['sourcePosition']->method('toOptionArray')
            ->willReturn([]);
        static::assertEmpty($this->position->getValues());
    }

    public function testGetValuesFieldsDefinedImpliesReturnedResultWithValues(): void
    {
        $this->dependencyMocks['sourcePosition']->method('toOptionArray')
            ->willReturn(
                [
                    [
                        'value' => 'cart',
                        'label' => __('Cart'),
                    ]
                ]
            );
        static::assertNotEmpty($this->position->getValues());
    }

    public function testIsCheckedEmptyCheckedListImpliesReturningFalse(): void
    {
        static::assertFalse($this->position->isChecked('cart'));
    }

    public function testCalculateAndSetCheckedFieldsFieldNameIsNotCheckedImpliesReturningFalse(): void
    {
        $this->position->calculateAndSetCheckedFields();
        static::assertFalse($this->position->isChecked('cart'));
    }

    protected function setUp(): void
    {
        $this->position = parent::setUpMocks(Position::class);
    }
}
