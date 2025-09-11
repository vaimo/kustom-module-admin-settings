<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Block\Adminhtml\System\Config\General\Form\Field;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * Getting back the Klarna Merchant Onboarding text with link
 *
 * @internal
 */
class Onboarding extends Field
{
    public const URL = 'https://portal.klarna.com/signup';
    public const PRIVACY_URL = 'https://portal.klarna.com/privacy-policy';

    /**
     * Retrieve HTML markup for given form element
     *
     * @param AbstractElement $element
     * @return string
     * @SuppressWarnings(PMD.UnusedFormalParameter)
     */
    public function render(AbstractElement $element)
    {
        $urlText = __('Klarna Merchant Portal');
        $urlTag = '<p style="display:inline"><a href="' . self::URL . '" target="_blank">' . $urlText . '</a></p>';

        $privacyUrlText = __('Klarna Merchant Privacy Notice');
        $privacyUrlTag = '<p style="display:inline"><a href="' . self::PRIVACY_URL . '" target="_blank">' .
            $privacyUrlText . '</a></p>';
        $privacyText = __('By activating Klarna using API credentials you agree to and accept the %1.', $privacyUrlTag);

        return  __("To unlock the plugin's features, enter your credentials. Get the client identifier " .
            "and API credentials from the %1, under Settings.", $urlTag) . "<br/><br/>" .
            "<b>" . $privacyText . "<b/>";
    }
}
