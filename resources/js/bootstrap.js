import _ from 'lodash';
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


import Alpine from 'alpinejs';
window.Alpine = Alpine ;
Alpine.start();

import AirDatepicker from 'air-datepicker';
import localeId from 'air-datepicker/locale/id';
import 'air-datepicker/air-datepicker.css';

new AirDatepicker('#date', {
    locale: localeId,
    isMobile: false,
    autoClose: true,

});