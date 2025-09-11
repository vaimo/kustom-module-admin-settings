<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\System\Config\Siwk\Source;

use Magento\Eav\Model\Entity\Attribute\Source\Table;

/**
 * @internal
 */
class DefaultScope extends Table
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'profile:email', 'label' => __('Email address')],
            ['value' => 'profile:name', 'label' => __('Full name')],
            ['value' => 'profile:phone', 'label' => __('Phone number')],
            ['value' => 'profile:billing_address', 'label' => __('Billing address')]
        ];
    }
}
