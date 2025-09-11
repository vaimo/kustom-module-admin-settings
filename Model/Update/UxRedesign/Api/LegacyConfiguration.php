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
use Magento\Store\Api\Data\StoreInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * @internal
 */
class LegacyConfiguration extends AbstractConfiguration
{

    /**
     * Getting back the API version
     *
     * @param string $scope
     * @param string $scopeCode
     * @return string
     */
    public function getApiVersion(string $scope, string $scopeCode): string
    {
        return $this->getConfig($scope, $scopeCode, 'klarna/api/api_version');
    }

    /**
     * Getting back the merchant id
     *
     * @param string $scope
     * @param string $scopeCode
     * @return string
     */
    public function getMerchantId(string $scope, string $scopeCode): string
    {
        return $this->getConfig($scope, $scopeCode, 'klarna/api/merchant_id');
    }

    /**
     * Getting back the shared secret
     *
     * @param string $scope
     * @param string $scopeCode
     * @return string
     */
    public function getSharedSecret(string $scope, string $scopeCode): string
    {
        return $this->getConfig($scope, $scopeCode, 'klarna/api/shared_secret');
    }

    /**
     * Returns true if the test mode is enabled
     *
     * @param string $scope
     * @param string $scopeCode
     * @return bool
     */
    public function isTestModeEnabled(string $scope, string $scopeCode): bool
    {
        return $this->isSetFlag($scope, $scopeCode, 'klarna/api/test_mode');
    }

    /**
     * Getting back the KEC client identifier
     *
     * @param string $scope
     * @param string $scopeCode
     * @return string
     */
    public function getKecClientIdentifier(string $scope, string $scopeCode): string
    {
        return $this->getConfig($scope, $scopeCode, 'payment/kec/client_identifier');
    }

    /**
     * Getting back the OSM client identifier
     *
     * @param string $scope
     * @param string $scopeCode
     * @return string
     */
    public function getOsmClientIdentifier(string $scope, string $scopeCode): string
    {
        return $this->getConfig($scope, $scopeCode, 'klarna/osm/data_id');
    }
}
