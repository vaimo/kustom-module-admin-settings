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
class ButtonTheme implements OptionSourceInterface
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
                'value' => 'outlined',
                'label' => __('Outlined'),
            ],
            [
                'value' => 'dark',
                'label' => __('Dark'),
            ],
            [
                'value' => 'light',
                'label' => __('Light'),
            ],
        ];
    }
}
