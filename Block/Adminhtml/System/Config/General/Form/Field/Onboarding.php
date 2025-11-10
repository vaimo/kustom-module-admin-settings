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
 * Getting back the Kustom Merchant Onboarding text with link
 *
 * @internal
 */
class Onboarding extends Field
{
    public const URL = 'https://portal.kustom.co/';
    public const PRIVACY_URL = 'https://www.kustom.co/privacy-policy/';

    /**
     * Retrieve HTML markup for given form element
     *
     * @param AbstractElement $element
     * @return string
     * @SuppressWarnings(PMD.UnusedFormalParameter)
     */
    public function render(AbstractElement $element)
    {
        $urlText = __('Kustom Merchant Portal');
        $urlTag = '<p style="display:inline"><a href="' . self::URL . '" target="_blank">' . $urlText . '</a></p>';

        $privacyUrlText = __('Kustom Merchant Privacy Policy');
        $privacyUrlTag = '<p style="display:inline"><a href="' . self::PRIVACY_URL . '" target="_blank">' .
            $privacyUrlText . '</a></p>';
        $privacyText = __('By activating Kustom using API credentials you agree to and accept the %1.', $privacyUrlTag);

        return  __("To unlock the plugin's features, enter your credentials. Get the client identifier " .
            "and API credentials from the %1, under Integrations.", $urlTag) . "<br/><br/>" .
            "<b>" . $privacyText . "<b/>";
    }
}
