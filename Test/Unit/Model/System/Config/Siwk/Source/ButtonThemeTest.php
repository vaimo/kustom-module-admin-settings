<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\Siwk\Test\Unit\Model\System\Config\Source;

use Klarna\AdminSettings\Model\System\Config\Siwk\Source\ButtonTheme;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\System\Config\Siwk\Source\ButtonTheme
 */
class ButtonThemeTest extends TestCase
{
    /**
     * @var ButtonTheme
     */
    private ButtonTheme $buttonTheme;

    public function testToOptionArrayCorrectStructure(): void
    {
        $result = $this->buttonTheme->toOptionArray();
        static::assertIsArray($result);
        static::assertTrue(count($result) > 0);
    }

    protected function setUp(): void
    {
        $this->buttonTheme = parent::setUpMocks(ButtonTheme::class);
    }
}