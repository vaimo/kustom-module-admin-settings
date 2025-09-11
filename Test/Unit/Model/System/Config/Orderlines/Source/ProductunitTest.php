<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\System\Config\Orderlines\Source;

use Klarna\AdminSettings\Model\System\Config\Orderlines\Source\Productunit;
use Klarna\Base\Test\Unit\Mock\TestCase;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\System\Config\Orderlines\Source\Productunit
 */
class ProductunitTest extends TestCase
{
    /**
     * @var Productunit
     */
    private $model;

    /**
     * @covers ::toOptionArray()
     */
    public function testToOptionArrayReturnsNotEmptyResult(): void
    {
        static::assertNotEmpty($this->model->toOptionArray());
    }

    protected function setUp(): void
    {
        $this->model = parent::setUpMocks(Productunit::class);
    }
}
