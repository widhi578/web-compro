<?php

return [
    /*
     * Enable this only after the production domain and every subdomain are
     * permanently available over HTTPS. The middleware also checks that the
     * current request is HTTPS before sending the header.
     */
    'hsts_enabled' => env('SECURITY_HSTS_ENABLED', false),
];
