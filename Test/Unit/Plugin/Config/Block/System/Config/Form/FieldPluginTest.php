<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Test\Unit\Plugin\Config\Block\System\Config\Form;

use Klarna\AdminSettings\Plugin\Config\Block\System\Config\Form\FieldPlugin;
use Magento\Framework\Data\Form\Element\Select;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Config\Block\System\Config\Form\Field;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Plugin\Config\Block\System\Config\Form\FieldPlugin
 */
class FieldPluginTest extends TestCase
{
    /**
     * @var FieldPlugin
     */
    private FieldPlugin $fieldPlugin;
    /**
     * @var Select
     */
    private Select $element;
    /**
     * @var Field
     */
    private Field $field;

    public function testAfterRenderNoKlarnaTargetFieldImpliesNoChangedResult(): void
    {
        $this->dependencyMocks['previewIds']->expects($this->once())
            ->method('isAppearingForAtLeastOneKlarnaField')
            ->with($this->element)
            ->willReturn(false);

        $expected = 'abc';
        static::assertEquals($expected, $this->fieldPlugin->afterRender($this->field, $expected, $this->element));
    }

    public function testAfterRenderKlarnaTargetFieldImpliesResultIsChanged(): void
    {
        $this->dependencyMocks['previewIds']->expects($this->once())
            ->method('isAppearingForAtLeastOneKlarnaField')
            ->with($this->element)
            ->willReturn(true);

        $this->dependencyMocks['appender']->expects($this->once())
            ->method('appendImageTagOnElement')
            ->with($this->element, 'abc')
            ->willReturn('abcd');

        $this->dependencyMocks['appender']->expects($this->once())
            ->method('appendCssStyleToValueField')
            ->with('abcd')
            ->willReturn('abcde');

        static::assertEquals('abcde', $this->fieldPlugin->afterRender($this->field, 'abc', $this->element));
    }

    protected function setUp(): void
    {
        $this->fieldPlugin = parent::setUpMocks(FieldPlugin::class);

        $this->element = $this->mockFactory->create(Select::class);
        $this->field = $this->mockFactory->create(Field::class);
    }
}