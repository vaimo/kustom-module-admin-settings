<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update\UxRedesign\General;

use Klarna\AdminSettings\Model\Update\UxRedesign\AbstractMapper;

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
     * @param LegacyConfiguration $legacyConfiguration
     * @codeCoverageIgnore
     */
    public function __construct(LegacyConfiguration $legacyConfiguration)
    {
        $this->legacyConfiguration = $legacyConfiguration;
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
            'allow_specific_country' => $this->legacyConfiguration->getAllowSpecificCountry($scope, $scopeCode),
            'specific_country_list' => $this->legacyConfiguration->getSpecificCountryList($scope, $scopeCode)
        ];
    }

    /**
     * Getting back the target allow specific countries key value pair
     *
     * @return array
     */
    public function getTargetAllowSpecificCountries(): array
    {
        return $this->createResult(
            'klarna/general/allow_specific_countries',
            $this->mappingData['allow_specific_country']
        );
    }

    /**
     * Getting back the target specific countries key value pair
     *
     * @return array
     */
    public function getTargetSpecificCountries(): array
    {
        return $this->createResult(
            'klarna/general/specific_countries',
            $this->mappingData['specific_country_list']
        );
    }
}
