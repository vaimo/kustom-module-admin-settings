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
            link = '',
            url = '';

        $(document).ready(function () {
            if (window.location.href.indexOf('system_config/edit/section/payment') === -1) {
                return;
            }

            // eslint-disable-next-line no-undef
            urlBuilder.setBaseUrl(BASE_URL);
            link = urlBuilder.build('klarnaImage/metadata?isAjax=true');

            data.form_key = window.FORM_KEY;
            storage.get(link, data, false)
                .done(function (result) {
                    const IMAGE_DATA = result;

                    function updateImage(eventName) {
                        for (const [imageElement, imageElementMetadata] of Object.entries(IMAGE_DATA)) {
                            if (Object.values(imageElementMetadata['events']).indexOf(eventName) !== -1) {
                                url = IMAGE_DATA[imageElement]['path'];

                                // eslint-disable-next-line max-depth
                                for (const [key, event] of Object.entries(imageElementMetadata['events'])) {
                                    url = url[key][$('[name="' + event + '"]').val()];
                                }

                                $('#' + IMAGE_DATA[imageElement]['image_id']).attr('src', url);
                            }
                        }
                    }

                    // eslint-disable-next-line no-unused-vars
                    for (const [imageElement, imageElementMetadata] of Object.entries(IMAGE_DATA)) {
                        // eslint-disable-next-line no-unused-vars
                        for (const [eventKey, eventName] of Object.entries(imageElementMetadata['events'])) {
                            updateImage(eventName);

                            // eslint-disable-next-line max-nested-callbacks
                            $(document).change(eventName, function (changedEvent) {
                                updateImage(changedEvent.data);
                            });
                        }
                    }
                });
        });
    }
);
