<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update\UxRedesign\Osm;

use Klarna\AdminSettings\Model\Update\UxRedesign\AbstractManager;
use Magento\Framework\App\Config\ConfigResource\ConfigInterface;
use Magento\Store\Api\Data\StoreInterface;
use Klarna\Base\Exception as KlarnaException;

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
     * Updating the position
     */
    public function updatePosition(): void
    {
        $this->saveConfig($this->mapper->getTargetPosition());
    }

    /**
     * Updating the theme
     */
    public function updateTheme(): void
    {
        $theme = $this->mapper->getTargetTheme();
        foreach ($theme as $pair) {
            $this->saveConfig($pair);
        }
    }
}
