/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
require(
    [
        'mage/storage',
        'mage/url',
        'jquery'
    ],
    function (storage, urlBuilder, $) {
        'use strict';
        var data = {},
            link = '';

        $(document).ready(function () {
            if (window.location.href.indexOf('system_config/edit/section/payment') === -1) {
                return;
            }

            // eslint-disable-next-line no-undef
            urlBuilder.setBaseUrl(BASE_URL);
            link = urlBuilder.build('klarnaApiRegion/metadata?isAjax=true');

            data.form_key = window.FORM_KEY;
            storage.get(link, data, false)
                .done(function (result) {
                    const API_REGION_META_DATA = result;

                    function updateSettings() {
                        let element, checkboxElement,
                            selector = $('input[name^="' + API_REGION_META_DATA['regionSelector'] + '"]');

                        // eslint-disable-next-line no-unused-vars
                        // eslint-disable-next-line max-nested-callbacks
                        selector.each(function (index,checkbox) {
                            // eslint-disable-next-line no-unused-vars
                            for (const [apiRegion, markets] of Object.entries(API_REGION_META_DATA['markets'])) {
                                // eslint-disable-next-line no-unused-vars
                                for (const [marketKey, marketValue] of Object.entries(markets)) {
                                    element = $('[id^=row_payment_][id$=' + marketValue);

                                    checkboxElement = $(checkbox);
                                    // eslint-disable-next-line max-depth
                                    if (checkboxElement.val() === apiRegion) {
                                        // eslint-disable-next-line max-depth
                                        if (checkboxElement.is(':checked')) {
                                            element.show();
                                        } else {
                                            element.hide();
                                        }
                                    }
                                }
                            }
                        });
                    }

                    updateSettings();

                    // eslint-disable-next-line max-nested-callbacks
                    $(document).change('input[name="' + API_REGION_META_DATA['regionSelector'] + '"]', function () {
                        updateSettings();
                    });
                });
        });
    }
);
