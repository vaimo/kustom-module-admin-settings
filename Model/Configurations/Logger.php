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
class Logger extends AbstractConfiguration
{
    /**
     * Returns true if the logger is enabled
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isEnabled(StoreInterface $store): bool
    {
        return $this->isFlagSet($store, 'klarna/api/debug');
    }
}
