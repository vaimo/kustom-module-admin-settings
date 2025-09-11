<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Test\Integration\Controller\Adminhtml\KlarnaApiRegion;

use Klarna\Base\Test\Integration\Helper\AdminControllerTestCase;
use Magento\Framework\App\Request\Http;

/**
 * @internal
 */
class MetaDataTest extends AdminControllerTestCase
{
    /**
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     */
    public function testExecuteReturnResult(): void
    {
        $result = $this->sendRequest(
            [],
            'backend/admin/klarnaApiRegion/metaData',
            Http::METHOD_GET
        );

        static::assertEquals(200, $result['statusCode']);
        static::assertNotEmpty($result['body']);
    }
}
