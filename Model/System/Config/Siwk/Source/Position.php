<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\System\Config\Siwk\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * @internal
 */
class Position implements OptionSourceInterface
{
    /**
     * Return array of options as value-label pairs
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            [
                'value' => 'cart-page',
                'label' => __('Cart page'),
            ],
            [
                'value' => 'sign-in-page',
                'label' => __('Sign-in page'),
            ],
            [
                'value' => 'account-creation-page',
                'label' => __('Account creation page'),
            ]
        ];
    }
}
