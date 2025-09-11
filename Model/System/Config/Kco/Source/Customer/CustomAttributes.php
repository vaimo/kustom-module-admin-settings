<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\System\Config\Kco\Source\Customer;

use Magento\Customer\Model\Customer;
use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Eav\Api\Data\AttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * @internal
 */
class CustomAttributes extends AbstractSource
{
    /**
     * @var array
     */
    private array $options = [];
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;
    /**
     * @var AttributeRepositoryInterface
     */
    private AttributeRepositoryInterface $attributeRepository;

    /**
     * CustomAttributes constructor.
     *
     * @param SearchCriteriaBuilder        $searchCriteriaBuilder
     * @param AttributeRepositoryInterface $attributeRepository
     * @codeCoverageIgnore
     */
    public function __construct(
        SearchCriteriaBuilder $searchCriteriaBuilder,
        AttributeRepositoryInterface $attributeRepository
    ) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->attributeRepository   = $attributeRepository;
    }

    /**
     * Getting all options
     *
     * @param bool $withEmpty
     * @return array
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function getAllOptions(bool $withEmpty = true): array
    {
        $emptyOption = [['value' => '0', 'label' => __('Select')]];

        if (empty($this->options)) {
            try {
                $listInfo = $this->loadAllCustomAttributes();
                foreach ($listInfo as $items) {
                    $this->options[] = [
                        'value' => $items->getAttributeCode(),
                        'label' => $items->getFrontendLabel()
                    ];
                }
            } catch (\Exception $e) {
                return $emptyOption;
            }
        }
        if ($withEmpty) {
            return array_merge($emptyOption, $this->options);
        }

        return $this->options;
    }

    /**
     * Loading all customer attributes
     *
     * @return AttributeInterface[]
     */
    private function loadAllCustomAttributes()
    {
        $searchCriteria = $this->searchCriteriaBuilder->addFilter('is_user_defined', 1)->create();
        $attributeRepository = $this->attributeRepository->getList(
            Customer::ENTITY,
            $searchCriteria
        );

        return $attributeRepository->getItems();
    }
}
