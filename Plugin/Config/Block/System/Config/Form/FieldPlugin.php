<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Plugin\Config\Block\System\Config\Form;

use Klarna\AdminSettings\Model\Update\Images\Appender;
use Klarna\AdminSettings\Model\Update\Images\PreviewIds;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * @internal
 */
class FieldPlugin
{
    /**
     * @var PreviewIds
     */
    private PreviewIds $previewIds;
    /**
     * @var Appender
     */
    private Appender $appender;

    /**
     * @param PreviewIds $previewIds
     * @param Appender $appender
     * @codeCoverageIgnore
     */
    public function __construct(PreviewIds $previewIds, Appender $appender)
    {
        $this->previewIds = $previewIds;
        $this->appender = $appender;
    }

    /**
     * Adding image to the field
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @param Field $subject
     * @param string $result
     * @param AbstractElement $element
     * @return string
     */
    public function afterRender(Field $subject, string $result, AbstractElement $element): string
    {
        if ($this->previewIds->isAppearingForAtLeastOneKlarnaField($element)) {
            $result = $this->appender->appendImageTagOnElement($element, $result);
            $result = $this->appender->appendCssStyleToValueField($result);
        }

        return $result;
    }
}
