<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self COMPANY_NAME()
 * @method static self PHONE1()
 * @method static self PHONE2()
 * @method static self ADDRESS()
 * @method static self EMAIL()
 * @method static self WEBSITE()
 * @method static self ABOUT()
 * @method static self PAGE()
 * @method static self MAP()
 */
final class CompanyProfileEnum extends Enum
{
    protected static function values(): \Closure
    {
        return function (string $name) {
            return mb_strtolower($name);
        };
    }
}
