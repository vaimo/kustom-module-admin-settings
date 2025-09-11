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
class Osm extends AbstractConfiguration
{
    /**
     * Returns true if its enabled
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isEnabled(StoreInterface $store): bool
    {
        return $this->isFlagSet($store, 'klarna/osm/enabled');
    }

    /**
     * Returns true if its enabled on the cart page
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isEnabledOnCartPage(StoreInterface $store): bool
    {
        return in_array('cart', $this->getPositionList($store), true);
    }

    /**
     * Returns true if its enabled on the cart page
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isEnabledOnProductPage(StoreInterface $store): bool
    {
        return in_array('product', $this->getPositionList($store), true);
    }

    /**
     * Returns true if its enabled on the cart page
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isEnabledOnFooter(StoreInterface $store): bool
    {
        return in_array('footer', $this->getPositionList($store), true);
    }

    /**
     * Getting back the position list
     *
     * @param StoreInterface $store
     * @return array
     */
    private function getPositionList(StoreInterface $store): array
    {
        return $this->generateArrayResult($this->getConfigValue($store, 'klarna/osm/position'));
    }

    /**
     * Getting back the theme value
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getTheme(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'klarna/osm/theme');
    }

    /**
     * Returns true if the theme is custom
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isCustomTheme(StoreInterface $store): bool
    {
        return $this->getTheme($store) === 'custom';
    }

    /**
     * Getting back the custom theme name
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getCustomThemeName(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'klarna/osm/custom_theme_name');
    }
}
