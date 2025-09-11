<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update\UxRedesign\General;

use Klarna\AdminSettings\Model\Update\UxRedesign\AbstractManager;
use Klarna\Base\Exception as KlarnaException;
use Magento\Framework\App\Config\ConfigResource\ConfigInterface;

/**
 * @internal
 */
class Manager extends AbstractManager
{
    /**
     * @var Mapper
     */
    private Mapper $mapper;

    /**
     * @param Mapper $mapper
     * @param ConfigInterface $configWriter
     * @codeCoverageIgnore
     */
    public function __construct(Mapper $mapper, ConfigInterface $configWriter)
    {
        parent::__construct($configWriter);
        $this->mapper = $mapper;
    }

    /**
     * Preparing the mapping of the data
     *
     * @throws KlarnaException
     */
    public function prepareMappingData(): void
    {
        try {
            $this->mapper->prepareMappingData($this->scope, $this->scopeCode);
        } catch (\Exception $e) {
            throw new KlarnaException(__('Could not prepare the data mapping. Reason: ' . $e->getMessage()));
        }
    }

    /**
     * Updating the allow specific countries
     */
    public function updateAllowSpecificCountries(): void
    {
        $this->saveConfig($this->mapper->getTargetAllowSpecificCountries());
    }

    /**
     * Updating the specific countries
     */
    public function updateSpecificCountries(): void
    {
        $this->saveConfig($this->mapper->getTargetSpecificCountries());
    }
}
