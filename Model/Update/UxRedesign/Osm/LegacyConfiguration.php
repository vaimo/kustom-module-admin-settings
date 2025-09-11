<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update\UxRedesign\Osm;

use Klarna\AdminSettings\Model\Update\UxRedesign\AbstractConfiguration;
use Magento\Store\Api\Data\StoreInterface;

/**
 * @internal
 */
class LegacyConfiguration extends AbstractConfiguration
{

    /**
     * Returns true if osm on the product page is enabled
     *
     * @param string $scope
     * @param string $scopeCode
     * @return bool
     */
    public function isProductEnabledFlag(string $scope, string $scopeCode): bool
    {
        return $this->isSetFlag($scope, $scopeCode, 'klarna/osm/product_enabled');
    }

    /**
     * Returns true if osm on the cart page is enabled
     *
     * @param string $scope
     * @param string $scopeCode
     * @return bool
     */
    public function isCartEnabled(string $scope, string $scopeCode): bool
    {
        return $this->isSetFlag($scope, $scopeCode, 'klarna/osm/cart_enabled');
    }

    /**
     * Returns true if osm on the footer place is enabled
     *
     * @param string $scope
     * @param string $scopeCode
     * @return bool
     */
    public function isFooterEnabled(string $scope, string $scopeCode): bool
    {
        return $this->isSetFlag($scope, $scopeCode, 'klarna/osm/footer_enabled');
    }

    /**
     * Getting back the theme
     *
     * @param string $scope
     * @param string $scopeCode
     * @return string
     */
    public function getTheme(string $scope, string $scopeCode): string
    {
        return $this->getConfig($scope, $scopeCode, 'klarna/osm/theme');
    }
}
