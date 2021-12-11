<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self OPEN()
 * @method static self FEEDBACK()
 * @method static self RESOLVED()
 * @method static self CANCEL()
 */
final class ContactStatusEnum extends Enum
{
    protected static function values(): \Closure
    {
        return function (string $name) {
            return mb_strtolower($name);
        };
    }

    public static function toFormOptions(): array
    {
        return self::getLabels();
    }

    public static function getLabels(): array
    {
        return [
            self::from('OPEN')->value => 'Đang chờ',
            self::from('FEEDBACK')->value => 'Đã trả lời',
            self::from('RESOLVED')->value => 'Đã xử lí',
            self::from('CANCEL')->value => 'Bỏ qua'
        ];
    }

    public static function getLabel($value)
    {
        $labels = self::getLabels();
        return isset($labels[$value]) ? $labels[$value] : '';
    }

}
