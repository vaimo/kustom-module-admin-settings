<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Update\Images;

/**
 * @internal
 */
class Url
{

    public const IMAGES_METADATA = [
        'kp' => [
            'target_field' => 'groups[klarna_section][groups][klarna_kp_required][fields][active][value]',
            'events' => [
                'active' => 'groups[klarna_section][groups][klarna_kp_required][fields][active][value]'
            ],
            'image_id' => 'klarna_kp_image',
            'path' => [
                'active' => [
                    '1' => 'https://x.klarnacdn.net/plugin-build-sourcing/kp/' .
                        'kp-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                    '0' => 'https://x.klarnacdn.net/plugin-build-sourcing/kp/' .
                        'kp-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png'
                ]
            ]
        ],
        'kec' => [
            'target_field' =>
                'groups[klarna_section][groups][kec][groups][theme_shape_and_placements][fields][shape][value]',
            'events' => [
                'shape' =>
                    'groups[klarna_section][groups][kec][groups][theme_shape_and_placements][fields][shape][value]',
                'theme' =>
                    'groups[klarna_section][groups][kec][groups][theme_shape_and_placements][fields][theme][value]'
            ],
            'image_id' => 'klarna_kec_image',
            'path' => [
                'shape' => [
                    'rectangle' => [
                        'theme' => [
                            'dark' => "https://x.klarnacdn.net/plugin-build-sourcing/kec_button/default/" .
                                "kec_button_default_default@3x-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png",
                            'light' => "https://x.klarnacdn.net/plugin-build-sourcing/kec_button/light/" .
                                "kec_button_light_default@3x-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png",
                            'outlined' => "https://x.klarnacdn.net/plugin-build-sourcing/kec_button/light_outlined/" .
                                "kec_button_light_outlined_default@3x-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png"
                        ]
                    ],
                    'rounded' => [
                        'theme' => [
                            'dark' => "https://x.klarnacdn.net/plugin-build-sourcing/kec_button/default/" .
                                "kec_button_default_rounded@3x-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png",
                            'light' => "https://x.klarnacdn.net/plugin-build-sourcing/kec_button/light/" .
                                "kec_button_light_round@3x-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png",
                            'outlined' => "https://x.klarnacdn.net/plugin-build-sourcing/kec_button/light_outlined/" .
                                "kec_button_light_outlined_rounded@3x-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png"
                        ]
                    ],
                    'pill' => [
                        'theme' => [
                            'dark' => "https://x.klarnacdn.net/plugin-build-sourcing/kec_button/default/" .
                                "kec_button_default_square@3x-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png",
                            'light' => "https://x.klarnacdn.net/plugin-build-sourcing/kec_button/light/" .
                                "kec_button_light_square@3x-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png",
                            'outlined' => "https://x.klarnacdn.net/plugin-build-sourcing/kec_button/light_outlined/" .
                                "kec_button_light_outlined_square@3x-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png"
                        ]
                    ]
                ]
            ]
        ],
        'osm_cart' => [
            'target_field' =>
                'groups[klarna_section][groups][osm][groups][theme_and_placements][fields][position][value][cart]',
            'events' => [
                'theme' =>
                    'groups[klarna_section][groups][osm][groups][theme_and_placements][fields][theme][value]'
            ],
            'image_id' => 'klarna_osm_cart_image',
            'path' => [
                'theme' => [
                    'dark_with_badge' => 'https://x.klarnacdn.net/plugin-build-sourcing/pink_badge_dark/' .
                        'osm_pink_badge_dark_cart_page-6774028fa301dec6e54611cc2b1ff23eddca8cc8.jpg',
                    'dark_without_badge' => 'https://x.klarnacdn.net/plugin-build-sourcing/text_logo_dark/' .
                        'osm_text_logo_dark_cart_page-6774028fa301dec6e54611cc2b1ff23eddca8cc8.jpg',
                    'light_with_badge' => 'https://x.klarnacdn.net/plugin-build-sourcing/pink_bage_bright/' .
                        'osm_pink_bage_bright_cart_page-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                    'light_without_badge' => 'https://x.klarnacdn.net/plugin-build-sourcing/text_logo_bright/' .
                        'osm_text_logo_bright_cart_page-6774028fa301dec6e54611cc2b1ff23eddca8cc8.jpg',
                    'custom' => ''
                ]
            ]
        ],
        'osm_product' => [
            'target_field' =>
                'groups[klarna_section][groups][osm][groups][theme_and_placements][fields][position][value][product]',
            'events' => [
                'theme' =>
                    'groups[klarna_section][groups][osm][groups][theme_and_placements][fields][theme][value]'
            ],
            'image_id' => 'klarna_osm_product_image',
            'path' => [
                'theme' => [
                    'dark_with_badge' => 'https://x.klarnacdn.net/plugin-build-sourcing/pink_badge_dark/' .
                        'osm_pink_badge_dark_product_page-6774028fa301dec6e54611cc2b1ff23eddca8cc8.jpg',
                    'dark_without_badge' => 'https://x.klarnacdn.net/plugin-build-sourcing/text_logo_dark/' .
                        'osm_text_logo_dark_product_page-6774028fa301dec6e54611cc2b1ff23eddca8cc8.jpg',
                    'light_with_badge' => 'https://x.klarnacdn.net/plugin-build-sourcing/pink_bage_bright/' .
                        'osm_pink_bage_bright_product_page-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                    'light_without_badge' => 'https://x.klarnacdn.net/plugin-build-sourcing/text_logo_bright/' .
                        'osm_text_logo_bright_product_page-6774028fa301dec6e54611cc2b1ff23eddca8cc8.jpg',
                    'custom' => ''
                ]
            ]
        ],
        'osm_footer' => [
            'target_field' =>
                'groups[klarna_section][groups][osm][groups][theme_and_placements][fields][position][value][footer]',
            'events' => [
                'theme' =>
                    'groups[klarna_section][groups][osm][groups][theme_and_placements][fields][theme][value]'
            ],
            'image_id' => 'klarna_osm_footer_image',
            'path' => [
                'theme' => [
                    'dark_with_badge' => 'https://x.klarnacdn.net/plugin-build-sourcing/pink_badge_dark/' .
                        'osm_pink_badge_dark_footer-6774028fa301dec6e54611cc2b1ff23eddca8cc8.jpg',
                    'dark_without_badge' => 'https://x.klarnacdn.net/plugin-build-sourcing/text_logo_dark/' .
                        'osm_text_logo_dark_footer-6774028fa301dec6e54611cc2b1ff23eddca8cc8.jpg',
                    'light_with_badge' => 'https://x.klarnacdn.net/plugin-build-sourcing/pink_bage_bright/' .
                        'osm_pink_bage_bright_footer-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                    'light_without_badge' => 'https://x.klarnacdn.net/plugin-build-sourcing/text_logo_bright/' .
                        'osm_text_logo_bright_footer-6774028fa301dec6e54611cc2b1ff23eddca8cc8.jpg',
                    'custom' => ''
                ]
            ]
        ],
        'siwk' => [
            'target_field' =>
                'groups[klarna_section][groups][siwk][groups][theme_button_shape_and_placements]' .
                '[fields][placements][value]',
            'events' => [
                'button_theme' =>
                    'groups[klarna_section][groups][siwk][groups][theme_button_shape_and_placements]' .
                    '[fields][button_theme][value]',
                'button_shape' =>
                    'groups[klarna_section][groups][siwk][groups][theme_button_shape_and_placements]' .
                    '[fields][button_shape][value]',
                'button_alignment' =>
                    'groups[klarna_section][groups][siwk][groups][theme_button_shape_and_placements]' .
                    '[fields][button_alignment][value]'
            ],
            'image_id' => 'klarna_siwk_image',
            'path' => [
                'button_theme' => [
                    'outlined' => [
                        'button_shape' => [
                            'default' => [
                                'button_alignment' => [
                                    'left' => 'https://x.klarnacdn.net/plugin-build-sourcing/default_shape/' .
                                        'light_outlined_theme/' .
                                        'siwk_merchant_button-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'center' => 'https://x.klarnacdn.net/plugin-build-sourcing/default_shape/' .
                                        'light_outlined_theme/siwk_merchant_button_icon_centered' .
                                        '-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'default' => 'https://x.klarnacdn.net/plugin-build-sourcing/default_shape/' .
                                        'light_outlined_theme/' .
                                        'siwk_merchant_button_icon_left-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png'
                                ]
                            ],
                            'rectangle' => [
                                'button_alignment' => [
                                    'left' => 'https://x.klarnacdn.net/plugin-build-sourcing/rectangular_shape/' .
                                        'light_outlined_theme/' .
                                        'siwk_merchant_button_icon_left-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'center' => 'https://x.klarnacdn.net/plugin-build-sourcing/rectangular_shape/' .
                                        'light_outlined_theme/siwk_merchant_button_icon_centered' .
                                        '-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'default' => 'https://x.klarnacdn.net/plugin-build-sourcing/rectangular_shape/' .
                                        'light_outlined_theme/' .
                                        'siwk_merchant_button-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png'
                                ]
                            ],
                            'pill' => [
                                'button_alignment' => [
                                    'left' => 'https://x.klarnacdn.net/plugin-build-sourcing/pill_shape/' .
                                        'light_outlined_theme/' .
                                        'siwk_merchant_button_icon_left-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'center' => 'https://x.klarnacdn.net/plugin-build-sourcing/pill_shape/' .
                                        'light_outlined_theme/siwk_merchant_button_icon_centered' .
                                        '-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'default' => 'https://x.klarnacdn.net/plugin-build-sourcing/pill_shape/' .
                                        'light_outlined_theme/' .
                                        'siwk_merchant_button-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png'
                                ]
                            ]
                        ]
                    ],
                    'dark' => [
                        'button_shape' => [
                            'default' => [
                                'button_alignment' => [
                                    'left' => 'https://x.klarnacdn.net/plugin-build-sourcing/default_shape/' .
                                        'dark_theme_default/' .
                                        'siwk_merchant_button_icon_left-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'center' => 'https://x.klarnacdn.net/plugin-build-sourcing/default_shape/' .
                                        'dark_theme_default/siwk_merchant_button_icon_centered' .
                                        '-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'default' => 'https://x.klarnacdn.net/plugin-build-sourcing/default_shape/' .
                                        'dark_theme_default/' .
                                        'siwk_merchant_button-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png'
                                ]
                            ],
                            'rectangle' => [
                                'button_alignment' => [
                                    'left' => 'https://x.klarnacdn.net/plugin-build-sourcing/' .
                                        'rectangular_shape/dark_theme_default/' .
                                        'siwk_merchant_button_icon_left-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'center' => 'https://x.klarnacdn.net/plugin-build-sourcing/rectangular_shape/' .
                                        'dark_theme_default/siwk_merchant_button_icon_centered' .
                                        '-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'default' => 'https://x.klarnacdn.net/plugin-build-sourcing/rectangular_shape/' .
                                        'dark_theme_default/' .
                                        'siwk_merchant_button-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png'
                                ]
                            ],
                            'pill' => [
                                'button_alignment' => [
                                    'left' => 'https://x.klarnacdn.net/plugin-build-sourcing/pill_shape/' .
                                        'dark_theme_default/' .
                                        'siwk_merchant_button_icon_left-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'center' => 'https://x.klarnacdn.net/plugin-build-sourcing/pill_shape/' .
                                        'dark_theme_default/siwk_merchant_button_icon_centered' .
                                        '-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'default' => 'https://x.klarnacdn.net/plugin-build-sourcing/pill_shape/' .
                                        'dark_theme_default/' .
                                        'siwk_merchant_button-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png'
                                ]
                            ]
                        ]
                    ],
                    'light' => [
                        'button_shape' => [
                            'default' => [
                                'button_alignment' => [
                                    'left' => 'https://x.klarnacdn.net/plugin-build-sourcing/default_shape/' .
                                        'light_theme/' .
                                        'siwk_merchant_button_icon_left-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'center' => 'https://x.klarnacdn.net/plugin-build-sourcing/default_shape/' .
                                        'light_theme/siwk_merchant_button_icon_centered' .
                                        '-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'default' => 'https://x.klarnacdn.net/plugin-build-sourcing/default_shape/' .
                                        'light_theme/' .
                                        'siwk_merchant_button-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png'
                                ]
                            ],
                            'rectangle' => [
                                'button_alignment' => [
                                    'left' => 'https://x.klarnacdn.net/plugin-build-sourcing/rectangular_shape/' .
                                        'light_theme/siwk_merchant_button_icon_left' .
                                        '-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'center' => 'https://x.klarnacdn.net/plugin-build-sourcing/rectangular_shape/' .
                                        'light_theme/siwk_merchant_button_icon_centered' .
                                        '-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'default' => 'https://x.klarnacdn.net/plugin-build-sourcing/rectangular_shape/' .
                                        'light_theme/siwk_merchant_button-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png'
                                ]
                            ],
                            'pill' => [
                                'button_alignment' => [
                                    'left' => 'https://x.klarnacdn.net/plugin-build-sourcing/pill_shape/' .
                                        'light_theme/' .
                                        'siwk_merchant_button_icon_left-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'center' => 'https://x.klarnacdn.net/plugin-build-sourcing/pill_shape/' .
                                        'light_theme/siwk_merchant_button_icon_centered' .
                                        '-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png',
                                    'default' => 'https://x.klarnacdn.net/plugin-build-sourcing/pill_shape/' .
                                        'light_theme/siwk_merchant_button-6774028fa301dec6e54611cc2b1ff23eddca8cc8.png'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ];
}
