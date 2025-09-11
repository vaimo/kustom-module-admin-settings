<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\System\Config\Osm\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * @internal
 */
class Theme implements OptionSourceInterface
{
    /**
     * Getting back the theme
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => 'dark_with_badge',
                'label' => __('Dark with badge'),
            ],
            [
                'value' => 'dark_without_badge',
                'label' => __('Dark without badge'),
            ],
            [
                'value' => 'light_with_badge',
                'label' => __('Light with badge'),
            ],
            [
                'value' => 'light_without_badge',
                'label' => __('Light without badge'),
            ],
            [
                'value' => 'custom',
                'label' => __('Custom'),
            ]
        ];
    }
}
