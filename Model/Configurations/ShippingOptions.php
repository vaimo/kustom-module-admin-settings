<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Configurations;

use Klarna\AdminSettings\Model\Configurations\AbstractConfiguration;
use Magento\Store\Api\Data\StoreInterface;

/**
 * @internal
 */
class ShippingOptions extends AbstractConfiguration
{

    /**
     * Getting back the product size unit
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getProductSizeUnit(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'klarna/shipping/product_unit');
    }

    /**
     * Getting back the product length attribute unit
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getProductLengthAttribute(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'klarna/shipping/length');
    }

    /**
     * Getting back the product width attribute unit
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getProductWidthAttribute(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'klarna/shipping/width');
    }

    /**
     * Getting back the product height attribute unit
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getProductHeightAttribute(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'klarna/shipping/height');
    }
}
