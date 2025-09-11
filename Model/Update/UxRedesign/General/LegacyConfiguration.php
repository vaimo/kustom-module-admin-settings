<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update\UxRedesign\General;

use Klarna\AdminSettings\Model\Update\UxRedesign\AbstractConfiguration;

/**
 * @internal
 */
class LegacyConfiguration extends AbstractConfiguration
{

    /**
     * Returns true if just specific countries are allowed
     *
     * @param string $scope
     * @param string $scopeCode
     * @return string
     */
    public function getAllowSpecificCountry(string $scope, string $scopeCode): string
    {
        return $this->getConfig($scope, $scopeCode, 'payment/klarna_kp/allowspecific');
    }

    /**
     * Getting back the list of specific countries
     *
     * @param string $scope
     * @param string $scopeCode
     * @return string
     */
    public function getSpecificCountryList(string $scope, string $scopeCode): string
    {
        return $this->getConfig($scope, $scopeCode, 'payment/klarna_kp/specificcountry');
    }
}
