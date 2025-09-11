<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Configurations;

use Magento\Store\Api\Data\StoreInterface;

/**
 * @internal
 */
class Kec extends AbstractConfiguration
{
    /**
     * Returns true if its enabled
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isEnabled(StoreInterface $store): bool
    {
        return $this->isFlagSet($store, 'payment/kec/enabled');
    }

    /**
     * Returns true if its enabled on the cart page
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isEnabledOnCartPage(StoreInterface $store): bool
    {
        return in_array('cart', $this->getEnabledPositionList($store), true);
    }

    /**
     * Returns true if its enabled on the product page
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isEnabledOnProductPage(StoreInterface $store): bool
    {
        return in_array('product', $this->getEnabledPositionList($store), true);
    }

    /**
     * Returns true if its enabled on the mini cart
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isEnabledOnMiniCart(StoreInterface $store): bool
    {
        return in_array('mini_cart', $this->getEnabledPositionList($store), true);
    }

    /**
     * Getting back the position list
     *
     * @param StoreInterface $store
     * @return array
     */
    private function getEnabledPositionList(StoreInterface $store): array
    {
        return $this->generateArrayResult($this->getConfigValue($store, 'payment/kec/position'));
    }

    /**
     * Getting back the theme
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getTheme(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'payment/kec/theme');
    }

    /**
     * Getting back the shape
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getShape(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'payment/kec/shape');
    }
}
