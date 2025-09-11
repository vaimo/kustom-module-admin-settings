<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Block\Adminhtml\System\Config\Kec;

use Klarna\AdminSettings\Block\Adminhtml\System\Config\Checkbox;
use Klarna\AdminSettings\Model\System\Config\Kec\Source\Position as SourcePosition;
use Magento\Backend\Block\Template\Context;

/**
 * @internal
 */
class Position extends Checkbox
{
    /**
     * @param SourcePosition $sourcePosition
     * @param Context $context
     * @param array $data
     * @codeCoverageIgnore
     */
    public function __construct(SourcePosition $sourcePosition, Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->optionSource = $sourcePosition;
    }

    /**
     * @inheritDoc
     */
    protected function getConfigPath(): string
    {
        return 'payment/kec/position';
    }

    /**
     * @inheritDoc
     */
    public function getReadOnlyValues(): array
    {
        return [];
    }
}
