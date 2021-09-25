import { library } from '@fortawesome/fontawesome-svg-core';
import { faFilePdf, faFileCode, faLink, faUpload, faPlus } from '@fortawesome/free-solid-svg-icons';
library.add([faFilePdf, faFileCode, faLink, faUpload, faPlus]);
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
