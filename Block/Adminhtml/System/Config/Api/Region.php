<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Block\Adminhtml\System\Config\Api;

use Klarna\AdminSettings\Block\Adminhtml\System\Config\Checkbox;
use Klarna\AdminSettings\Model\System\Config\General\Source\Version;
use Magento\Backend\Block\Template\Context;

/**
 * @internal
 */
class Region extends Checkbox
{
    /**
     * @param Version $version
     * @param Context $context
     * @param array $data
     * @codeCoverageIgnore
     */
    public function __construct(Version $version, Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->optionSource = $version;
    }

    /**
     * @inheritDoc
     */
    protected function getConfigPath(): string
    {
        return 'klarna/api/region';
    }

    /**
     * @inheritDoc
     */
    public function getReadOnlyValues(): array
    {
        return [];
    }
}
