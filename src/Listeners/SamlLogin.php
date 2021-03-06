<?php

namespace CodeGreenCreative\SamlIdp\Listeners;

use CodeGreenCreative\SamlIdp\Jobs\SamlSso;
use Illuminate\Auth\Events\Login;

class SamlLogin
{
    /**
     * Listen for the Authenticated event
     *
     * @param  Authenticated $event [description]
     * @return [type]               [description]
     */
    public function handle(Login $event)
    {
        if (request()->filled('SAMLRequest') && ! request()->is('saml/logout') && ! request()->is('logout')) {
            abort(response(SamlSso::dispatchNow()), 302);
        }
    }
}
