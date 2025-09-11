<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Controller\Adminhtml\KlarnaApiRegion;

use Klarna\AdminSettings\Model\Update\ApiRegionShowAble;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Klarna\Base\Model\Responder\Result;
use Magento\Backend\App\Action\Context;
use Magento\Config\Model\Config\Structure;
use Magento\Backend\App\Action;

/**
 * @api
 */
class MetaData extends Action implements HttpGetActionInterface
{
    /**
     * @var Result
     */
    private Result $result;

    /**
     * @param Context $context
     * @param Result $result
     * @codeCoverageIgnore
     */
    public function __construct(
        Context $context,
        Result $result
    ) {
        parent::__construct($context);
        $this->result = $result;
    }

    /**
     * @inheritdoc
     */
    public function execute()
    {
        return $this->result->getJsonResult(200, ApiRegionShowAble::FIELDS_METADATA);
    }
}
