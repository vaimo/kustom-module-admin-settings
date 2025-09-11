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
class PreviewIds
{
    /**
     * Returns true if the element is a target Klarna field
     *
     * @param AbstractElement $element
     * @return bool
     */
    public function isAppearingForAtLeastOneKlarnaField(AbstractElement $element): bool
    {
        foreach (Url::IMAGES_METADATA as $imageMetaData) {
            if ($this->isMatching($imageMetaData, $element)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Getting back the list of image ids for the element name
     *
     * @param AbstractElement $element
     * @return array
     */
    public function getIds(AbstractElement $element): array
    {
        $ids = [];
        foreach (Url::IMAGES_METADATA as $imageMetaData) {
            if ($this->isMatching($imageMetaData, $element)) {
                $ids[] = $imageMetaData['image_id'];
            }
        }

        return $ids;
    }

    /**
     * Returns true if the element is a target Klarna field
     *
     * @param array $urlEntry
     * @param AbstractElement $element
     * @return bool
     */
    private function isMatching(array $urlEntry, AbstractElement $element): bool
    {
        return str_starts_with($urlEntry['target_field'], $element->getName());
    }
}
