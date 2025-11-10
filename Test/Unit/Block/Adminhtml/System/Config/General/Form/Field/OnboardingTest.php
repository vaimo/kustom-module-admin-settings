<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Block\Adminhtml\System\Config\General\Form\Field;

use Klarna\AdminSettings\Block\Adminhtml\System\Config\General\Form\Field\Onboarding;
use Klarna\Base\Test\Unit\Mock\MockFactory;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Klarna\Base\Test\Unit\Mock\TestObjectFactory;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Block\Adminhtml\System\Config\General\Form\Field\Onboarding
 */
class OnboardingTest extends TestCase
{
    /**
     * @var Onboarding
     */
    private Onboarding $onboarding;
    /**
     * @var AbstractElement|MockObject
     */
    private $abstractElement;

    /**
     * No onboarding URL is set, return rendered element markup.
     *
     * @covers ::render
     */
    public function testRenderReturnsCorrectUrl(): void
    {
        $expected = 'To unlock the plugin\'s features, enter your credentials. Get the client identifier ' .
            'and API credentials from the <p style="display:inline"><a href="https://portal.kustom.co/" ' .
            'target="_blank">Kustom Merchant Portal</a></p>, under Integrations.' . "<br/><br/>" .
            '<b>By activating Kustom using API credentials you agree to and accept the ' .
            '<p style="display:inline"><a href="https://www.kustom.co/privacy-policy/" ' . 
            'target="_blank">Kustom Merchant Privacy Policy</a></p>.<b/>';

        $actual = $this->onboarding->render($this->abstractElement);
        static::assertEquals($expected, $actual);
    }

    protected function setUp(): void
    {
        $this->onboarding = parent::setUpMocks(Onboarding::class);
        $this->abstractElement = $this->mockFactory->create(AbstractElement::class);
    }
}
