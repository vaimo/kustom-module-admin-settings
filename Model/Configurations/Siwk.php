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
class Siwk extends AbstractConfiguration
{

    /**
     * Returns true if SIWK is enabled
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isEnabled(StoreInterface $store): bool
    {
        return $this->isFlagSet($store, 'klarna/siwk/enabled');
    }

    /**
     * Returns true if its enabled on the position
     *
     * @param StoreInterface $store
     * @param string $position
     * @return bool
     */
    public function isEnabledOnPosition(StoreInterface $store, string $position): bool
    {
        return in_array($position, $this->getEnabledPositions($store), true);
    }

    /**
     * Getting back the list of positions where SIWK is enabled
     *
     * @param StoreInterface $store
     * @return array
     */
    private function getEnabledPositions(StoreInterface $store): array
    {
        return $this->generateArrayResult($this->getConfigValue($store, 'klarna/siwk/placement'));
    }

    /**
     * Getting back the button theme
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getButtonTheme(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'klarna/siwk/button_theme') ?: 'default';
    }

    /**
     * Getting back the button alignment
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getButtonAlignment(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'klarna/siwk/button_alignment') ?: 'default';
    }

    /**
     * Getting back the shape theme
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getButtonShape(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'klarna/siwk/button_shape') ?: 'default';
    }

    /**
     * Getting back the interaction mode
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getInteractionMode(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'klarna/siwk/interaction_mode');
    }

    /**
     * Getting back the scopes
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getScopes(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'klarna/siwk/scope');
    }
}
