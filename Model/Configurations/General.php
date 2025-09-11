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
class General extends AbstractConfiguration
{

    /**
     * Returns true if the country is allowed
     *
     * @param StoreInterface $store
     * @param string $country
     * @return bool
     */
    public function isCountryAllowed(StoreInterface $store, string $country): bool
    {
        if ($this->areAllCountriesAllowed($store)) {
            return true;
        }

        return in_array($country, $this->getCountryList($store));
    }

    /**
     * Returns true if all countries are allowed
     *
     * @param StoreInterface $store
     * @return bool
     */
    private function areAllCountriesAllowed(StoreInterface $store): bool
    {
        return !$this->isFlagSet($store, 'klarna/general/allow_specific_countries');
    }

    /**
     * Getting back the country list
     *
     * @param StoreInterface $store
     * @return array
     */
    private function getCountryList(StoreInterface $store): array
    {
        $result = $this->getConfigValue($store, 'klarna/general/specific_countries');
        return $this->generateArrayResult($result);
    }
}
