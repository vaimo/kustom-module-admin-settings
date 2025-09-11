<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\Kec\Test\Unit\Model\System\Config\Source;

use Klarna\AdminSettings\Model\System\Config\Kec\Source\Shapes;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\System\Config\Kec\Source\Shapes
 */
class ShapesTest extends TestCase
{
    /**
     * @var Shapes
     */
    private Shapes $shapes;

    public function testToOptionArrayCorrectStructure(): void
    {
        $result = $this->shapes->toOptionArray();
        static::assertIsArray($result);
        static::assertTrue(count($result) > 0);
    }

    protected function setUp(): void
    {
        $this->shapes = parent::setUpMocks(Shapes::class);
    }
}