<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Configurations\Kco;

use Klarna\AdminSettings\Model\Configurations\AbstractConfiguration;
use Klarna\Kco\Model\Payment\Kco;
use Magento\Store\Api\Data\StoreInterface;

/**
 * @internal
 */
class Prefill extends AbstractConfiguration
{
    /**
     * @var string
     */
    public string $paymentCode = Kco::METHOD_CODE;

    /**
     * Returns true if prefilling the customer details is enabled
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isPrefillingCustomerDetailsEnabled(StoreInterface $store): bool
    {
        return $this->getCheckoutFlagValue($store, 'merchant_prefill');
    }
}
