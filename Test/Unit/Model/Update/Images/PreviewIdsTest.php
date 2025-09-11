<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Update\Images;

use Klarna\AdminSettings\Model\Update\Images\PreviewIds;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Framework\Data\Form\Element\Select;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Update\Images\PreviewIds
 */
class PreviewIdsTest extends TestCase
{
    /**
     * @var PreviewIds
     */
    private PreviewIds $previewIds;
    /**
     * @var Select
     */
    private Select $element;

    public function testIsAppearingForAtLeastOneKlarnaFieldNameExistsImpliesReturnsTrue(): void
    {
        $this->element->method('getName')->willReturn('groups[klarna_section][groups][klarna_kp_required][fields][active][value]');
        static::assertTrue($this->previewIds->isAppearingForAtLeastOneKlarnaField($this->element));
    }

    public function testIsAppearingForAtLeastOneKlarnaFieldNameDoesNotExistsImpliesReturnsFalse(): void
    {
        $this->element->method('getName')->willReturn('abc');
        static::assertFalse($this->previewIds->isAppearingForAtLeastOneKlarnaField($this->element));
    }

    public function testGetIdsNoMatchFoundImpliesReturningEmptyArray(): void
    {
        $this->element->method('getName')->willReturn('abc');
        static::assertEmpty($this->previewIds->getIds($this->element));
    }

    public function testGetIdsOneMatchFoundImpliesReturningArrayWithOneEntry(): void
    {
        $this->element->method('getName')->willReturn('groups[klarna_section][groups][klarna_kp_required][fields][active][value]');
        $result = $this->previewIds->getIds($this->element);

        static::assertCount(1, $result);
        static::assertEquals('klarna_kp_image', $result[0]);
    }

    public function testGetIdsTwoMatchesFoundImpliesReturningArrayWithTwoEntries(): void
    {
        $this->element->method('getName')->willReturn('groups[klarna_section][groups][osm][groups][theme_and_placements][fields][position][value]');
        $result = $this->previewIds->getIds($this->element);

        static::assertCount(3, $result);
        static::assertEquals('klarna_osm_cart_image', $result[0]);
        static::assertEquals('klarna_osm_product_image', $result[1]);
        static::assertEquals('klarna_osm_footer_image', $result[2]);
    }

    protected function setUp(): void
    {
        $this->previewIds = parent::setUpMocks(PreviewIds::class);
        $this->element = $this->mockFactory->create(Select::class);
    }
}
