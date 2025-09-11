<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update\UxRedesign\Osm;

use Klarna\AdminSettings\Model\Update\UxRedesign\AbstractMapper;
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
            'product_enabled' => $this->legacyConfiguration->isProductEnabledFlag($scope, $scopeCode),
            'cart_enabled' => $this->legacyConfiguration->isCartEnabled($scope, $scopeCode),
            'footer_enabled' => $this->legacyConfiguration->isFooterEnabled($scope, $scopeCode),
            'theme' => $this->legacyConfiguration->getTheme($scope, $scopeCode)
        ];
    }

    /**
     * Getting back the target position
     *
     * @return string[]
     */
    public function getTargetPosition(): array
    {
        $result = [];
        if ($this->mappingData['product_enabled']) {
            $result[] = 'product';
        }
        if ($this->mappingData['cart_enabled']) {
            $result[] = 'cart';
        }
        if ($this->mappingData['footer_enabled']) {
            $result[] = 'footer';
        }

        return $this->createResult('klarna/osm/position', implode(',', $result));
    }

    /**
     * Getting back the theme
     *
     * @return array
     */
    public function getTargetTheme(): array
    {
        return [
            $this->createResult('klarna/osm/theme', 'custom'),
            $this->createResult('klarna/osm/custom_theme_name', $this->mappingData['theme'])
        ];
    }
}
