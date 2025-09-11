<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Block\Adminhtml\System\Config\Siwk;

use Klarna\AdminSettings\Block\Adminhtml\System\Config\Checkbox;
use Klarna\AdminSettings\Model\System\Config\Siwk\Source\DefaultScope;
use Klarna\AdminSettings\Model\System\Config\Siwk\Source\Scope as ScopeFields;
use Magento\Backend\Block\Template\Context;

/**
 * @internal
 */
class Scope extends Checkbox
{
    /**
     * @var DefaultScope
     */
    private DefaultScope $defaultScope;

    /**
     * @param ScopeFields $scope
     * @param DefaultScope $defaultScope
     * @param Context $context
     * @param array $data
     * @codeCoverageIgnore
     */
    public function __construct(ScopeFields $scope, DefaultScope $defaultScope, Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->optionSource = $scope;
        $this->defaultScope = $defaultScope;
    }

    /**
     * @inheritDoc
     */
    protected function getConfigPath(): string
    {
        return 'klarna/siwk/scope';
    }

    /**
     * @inheritDoc
     */
    public function getReadOnlyValues(): array
    {
        $result = [];

        foreach ($this->defaultScope->toOptionArray() as $option) {
            $result[$option['value']] = (string) $option['label'];
        }

        return $result;
    }
}
