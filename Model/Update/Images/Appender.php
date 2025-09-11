<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update\Images;

use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * @internal
 */
class Appender
{
    /**
     * @var PreviewIds
     */
    private PreviewIds $previewIds;

    /**
     * @param PreviewIds $previewIds
     * @codeCoverageIgnore
     */
    public function __construct(PreviewIds $previewIds)
    {
        $this->previewIds = $previewIds;
    }

    /**
     * Appending the image tag on the element
     *
     * @param AbstractElement $element
     * @param string $result
     * @return string
     */
    public function appendImageTagOnElement(AbstractElement $element, string $result): string
    {
        $cut = 0;
        if (str_ends_with($result, '<td class=""></td></tr>')) {
            $cut = -23;
        } elseif (str_ends_with($result, '</tr>')) {
            $cut = -5;
        }

        $ids = $this->previewIds->getIds($element);
        if (count($ids) === 1 && current($ids) === Url::IMAGES_METADATA['kp']['image_id']) {
            $cutResult = substr($result, 0, $cut);
            return $this->getRightSideImageResult($cutResult, current($ids));
        }

        return $this->getBelowFieldImageResult($result, $ids, $cut);
    }

    /**
     * Getting back the below field image result
     *
     * @param string $result
     * @param array $ids
     * @param int $cut
     * @return string
     */
    public function getBelowFieldImageResult(string $result, array $ids, int $cut): string
    {
        $result .= '<tr>';
        if (count($ids) === 1) {
            $result .= '<td></td>';
        }

        foreach ($ids as $id) {
            if ($cut !== 0) {
                $result .= '<td><img id="' .
                    $id .
                    '" src=""></td>';
            }
        }
        $result .= '<td></td></tr>';
        return $result;
    }

    /**
     * Getting back the right side image result
     *
     * @param string $result
     * @param string $imageId
     * @return string
     */
    private function getRightSideImageResult(string $result, string $imageId): string
    {
        return $result . '<td><img id="' . $imageId . '" src=""></td></tr>';
    }

    /**
     * Appending a CSS style so that the field on which the image is shown is displayed on the top on its area
     *
     * @param string $result
     * @return string
     */
    public function appendCssStyleToValueField(string $result): string
    {
        return str_replace('<td class="value"', '<td style="vertical-align:top" class="value"', $result);
    }
}
