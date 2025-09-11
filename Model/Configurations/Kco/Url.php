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
class Url extends AbstractConfiguration
{
    /**
     * @var string
     */
    public string $paymentCode = Kco::METHOD_CODE;

    /**
     * Getting back the terms url
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getTermsUrl(StoreInterface $store): string
    {
        return $this->getCheckoutContentValue($store, 'terms_url');
    }

    /**
     * Getting back the cancellation terms url
     *
     * @param StoreInterface $store
     * @return string
     */
    public function getCancellationTermsUrl(StoreInterface $store): string
    {
        return $this->getCheckoutContentValue($store, 'cancellation_terms_url');
    }
}
