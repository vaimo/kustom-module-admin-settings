<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Block\Adminhtml\System\Config\Osm;

use Klarna\AdminSettings\Block\Adminhtml\System\Config\Checkbox;
use Klarna\AdminSettings\Model\System\Config\Osm\Source\Placement;
use Magento\Backend\Block\Template\Context;

/**
 * @internal
 */
class Position extends Checkbox
{
    /**
     * @param Placement $placement
     * @param Context $context
     * @param array $data
     * @codeCoverageIgnore
     */
    public function __construct(Placement $placement, Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->optionSource = $placement;
    }

    /**
     * @inheritDoc
     */
    protected function getConfigPath(): string
    {
        return 'klarna/osm/position';
    }

    /**
     * @inheritDoc
     */
    public function getReadOnlyValues(): array
    {
        return [];
    }
}
