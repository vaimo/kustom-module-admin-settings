<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Test\Unit\Block\Adminhtml\System\Config\Siwk;

use Klarna\AdminSettings\Block\Adminhtml\System\Config\Siwk\Scope;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass Klarna\AdminSettings\Block\Adminhtml\System\Config\Siwk\Scope
 */
class ScopeTest extends TestCase
{
    /**
     * @var Scope
     */
    private Scope $scope;

    public function testGetValuesNoFieldsDefinedImpliesEmptyResult(): void
    {
        $this->dependencyMocks['scope']->method('toOptionArray')
            ->willReturn([]);
        static::assertEmpty($this->scope->getValues());
    }

    public function testGetValuesMultipleFieldsDefinedImpliesReturnedResultWithValues(): void
    {
        $this->dependencyMocks['scope']->method('toOptionArray')
            ->willReturn(
                [
                    [
                        'value' => 'profile:email',
                        'label' => __('Email address'),
                    ],
                    [
                        'value' => 'profile:date_of_birth',
                        'label' => __('Date of birth'),
                    ]
                ]
            );
        static::assertNotEmpty($this->scope->getValues());
    }

    public function testGetValuesFieldsDefinedImpliesReturnedResultWithValues(): void
    {
        $this->dependencyMocks['scope']->method('toOptionArray')
            ->willReturn(
                [
                    [
                        'value' => 'profile:email',
                        'label' => __('Email address'),
                    ]
                ]
            );
        static::assertNotEmpty($this->scope->getValues());
    }

    public function testIsCheckedEmptyCheckedListImpliesReturningFalse(): void
    {
        static::assertFalse($this->scope->isChecked('profile:country'));
    }

    public function testCalculateAndSetCheckedFieldsFieldNameIsNotCheckedImpliesReturningFalse(): void
    {
        $this->scope->calculateAndSetCheckedFields();
        static::assertFalse($this->scope->isChecked('profile:country'));
    }

    public function testCalculateAndSetCheckedFieldsMultipleFieldsCheckedImpliesReturningTrue(): void
    {
        $this->scope->setData('config_data', ['klarna/siwk/scope' => 'profile:country,profile:locale']);
        $this->scope->calculateAndSetCheckedFields();

        static::assertTrue($this->scope->isChecked('profile:country'));
        static::assertTrue($this->scope->isChecked('profile:locale'));
    }

    public function testCalculateAndSetCheckedFieldsFieldNameIsCheckedImpliesReturningTrue(): void
    {
        $this->scope->setData('config_data', ['klarna/siwk/scope' => 'profile:country']);
        $this->scope->calculateAndSetCheckedFields();

        static::assertTrue($this->scope->isChecked('profile:country'));
    }

    public function testGetReadOnlyValuesReturnsEmpty(): void
    {
        static::assertSame([], $this->scope->getReadOnlyValues());
    }

    public function testGetReadOnlyValuesReturnsValues(): void
    {
        $this->dependencyMocks['defaultScope']->method('toOptionArray')
            ->willReturn([
                [
                    'value' => 'profile:email',
                    'label' => __('Email address')
                ]
            ]);

        static::assertSame(['profile:email' => 'Email address'], $this->scope->getReadOnlyValues());
    }

    protected function setUp(): void
    {
        $this->scope = parent::setUpMocks(Scope::class);
    }
}
