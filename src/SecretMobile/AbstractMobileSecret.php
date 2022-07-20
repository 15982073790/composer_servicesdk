<?php

namespace Mrstock\Servicesdk\SecretMobile;
interface AbstractMobileSecret
{
    static function encrypt($servicestoken, $mobiles);

    static function decrypt($servicestoken, $secrets);

}