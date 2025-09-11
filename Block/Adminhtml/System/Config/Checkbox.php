<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Block\Adminhtml\System\Config;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Data\OptionSourceInterface;

/**
 * @internal
 */
abstract class Checkbox extends Field
{
    /**
     * @var string
     */
    protected $_template = 'Klarna_AdminSettings::system/config/checkbox.phtml';

    /**
     * @var array
     */
    private array $checkedValues = [];
    /**
     * @var OptionSourceInterface
     */
    protected OptionSourceInterface $optionSource;

    /**
     * Retrieving element HTML markup.
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element): string
    {
        $this->setNamePrefix($element->getName())
            ->setHtmlId($element->getHtmlId());
        return $this->_toHtml();
    }

    /**
     * Getting back the values
     *
     * @return array
     */
    public function getValues(): array
    {
        $values = [];
        foreach ($this->optionSource->toOptionArray() as $value) {
            $values[$value['value']] = $value['label'];
        }

        return $values;
    }

    /**
     * Returns true if the checkbox field is checked
     *
     * @param  string $name
     * @return boolean
     */
    public function isChecked(string $name): bool
    {
        return in_array($name, $this->checkedValues, true);
    }

    /**
     * Getting back the checked values
     *
     * @return void
     */
    public function calculateAndSetCheckedFields(): void
    {
        $configs = $this->getConfigData();
        $configs = $configs[$this->getConfigPath()] ?? '';

        $this->checkedValues = explode(',', $configs);
    }

    /**
     * Getting back the config path
     *
     * @return string
     */
    abstract protected function getConfigPath(): string;

    /**
     * Getting back default values
     *
     * @return array
     */
    abstract public function getReadOnlyValues(): array;
}
