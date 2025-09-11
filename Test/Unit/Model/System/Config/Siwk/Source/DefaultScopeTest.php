<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\Siwk\Test\Unit\Model\System\Config\Source;

use Klarna\AdminSettings\Model\System\Config\Siwk\Source\DefaultScope;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\System\Config\Siwk\Source\DefaultScope
 */
class DefaultScopeTest extends TestCase
{
    /**
     * @var DefaultScope
     */
    private DefaultScope $scope;

    public function testToOptionArrayCorrectStructure(): void
    {
        $expected = [
            ['value' => 'profile:email', 'label' => __('Email address')],
            ['value' => 'profile:name', 'label' => __('Full name')],
            ['value' => 'profile:phone', 'label' => __('Phone number')],
            ['value' => 'profile:billing_address', 'label' => __('Billing address')]
        ];
        $result = $this->scope->toOptionArray();

        static::assertIsArray($result);
        static::assertTrue(count($result) > 0);

        for ($i = 0; $i < count($expected); $i++) {
            static::assertSame($expected[$i]['value'], $result[$i]['value']);
        }
    }


    protected function setUp(): void
    {
        $this->scope = parent::setUpMocks(DefaultScope::class);
    }
}