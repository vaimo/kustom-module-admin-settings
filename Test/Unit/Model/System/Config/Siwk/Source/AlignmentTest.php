<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\Siwk\Test\Unit\Model\System\Config\Source;


use Klarna\AdminSettings\Model\System\Config\Siwk\Source\Alignment;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\System\Config\Siwk\Source\Alignment
 */
class AlignmentTest extends TestCase
{
    /**
     * @var Alignment
     */
    private Alignment $alignment;

    public function testToOptionArrayCorrectStructure(): void
    {
        $result = $this->alignment->toOptionArray();
        static::assertIsArray($result);
        static::assertTrue(count($result) > 0);
    }

    protected function setUp(): void
    {
        $this->alignment = parent::setUpMocks(Alignment::class);
    }
}