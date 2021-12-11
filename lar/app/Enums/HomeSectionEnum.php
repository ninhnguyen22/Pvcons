<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self CAROUSEL()
 * @method static self ABOUT()
 * @method static self PRODUCT()
 * @method static self BENEFIT()
 * @method static self SERVICE()
 * @method static self WORKFLOW()
 * @method static self NEWS()
 * @method static self PARTNER()
 */
final class HomeSectionEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'CAROUSEL' => 'carousel',
            'ABOUT' => 'about',
            'PRODUCT' => 'product',
            'BENEFIT' => 'benefit',
            'SERVICE' => 'service',
            'WORKFLOW' => 'workflow',
            'NEWS' => 'news',
            'PARTNER' => 'partner'
        ];
    }

}
