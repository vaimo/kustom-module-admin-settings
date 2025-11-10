<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\System\Config\General;

use Klarna\Base\Helper\VersionInfo;
use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\UrlInterface;

/**
 * @internal
 */
class Reference extends Field
{
    /**
     * @var UrlInterface
     */
    private UrlInterface $urlBuilder;
    /**
     * @var VersionInfo
     */
    private VersionInfo $versionInfo;

    /**
     * @param Context $context
     * @param UrlInterface $urlBuilder
     * @param VersionInfo $versionInfo
     * @codeCoverageIgnore
     */
    public function __construct(
        Context $context,
        UrlInterface $urlBuilder,
        VersionInfo $versionInfo
    ) {
        parent::__construct($context);
        $this->urlBuilder = $urlBuilder;
        $this->versionInfo = $versionInfo;
    }

    /**
     * Getting back the reference text
     *
     * @param AbstractElement $element
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function render(AbstractElement $element)
    {
        $docsUrl = 'https://docs.kustom.co/contents/partners/e-commerce-platforms/magento';
        $troubleshootingUrl = 'https://docs.kustom.co/contents/partners/e-commerce-platforms/adobe-commerce/before-you-start/info-and-faq#troubleshooting';
        $logsUrl = $this->urlBuilder->getUrl('klarna/index/logs');
        $supportUrl = $this->urlBuilder->getUrl('klarna_support/index/support/form/new');

        $versionContent = __('Version') . ': ' . $this->versionInfo->getM2KlarnaVersion();
        $documentationContent = $this->createLinkElement($docsUrl, __('Documentation'));
        $logsContent = $this->createLinkElement($logsUrl, __('Logs'));
        $supportContent = $this->createLinkElement($supportUrl, __('Support'));
        $troubleshootingContent = $this->createLinkElement($troubleshootingUrl, __('Troubleshooting'));
        return
        '<div>' .
            "<h2 style='color: #303030;'>$versionContent</h2>" .
            '<ul style="list-style-position: inside;">' .
                $this->createListItemElement($documentationContent) .
                $this->createListItemElement($logsContent) .
                $this->createListItemElement($supportContent) .
                $this->createListItemElement($troubleshootingContent) .
            '</ul>' .
        '</div>';
    }

    /**
     * Create a <li> element with a content
     *
     * @param string $content
     * @return string
     */
    private function createListItemElement(string $content): string
    {
        return "<li>$content</li>";
    }

    /**
     * Create a <a> element with a link and a phrase that opens a new tab
     *
     * @param string $url
     * @param \Magento\Framework\Phrase $phrase
     * @return string
     */
    private function createLinkElement(string $url, \Magento\Framework\Phrase $phrase): string
    {
        return "<a href='$url' target='_blank'>$phrase</a>";
    }
}
