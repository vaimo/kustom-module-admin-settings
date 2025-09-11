<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\System\Config\General\Source;

use Klarna\AdminSettings\Model\System\Config\General\Source\Version;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\System\Config\General\Source\Version
 */
class VersionTest extends TestCase
{
    /**
     * @var Version
     */
    private Version $version;

    public function testToOptionArrayReturnsArray(): void
    {
        $result = $this->version->toOptionArray();
        static::assertIsArray($result);
        static::assertTrue(count($result) > 0);
    }

    protected function setUp(): void
    {
        $this->version = parent::setUpMocks(Version::class);
    }
}