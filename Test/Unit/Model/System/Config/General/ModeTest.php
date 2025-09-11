<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\System\Config\General;

use Klarna\AdminSettings\Model\System\Config\General\Mode;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\System\Config\General\Mode
 */
class ModeTest extends TestCase
{
    /**
     * @var Mode
     */
    private Mode $mode;

    public function testToOptionArrayReturnsArray(): void
    {
        $result = $this->mode->toOptionArray();
        static::assertIsArray($result);
        static::assertTrue(count($result) > 0);
    }

    protected function setUp(): void
    {
        $this->mode = parent::setUpMocks(Mode::class);
    }
}