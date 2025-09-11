<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Configurations;

use Klarna\AdminSettings\Model\Configurations\AbstractConfiguration;
use Klarna\Kp\Model\Payment\Kp as PaymentKp;
use Magento\Store\Api\Data\StoreInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * @internal
 */
class Kp extends AbstractConfiguration
{
    /**
     * Returns true if B2B is enabled
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isB2bEnabled(StoreInterface $store): bool
    {
        return $this->isFlagSet($store, 'payment/klarna_kp/enable_b2b');
    }

    /**
     * Returns true if KP is enabled
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isEnabled(StoreInterface $store): bool
    {
        return $this->isFlagSet($store, 'payment/klarna_kp/active');
    }

    /**
     * Returns sort order value
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getSortOrder(StoreInterface $store): string
    {
        return $this->getConfigValue($store, 'payment/klarna_kp/sort_order');
    }
}
