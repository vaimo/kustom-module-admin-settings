<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update;

/**
 * @internal
 */
class ApiRegionShowAble
{
    public const FIELDS_METADATA = [
        'regionSelector' => 'groups[klarna_section][groups][api][fields][region][value]',
        'markets' => [
            'eu' => [
                'klarna_section_api_api_eu'
            ],
            'na' => [
                'klarna_section_api_api_ca',
                'klarna_section_api_api_mx',
                'klarna_section_api_api_us'
            ],
            'oc' => [
                'klarna_section_api_api_au',
                'klarna_section_api_api_nz'
            ]
        ]
    ];
}
