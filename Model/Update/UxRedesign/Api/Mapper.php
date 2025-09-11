<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update\UxRedesign\Api;

use Klarna\AdminSettings\Model\Update\UxRedesign\AbstractMapper;
use Klarna\Base\Exception as KlarnaException;
use Magento\Store\Api\Data\StoreInterface;

/**
 * @internal
 */
class Mapper extends AbstractMapper
{
    /**
     * @var LegacyConfiguration
     */
    private LegacyConfiguration $legacyConfiguration;
    /**
     * @var string
     */
    private string $currency;
    /**
     * @var ShopConfiguration
     */
    private ShopConfiguration $shopConfiguration;

    /**
     * @param LegacyConfiguration $legacyConfiguration
     * @param ShopConfiguration $shopConfiguration
     * @codeCoverageIgnore
     */
    public function __construct(LegacyConfiguration $legacyConfiguration, ShopConfiguration $shopConfiguration)
    {
        $this->legacyConfiguration = $legacyConfiguration;
        $this->shopConfiguration = $shopConfiguration;
    }

    /**
     * Preparing the mapping data
     *
     * @param string $scope
     * @param string $scopeCode
     */
    public function prepareMappingData(string $scope, string $scopeCode): void
    {
        $this->mappingData = [
            'api_version' => $this->legacyConfiguration->getApiVersion($scope, $scopeCode),
            'merchant_id' => $this->legacyConfiguration->getMerchantId($scope, $scopeCode),
            'shared_secret' => $this->legacyConfiguration->getSharedSecret($scope, $scopeCode),
            'osm_client_identifier' => $this->legacyConfiguration->getOsmClientIdentifier($scope, $scopeCode),
            'kec_client_identifier' => $this->legacyConfiguration->getKecClientIdentifier($scope, $scopeCode),
            'is_test_mode' => $this->legacyConfiguration->isTestModeEnabled($scope, $scopeCode)
        ];

        $this->currency = $this->shopConfiguration->getDefaultCurrencyCode($scope, $scopeCode);
        if ($this->currency === '') {
            throw new KlarnaException(__('Default currency code is not set.'));
        }
    }

    /**
     * Getting back the target username key value pair
     *
     * @return string[]
     */
    public function getTargetUserName(): array
    {
        $apiMode = $this->getConvertedTargetRegion();
        if (empty($apiMode['key']) ||
            empty($apiMode['value']) ||
            empty($this->mappingData['merchant_id'])
        ) {
            return $this->createResult('', '');
        }

        $nameSuffix = $this->mappingData['is_test_mode'] ? 'playground' : 'production';

        $key = 'klarna/api_' . $apiMode['value'] . '/username_' . $nameSuffix;
        return $this->createResult($key, $this->mappingData['merchant_id']);
    }

    /**
     * Getting back the target password key value pair
     *
     * @return string[]
     */
    public function getTargetPassword(): array
    {
        $apiMode = $this->getConvertedTargetRegion();
        if (empty($apiMode['key']) ||
            empty($apiMode['value']) ||
            empty($this->mappingData['shared_secret'])
        ) {
            return $this->createResult('', '');
        }

        $nameSuffix = 'playground';
        if (!$this->mappingData['is_test_mode']) {
            $nameSuffix = 'production';
        }

        $key = 'klarna/api_' . $apiMode['value'] . '/password_' . $nameSuffix;
        return $this->createResult($key, $this->mappingData['shared_secret']);
    }

    /**
     * Getting back the key value pair for the target API mode
     *
     * @return array
     */
    public function getTargetRegion(): array
    {
        switch ($this->mappingData['api_version']) {
            case 'na':
            case 'kp_na':
                return $this->createResult('klarna/api/region', 'na');
            case 'uk':
            case 'nl':
            case 'dach_v3':
            case 'kp_eu':
                return $this->createResult('klarna/api/region', 'eu');
            case 'kp_oc':
                return $this->createResult('klarna/api/region', 'oc');
        }

        return $this->createResult('', '');
    }

    /**
     * Getting back the converted target region
     *
     * @return array
     */
    private function getConvertedTargetRegion(): array
    {
        $targetRegion = $this->getTargetRegion();

        if ($targetRegion['value'] === 'eu') {
            return $targetRegion;
        }
        $currencyMapping = [
            'USD' => 'us',
            'CAD' => 'ca',
            'MXN' => 'mx',
            'AUD' => 'au',
            'NZD' => 'nz'
        ];

        if (isset($currencyMapping[$this->currency])) {
            $targetRegion['value'] = $currencyMapping[$this->currency];
        }

        return $targetRegion;
    }

    /**
     * Getting back the target client identifier key value pair
     *
     * @return string[]
     */
    public function getTargetClientIdentifier(): array
    {
        $apiMode = $this->getConvertedTargetRegion();
        if (empty($apiMode['key']) ||
            empty($apiMode['value']) ||
            (empty($this->mappingData['osm_client_identifier']) && empty($this->mappingData['kec_client_identifier']))
        ) {
            return $this->createResult('', '');
        }

        $nameSuffix = $this->mappingData['is_test_mode'] ? 'playground' : 'production';
        $key = 'klarna/api_' . $apiMode['value'] . '/client_identifier_' . $nameSuffix;

        if (!empty($this->mappingData['kec_client_identifier'])) {
            return $this->createResult($key, $this->mappingData['kec_client_identifier']);
        }

        return $this->createResult($key, $this->mappingData['osm_client_identifier']);
    }

    /**
     * Getting back the target test mode key value pair
     *
     * @return string[]
     */
    public function getTargetApiMode(): array
    {
        $apiMode = $this->getConvertedTargetRegion();
        if (empty($apiMode['key']) || empty($apiMode['value'])) {
            return $this->createResult('', '');
        }

        $key = 'klarna/api_' . $apiMode['value'] . '/api_mode';

        return $this->createResult($key, (string)(int)$this->mappingData['is_test_mode']);
    }
}
