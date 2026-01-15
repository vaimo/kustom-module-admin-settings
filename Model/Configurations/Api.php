<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Configurations;

use Klarna\Base\Exception as KlarnaException;
use Magento\Store\Api\Data\StoreInterface;

/**
 * @internal
 */
class Api extends AbstractConfiguration
{

    /**
     * Getting back the username
     *
     * @param StoreInterface $store
     * @param string $currency
     * @return string
     */
    public function getUserName(StoreInterface $store, string $currency): string
    {
        $key = sprintf(
            'klarna/%s/username%s',
            $this->getInfix($store, $currency),
            $this->getCredentialSuffix($store, $currency)
        );

        return $this->getConfigValue($store, $key);
    }

    /**
     * Getting back the password
     *
     * @param StoreInterface $store
     * @param string $currency
     * @return string
     */
    public function getPassword(StoreInterface $store, string $currency): string
    {
        $key = 'klarna/' .
            $this->getInfix($store, $currency) .
            '/password' .
            $this->getCredentialSuffix($store, $currency);

        return $this->decrypt($this->getConfigValue($store, $key));
    }

    /**
     * Getting back the region
     *
     * @deprecad Kustom supports regions without needing different API endpoints, so distinguishing them is no longer necessary.
     *
     * @param StoreInterface $store
     * @param string $currency
     * @return string
     */
    public function getRegion(StoreInterface $store, string $currency): string
    {
        $currency = strtoupper($currency);

        switch ($currency) {
            case 'CAD':
            case 'MXN':
            case 'USD':
                $targetRegion = 'eu';
                break;
            case 'NZD':
            case 'AUD':
                $targetRegion = 'eu';
                break;
            default:
                $targetRegion = 'eu';
                break;
        }

        $regionList = $this->getAllEnabledRegions($store);
        if (in_array($targetRegion, $regionList)) {
            return $targetRegion;
        }

        throw new KlarnaException(__('The region is not supported'));
    }

    /**
     * Returns all enabled regions
     *
     * @param StoreInterface $store
     * @return array
     */
    public function getAllEnabledRegions(StoreInterface $store): array
    {
        return ['eu'];
    }

    /**
     * Getting back all enabled markets
     *
     * @param StoreInterface $store
     * @return array
     */
    public function getAllEnabledMarkets(StoreInterface $store): array
    {
        $regions = $this->getAllEnabledRegions($store);
        $result = [];
        foreach ($regions as $region) {
            switch ($region) {
                case 'eu':
                    $result[$region] = ['eu'];
                    break;
                case 'na':
                    $result[$region] = ['us', 'ca', 'mx'];
                    break;
                case 'oc':
                    $result[$region] = ['au', 'nz'];
                    break;
            }
        }

        return $result;
    }

    /**
     * Returns true if the test mode is used
     *
     * @param StoreInterface $store
     * @param string $currency
     * @return bool
     */
    public function isTestMode(StoreInterface $store, string $currency): bool
    {
        $key = 'klarna/' .
            $this->getInfix($store, $currency) .
            '/api_mode';

        return $this->isFlagSet($store, $key);
    }

    /**
     * Getting back the mode
     *
     * @param StoreInterface $store
     * @param string $currency
     * @return string
     */
    public function getMode(StoreInterface $store, string $currency): string
    {
        if ($this->isTestMode($store, $currency)) {
            return 'playground';
        }

        return 'production';
    }

    /**
     * Getting back the client identifier
     *
     * @param StoreInterface $store
     * @param string $currency
     * @return string
     */
    public function getClientIdentifier(StoreInterface $store, string $currency): string
    {
        $key = 'klarna/' .
            $this->getInfix($store, $currency) .
            '/client_identifier' .
            $this->getCredentialSuffix($store, $currency);

        return $this->getConfigValue($store, $key);
    }

    /**
     * Getting back the api payment code
     *
     * @param StoreInterface $store
     * @param string $currency
     * @return string
     */
    private function getInfix(StoreInterface $store, string $currency): string
    {
        $currency = strtoupper($currency);
        $region = $this->getRegion($store, $currency);

        $regionsAndCurrencies = [
            'eu:'   => 'api_eu',
            'na:USD' => 'api_us',
            'na:CAD' => 'api_ca',
            'na:MXN' => 'api_mx',
            'oc:AUD' => 'api_au',
            'oc:NZD' => 'api_nz'
        ];
        $key = sprintf("%s:%s", $region, $region === 'eu' ? '' : $currency);
        if (isset($regionsAndCurrencies[$key])) {
            return $regionsAndCurrencies[$key];
        }
        throw new KlarnaException(__('Invalid combination of currency and region: ' . $region . ' - ' . $currency));
    }

    /**
     * Getting back the credential suffix
     *
     * @param StoreInterface $store
     * @param string $currency
     * @return string
     */
    private function getCredentialSuffix(StoreInterface $store, string $currency): string
    {
        return $this->isTestMode($store, $currency) ? '_playground' : '_production';
    }

    /**
     * Getting back the api url
     *
     * @param StoreInterface $store
     * @param string $currency
     * @return string
     * @throws KlarnaException
     */
    public function getApiUrl(StoreInterface $store, string $currency): string
    {
        $region = $this->getRegion($store, $currency);
        switch ($region) {
            case 'eu':
                $endpoint = '';
                break;
            case 'na':
                $endpoint = '-na';
                break;
            case 'oc':
                $endpoint = '-oc';
                break;
            default:
                throw new KlarnaException(__('Invalid region: ' . $region));
        }

        if ($this->isTestMode($store, $currency)) {
            return 'https://api.playground.kustom.co';
        }

        return 'https://api' . $endpoint . '.kustom.co';
    }

    /**
     * Getting back the global api url
     *
     * @param StoreInterface $store
     * @param string $currency
     * @return string
     */
    public function getGlobalApiUrl(StoreInterface $store, string $currency): string
    {
        $baseUrl = 'https://api-global.';
        if ($this->isTestMode($store, $currency)) {
            $baseUrl .= 'test.';
        }

        return $baseUrl . 'klarna.com/';
    }
}
