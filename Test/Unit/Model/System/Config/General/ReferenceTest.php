<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\System\Config\General;

use Klarna\AdminSettings\Model\System\Config\General\Reference;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Framework\Data\Form\Element\Text;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\System\Config\General\Reference
 */
class ReferenceTest extends TestCase
{
    /**
     * @var Reference
     */
    private $model;

    /**
     * @covers ::render()
     */
    public function testRenderReturnResult(): void
    {
        $this->dependencyMocks['urlBuilder']->method('getUrl')
            ->will($this->returnCallback(function ($input) {
                if ($input === 'klarna/index/logs') {
                    return 'logs_url';
                } elseif ($input === 'klarna_support/index/support/form/new') {
                    return 'support_url';
                }

                return '';
            }));
        $this->dependencyMocks['versionInfo']->method('getM2KlarnaVersion')
            ->willReturn('1.2.3');

        $element = $this->mockFactory->create(Text::class);

        $docsUrl = 'https://docs.kustom.co/v3/resources/partners/e-commerce-platforms/adobe-commerce/before-you-start/extension-components';
        $troubleshootingUrl = 'https://docs.kustom.co/v3/resources/partners/e-commerce-platforms/adobe-commerce/introduction#troubleshooting';

        $expected =
            '<div>' .
                "<h2 style='color: #303030;'>Version: 1.2.3</h2>" .
                '<ul style="list-style-position: inside;">' .
                    "<li><a href='$docsUrl' target='_blank'>Documentation</a></li>" .
                    "<li><a href='logs_url' target='_blank'>Logs</a></li>" .
                    "<li><a href='support_url' target='_blank'>Support</a></li>" .
                    "<li><a href='$troubleshootingUrl' target='_blank'>Troubleshooting</a></li>" .
                '</ul>' .
            '</div>';
        static::assertSame($expected, $this->model->render($element));
    }

    protected function setUp(): void
    {
        $this->model = parent::setUpMocks(Reference::class);
    }
}
