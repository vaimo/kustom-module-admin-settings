<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\Siwk\Test\Unit\Model\System\Config\Source;

use Klarna\AdminSettings\Model\System\Config\Siwk\Source\ButtonShape;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\System\Config\Siwk\Source\ButtonShape
 */
class ButtonShapeTest extends TestCase
{
    /**
     * @var ButtonShape
     */
    private ButtonShape $buttonShape;

    public function testToOptionArrayCorrectStructure(): void
    {
        $result = $this->buttonShape->toOptionArray();
        static::assertIsArray($result);
        static::assertTrue(count($result) > 0);
    }

    protected function setUp(): void
    {
        $this->buttonShape = parent::setUpMocks(ButtonShape::class);
    }
}