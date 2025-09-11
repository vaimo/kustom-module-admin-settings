<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Block\Adminhtml\System\Config\Osm;

use Klarna\AdminSettings\Block\Adminhtml\System\Config\Osm\Position;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Block\Adminhtml\System\Config\Osm\Position
 */
class PositionTest extends TestCase
{
    /**
     * @var Position
     */
    private Position $position;

    public function testGetValuesNoFieldsDefinedImpliesEmptyResult(): void
    {
        $this->dependencyMocks['placement']->method('toOptionArray')
            ->willReturn([]);
        static::assertEmpty($this->position->getValues());
    }

    public function testCalculateAndSetCheckedFieldsMultipleFieldsCheckedImpliesReturningTrue(): void
    {
        $this->position->setData('config_data', ['klarna/osm/position' => 'cart,product']);
        $this->position->calculateAndSetCheckedFields();

        static::assertTrue($this->position->isChecked('cart'));
        static::assertTrue($this->position->isChecked('product'));
    }

    public function testGetValuesFieldsDefinedImpliesReturnedResultWithValues(): void
    {
        $this->dependencyMocks['placement']->method('toOptionArray')
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

    public function testCalculateAndSetCheckedFieldsFieldNameIsCheckedImpliesReturningTrue(): void
    {
        $this->position->setData('config_data', ['klarna/osm/position' => 'cart']);
        $this->position->calculateAndSetCheckedFields();

        static::assertTrue($this->position->isChecked('cart'));
    }

    public function testGetReadOnlyValues(): void
    {
        static::assertSame([], $this->position->getReadOnlyValues());
    }

    protected function setUp(): void
    {
        $this->position = parent::setUpMocks(Position::class);
    }
}
