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
class Placement implements OptionSourceInterface
{
    /**
     * Getting back the placement
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'cart', 'label' => __('Cart')],
            ['value' => 'product', 'label' => __('Product')],
            ['value' => 'footer', 'label' => __('Footer')]
        ];
    }
}
