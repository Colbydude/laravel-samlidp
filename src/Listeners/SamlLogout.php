<?php

namespace CodeGreenCreative\SamlIdp\Listeners;

use Illuminate\Auth\Events\Logout;

class SamlLogout
{
    /**
     * Upon logout, initiate SAML SLO process for each Service Provider
     * Simply redirect to the saml/logout route to handle SLO
     *
     * @param  Logout $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $request = request();

        if ($request->has('RelayState')) {
            abort(redirect('saml/logout?' . $request->getQueryString()), 200);
        } else {
            abort(redirect('saml/logout'), 200);
        }
    }
}
