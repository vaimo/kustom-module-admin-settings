<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Test\Unit\Block\Adminhtml\System\Config\Api;

use Klarna\AdminSettings\Block\Adminhtml\System\Config\Api\Region;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass Klarna\AdminSettings\Block\Adminhtml\System\Config\Api\Region
 */
class RegionTest extends TestCase
{
    /**
     * @var Region
     */
    private Region $region;

    public function testGetValuesNoFieldsDefinedImpliesEmptyResult(): void
    {
        $this->dependencyMocks['version']->method('toOptionArray')
            ->willReturn([]);
        static::assertEmpty($this->region->getValues());
    }

    public function testCalculateAndSetCheckedFieldsMultipleFieldsCheckedImpliesReturningTrue(): void
    {
        $this->region->setData('config_data', ['klarna/api/region' => 'eu,us']);
        $this->region->calculateAndSetCheckedFields();

        static::assertTrue($this->region->isChecked('eu'));
        static::assertTrue($this->region->isChecked('us'));
    }

    public function testGetValuesFieldsDefinedImpliesReturnedResultWithValues(): void
    {
        $this->dependencyMocks['version']->method('toOptionArray')
            ->willReturn(
                [
                    [
                        'value' => 'eu',
                        'label' => __('Europe'),
                    ]
                ]
            );
        static::assertNotEmpty($this->region->getValues());
    }

    public function testIsCheckedEmptyCheckedListImpliesReturningFalse(): void
    {
        static::assertFalse($this->region->isChecked('eu'));
    }

    public function testCalculateAndSetCheckedFieldsFieldNameIsNotCheckedImpliesReturningFalse(): void
    {
        $this->region->calculateAndSetCheckedFields();
        static::assertFalse($this->region->isChecked('eu'));
    }

    public function testCalculateAndSetCheckedFieldsFieldNameIsCheckedImpliesReturningTrue(): void
    {
        $this->region->setData('config_data', ['klarna/api/region' => 'eu']);
        $this->region->calculateAndSetCheckedFields();

        static::assertTrue($this->region->isChecked('eu'));
    }

    public function testGetReadOnlyValues(): void
    {
        static::assertSame([], $this->region->getReadOnlyValues());
    }

    protected function setUp(): void
    {
        $this->region = parent::setUpMocks(Region::class);
    }
}
