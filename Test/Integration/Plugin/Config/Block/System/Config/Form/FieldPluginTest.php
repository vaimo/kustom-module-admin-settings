<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Test\Integration\Plugin\Config\Block\System\Config\Form;

use Klarna\AdminSettings\Model\Update\Images\Url;
use Klarna\AdminSettings\Plugin\Config\Block\System\Config\Form\FieldPlugin;
use Klarna\Base\Test\Integration\Helper\GenericTestCase;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\Select;

/**
 * @internal
 */
class FieldPluginTest extends GenericTestCase
{
    /**
     * @var FieldPlugin
     */
    private $fieldPlugin;
    /**
     * @var Field
     */
    private $field;
    /**
     * @var Select
     */
    private $element;

    /**
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     */
    public function testAfterRenderNoKlarnaFieldImpliesReturningOriginalResult(): void
    {
        $this->element->setData('name', 'sdfsdfsd');

        $expected = '<tr><td class=""></td></tr>';
        $this->assertEquals($expected, $this->fieldPlugin->afterRender($this->field, $expected, $this->element));
    }

    /**
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     */
    public function testAfterRenderKlarnaFieldImpliesReturningUpdatedResult(): void
    {
        $this->element->setData('name', Url::IMAGES_METADATA['kp']['target_field']);

        $input = '<tr><td class=""></td></tr>';
        $this->assertEquals('<tr><td><img id="' . Url::IMAGES_METADATA['kp']['image_id'] . '" src=""></td></tr>', $this->fieldPlugin->afterRender($this->field, $input, $this->element));
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->fieldPlugin = $this->objectManager->get(FieldPlugin::class);

        $this->field = $this->objectManager->get(Field::class);
        $this->element = $this->objectManager->get(Select::class);
        $form = $this->objectManager->get(\Magento\Framework\Data\Form::class);
        $this->element->setForm($form);
    }
}
