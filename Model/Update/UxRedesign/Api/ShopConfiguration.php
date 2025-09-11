<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update\UxRedesign\Api;

use Klarna\AdminSettings\Model\Update\UxRedesign\AbstractConfiguration;
use Magento\Directory\Model\Currency;

/**
 * @internal
 */
class ShopConfiguration extends AbstractConfiguration
{

    /**
     * Getting back the default currency code
     *
     * @param string $scope
     * @param string $scopeCode
     * @return string
     */
    public function getDefaultCurrencyCode(string $scope, string $scopeCode): string
    {
        return $this->getConfig($scope, $scopeCode, Currency::XML_PATH_CURRENCY_DEFAULT);
    }
}
