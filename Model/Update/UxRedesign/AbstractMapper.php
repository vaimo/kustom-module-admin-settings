<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update\UxRedesign;

/**
 * @internal
 */
abstract class AbstractMapper
{
    /**
     * @var array
     */
    protected array $mappingData = [];

    /**
     * Getting back the result
     *
     * @param string $key
     * @param string $value
     * @return string[]
     */
    protected function createResult(string $key, string $value): array
    {
        return [
            'key' => $key,
            'value' => $value
        ];
    }
}
