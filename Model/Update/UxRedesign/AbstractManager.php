<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update\UxRedesign;

use Magento\Store\Api\Data\StoreInterface;
use Magento\Framework\App\Config\ConfigResource\ConfigInterface;

/**
 * @internal
 */
abstract class AbstractManager
{
    /**
     * @var ConfigInterface
     */
    private ConfigInterface $configWriter;
    /**
     * @var string
     */
    protected string $scope = '';
    /**
     * @var string
     */
    protected string $scopeCode = '';

    /**
     * @param ConfigInterface $configWriter
     * @codeCoverageIgnore
     */
    public function __construct(ConfigInterface $configWriter)
    {
        $this->configWriter = $configWriter;
    }

    /**
     * Saving the configuration
     *
     * @param array $input
     */
    protected function saveConfig(array $input): void
    {
        $key = $input['key'];
        $value = $input['value'];

        if (empty($key) || empty($value)) {
            return;
        }

        $this->configWriter->saveConfig($key, $value, $this->scope, $this->scopeCode);
    }

    /**
     * Setting the scope
     *
     * @param string $scope
     */
    public function setScope(string $scope): void
    {
        $this->scope = $scope;
    }

    /**
     * Setting the store ID
     *
     * @param string $scopeCode
     */
    public function setScopeCode(string $scopeCode): void
    {
        $this->scopeCode = $scopeCode;
    }
}
