<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\System\Config\General\Source;

use Klarna\Base\Test\Unit\Mock\TestCase;
use Klarna\AdminSettings\Model\System\Config\Osm\Source\Theme;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\System\Config\Osm\Source\Theme
 */
class ThemeTest extends TestCase
{
    /**
     * @var Theme
     */
    private Theme $theme;

    public function testToOptionArrayReturnsArray(): void
    {
        $result = $this->theme->toOptionArray();
        static::assertIsArray($result);
        static::assertTrue(count($result) > 0);
    }

    protected function setUp(): void
    {
        $this->theme = parent::setUpMocks(Theme::class);
    }
}