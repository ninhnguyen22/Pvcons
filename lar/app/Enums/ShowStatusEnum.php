<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self SHOW()
 * @method static self HIDE()
 */
final class ShowStatusEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'SHOW' => 1,
            'HIDE' => 0,
        ];
    }

    public static function toFormOptions(): array
    {
        return [
            self::from('SHOW')->value => 'Hiển Thị',
            self::from('HIDE')->value => 'Ẩn'
        ];
    }
}
