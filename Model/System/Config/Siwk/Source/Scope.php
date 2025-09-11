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
class Scope extends Table
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'profile:country', 'label' => __('Country')],
            ['value' => 'profile:date_of_birth', 'label' => __('Date of birth')],
            ['value' => 'profile:locale', 'label' => __('Locale')]
        ];
    }
}
