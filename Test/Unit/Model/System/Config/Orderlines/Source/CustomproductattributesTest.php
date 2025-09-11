<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\System\Config\Orderlines\Source;

use Klarna\AdminSettings\Model\System\Config\Orderlines\Source\Customproductattributes;
use Magento\Catalog\Model\ProductAttributeSearchResults;
use Magento\Catalog\Model\ResourceModel\Eav\Attribute as AttributeAlias;
use Magento\Eav\Model\Entity\Attribute\FrontendLabel;
use Magento\Framework\Api\Search\SearchCriteria;
use Klarna\Base\Test\Unit\Mock\TestCase;
use PHPUnit_Framework_MockObject_MockObject;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\System\Config\Orderlines\Source\Customproductattributes
 */
class CustomproductattributesTest extends TestCase
{
    /**
     * @var Customproductattributes
     */
    private $model;
    /**
     * @var PHPUnit_Framework_MockObject_MockObject|\Magento\Catalog\Api\Data\ProductAttributeSearchResultsInterface
     */
    private $listInfo;

    /**
     * @covers ::toOptionArray()
     * @covers ::extractAdminStoreFrontendLabel()
     */
    public function testToOptionArrayWithFrontendLabels(): void
    {
        $productAttribute = $this->getProductAttributeMock();
        $this->listInfo->method('getItems')->willReturn([$productAttribute]);
        $productAttribute->method('getAttributeCode')->willReturn('some_attribute_code');
        $label = $this->createMock(FrontendLabel::class);
        $productAttribute->method('getFrontendLabels')->willReturn([$label]);
        $label->method('getLabel')->willReturn('Some label');
        static::assertNotEmpty($this->model->toOptionArray());
    }

    /**
     * @covers ::toOptionArray()
     * @covers ::extractAdminStoreFrontendLabel()
     */
    public function testToOptionArrayReturnsNotEmptyResult(): void
    {
        $productAttribute = $this->getProductAttributeMock();
        $this->listInfo->method('getItems')->willReturn([$productAttribute]);
        $productAttribute->method('getAttributeCode')->willReturn('some_attribute_code');
        $productAttribute->method('getFrontendLabels')->willReturn(null);
        $productAttribute->method('getFrontendLabel')->willReturn('Some Label');
        static::assertNotEmpty($this->model->toOptionArray());
    }

    /**
     * @covers ::toOptionArray()
     */
    public function testToOptionArrayReturnsCachedResult(): void
    {
        $productAttribute = $this->getProductAttributeMock();
        $this->listInfo->expects(self::once())->method('getItems')->willReturn([$productAttribute]);
        $productAttribute->expects(self::once())->method('getAttributeCode')->willReturn('some_attribute_code');
        $productAttribute->expects(self::once())->method('getFrontendLabels')->willReturn(null);
        $productAttribute->expects(self::once())->method('getFrontendLabel')->willReturn('Some Label');
        // Call to generate cached result
        $this->model->toOptionArray();
        // Call a second time to ensure cached result used
        static::assertNotEmpty($this->model->toOptionArray());
    }

    /**
     * Generate a product attribute mock
     *
     * @return AttributeAlias
     */
    private function getProductAttributeMock()
    {
        return $this->getMockBuilder(AttributeAlias::class)
            ->onlyMethods([
                'getAttributeCode',
                'getFrontendLabels'
            ])
             ->addMethods([
                 'getFrontendLabel',
             ])
             ->disableOriginalConstructor()
             ->getMock();
    }

    protected function setUp(): void
    {
        $this->model = parent::setUpMocks(Customproductattributes::class);

        $searchCriteria = $this->createMock(SearchCriteria::class);
        $this->dependencyMocks['searchCriteriaBuilder']->method('create')->willReturn($searchCriteria);
        $this->listInfo = $this->createMock(ProductAttributeSearchResults::class);
        $this->dependencyMocks['productAttributeRepository']->method('getList')->willReturn($this->listInfo);
    }
}
