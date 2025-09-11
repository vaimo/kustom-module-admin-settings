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
class InteractionMode extends Table
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'POPUP', 'label' => __('POPUP')],
            ['value' => 'REDIRECT', 'label' => __('REDIRECT')],
            ['value' => 'DEVICE_BEST', 'label' => __('DEVICE BEST')]
        ];
    }
}
