<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Update\Images;

use Klarna\AdminSettings\Model\Update\Images\Appender;
use Magento\Framework\Data\Form\Element\Select;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Update\Images\Appender
 */
class AppenderTest extends TestCase
{
    /**
     * @var Appender
     */
    private Appender $appender;
    /**
     * @var Select
     */
    private Select $element;

    public function testAppendImageTagOnElementStringIsKpImpliesReturningKpResult(): void
    {
        $this->element->method('getName')->willReturn('groups[klarna_section][groups][klarna_kp_required][fields][active][value]');
        $this->dependencyMocks['previewIds']->method('getIds')->willReturn(['klarna_kp_image']);

        $input = 'abc<td class=""></td></tr>';
        $expected = 'abc<td><img id="klarna_kp_image" src=""></td></tr>';

        static::assertEquals($expected, $this->appender->appendImageTagOnElement($this->element, $input));
    }

    public function testAppendImageTagOnElementStringIsNotKpAndJustOneElementFoundImpliesReturningSingleImageResult(): void
    {
        $this->element->method('getName')->willReturn('groups[klarna_section][groups][osm][groups][theme_and_placements][fields][position][value]');
        $this->dependencyMocks['previewIds']->method('getIds')->willReturn(['aa']);

        $input = 'abc<td class=""></td></tr>';
        $expected = 'abc<td class=""></td></tr><tr><td></td><td><img id="aa" src=""></td><td></td></tr>';

        static::assertEquals($expected, $this->appender->appendImageTagOnElement($this->element, $input));
    }

    public function testAppendImageTagOnElementStringIsNotKpAndThreeElementFoundImpliesReturningImageResultWithThreeImgElements(): void
    {
        $this->element->method('getName')->willReturn('groups[klarna_section][groups][osm][groups][theme_and_placements][fields][position][value]');
        $this->dependencyMocks['previewIds']->method('getIds')->willReturn(['aa', 'bb']);

        $input = 'abc<td class=""></td></tr>';
        $expected = 'abc<td class=""></td></tr><tr><td><img id="aa" src=""></td><td><img id="bb" src=""></td><td></td></tr>';

        static::assertEquals($expected, $this->appender->appendImageTagOnElement($this->element, $input));
    }

    public function testAppendCssStyleToValueFieldInputMatchedImpliesReturningUpdatedString(): void
    {
        $input = 'abc<td class="value"></td></tr>';
        $expected = 'abc<td style="vertical-align:top" class="value"></td></tr>';

        static::assertEquals($expected, $this->appender->appendCssStyleToValueField($input));
    }

    public function testAppendCssStyleToValueFieldInputDoesNotMatchedImpliesReturningOriginalString(): void
    {
        $expected = 'abc<td class=""></td></tr>';
        static::assertEquals($expected, $this->appender->appendCssStyleToValueField($expected));
    }

    protected function setUp(): void
    {
        $this->appender = parent::setUpMocks(Appender::class);
        $this->element = $this->mockFactory->create(Select::class);
    }
}
