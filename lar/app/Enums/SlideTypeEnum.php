<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self TOP()
 * @method static self ABOUT()
 */
final class SlideTypeEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'TOP' => 1,
            'ABOUT' => 2,
        ];
    }

    public static function toFormOptions(): array
    {
        return self::getLabels();
    }

    public static function getLabels(): array
    {
        return [
            self::from('TOP')->value => 'Đầu Trang',
            self::from('ABOUT')->value => 'Giới thiệu'
        ];
    }

    public static function getLabel($value)
    {
        $labels = self::getLabels();
        return isset($labels[$value]) ? $labels[$value] : '';
    }

}
