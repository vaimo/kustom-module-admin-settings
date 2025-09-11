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
class Checkbox extends AbstractConfiguration
{
    /**
     * @var string
     */
    public string $paymentCode = Kco::METHOD_CODE;

    /**
     * Returns true if the merchant checkbox is checked by default
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isMerchantCheckboxCheckedByDefault(StoreInterface $store): bool
    {
        return $this->getCheckoutFlagValue($store, 'merchant_checkbox_checked');
    }

    /**
     * Returns true if the merchant checkbox must be checked
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function isMerchantCheckboxRequiredToBeChecked(StoreInterface $store): bool
    {
        return $this->getCheckoutFlagValue($store, 'merchant_checkbox_required');
    }

    /**
     * Getting back the checkbox options
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getOptions(StoreInterface $store): string
    {
        return $this->getCheckoutContentValue($store, 'merchant_checkbox');
    }

    /**
     * Getting back the text
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getText(StoreInterface $store): string
    {
        return $this->getCheckoutContentValue($store, 'merchant_checkbox_text');
    }
}
