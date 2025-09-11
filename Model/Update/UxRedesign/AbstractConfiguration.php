<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update\UxRedesign;

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * @internal
 */
abstract class AbstractConfiguration
{
    /**
     * @var ScopeConfigInterface
     */
    private ScopeConfigInterface $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @codeCoverageIgnore
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Getting back the configuration value
     *
     * @param string $scope
     * @param string $scopeCode
     * @param string $path
     * @return string
     */
    protected function getConfig(string $scope, string $scopeCode, string $path): string
    {
        return (string) $this->scopeConfig->getValue(
            $path,
            $scope,
            $scopeCode
        );
    }

    /**
     * Returns true if the flag is set
     *
     * @param string $scope
     * @param string $scopeCode
     * @param string $path
     * @return bool
     */
    protected function isSetFlag(string $scope, string $scopeCode, string $path): bool
    {
        return (bool) $this->scopeConfig->isSetFlag(
            $path,
            $scope,
            $scopeCode
        );
    }
}
