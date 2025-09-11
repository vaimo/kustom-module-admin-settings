<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\System\Config\General\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * @internal
 */
class Version implements OptionSourceInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return[
            [
                'value' => 'eu',
                'label' => __('Europe')
            ],
            [
                'value' => 'na',
                'label' => __('North America')
            ],
            [
                'value' => 'oc',
                'label' => __('Oceania')
            ]
        ];
    }
}
