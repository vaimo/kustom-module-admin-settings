<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model;

use Magento\Framework\App\Request\Http;

/**
 * @internal
 */
class AdminLevel
{
    /**
     * @var Http
     */
    private Http $request;

    /**
     * @param Http $request
     * @codeCoverageIgnore
     */
    public function __construct(Http $request)
    {
        $this->request = $request;
    }

    /**
     * Getting back the scope
     *
     * @return string
     */
    public function getScope(): string
    {
        $storeId = $this->request->getParam('website');
        if (empty($storeId)) {
            return 'default';
        }

        return 'websites';
    }

    /**
     * Getting back the store Id
     *
     * @return int
     */
    public function getStoreId(): int
    {
        return (int) $this->request->getParam('website', 0);
    }
}
