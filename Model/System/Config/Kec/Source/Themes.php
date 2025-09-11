<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\System\Config\Kec\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * @internal
 */
class Themes implements OptionSourceInterface
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
                'value' => 'dark',
                'label' => __('Dark'),
            ],
            [
                'value' => 'light',
                'label' => __('Light'),
            ],
            [
                'value' => 'outlined',
                'label' => __('Outlined'),
            ]
        ];
    }
}
