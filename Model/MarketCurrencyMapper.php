<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model;

/**
 * @internal
 */
class MarketCurrencyMapper
{

    /**
     * @var array
     */
    private array $mapping = [
        'eu' => 'EUR',
        'us' => 'USD',
        'mx' => 'MXN',
        'ca' => 'CAD',
        'au' => 'AUD',
        'nz' => 'NZD',
    ];

    /**
     * Getting back the currency of the market
     *
     * @param string $market
     * @return string
     */
    public function getCurrencyByMarket(string $market): string
    {
        if (isset($this->mapping[$market])) {
            return $this->mapping[$market];
        }

        return '';
    }
}
