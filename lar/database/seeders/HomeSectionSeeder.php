<?php

namespace Database\Seeders;

use App\Enums\HomeSectionEnum;
use Illuminate\Database\Seeder;

class HomeSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Slide hình ảnh',
                'description' => '',
                'code' => HomeSectionEnum::from('CAROUSEL')->value,
                'priority' => 1,
            ],
            [
                'title' => 'Về chúng tôi',
                'description' => '',
                'code' => HomeSectionEnum::from('ABOUT')->value,
                'priority' => 2,
            ],
            [
                'title' => 'Dự án',
                'description' => 'Những dự án của chúng tôi',
                'code' => HomeSectionEnum::from('PRODUCT')->value,
                'priority' => 3,
            ],
            [
                'title' => 'Lợi ích khách hàng',
                'description' => 'Lợi ích khách hàng',
                'code' => HomeSectionEnum::from('BENEFIT')->value,
                'priority' => 4,
            ],
            [
                'title' => 'Dịch vụ',
                'description' => '',
                'code' => HomeSectionEnum::from('SERVICE')->value,
                'priority' => 5,
            ],
            [
                'title' => 'Qui trình làm việc',
                'description' => '',
                'code' => HomeSectionEnum::from('WORKFLOW')->value,
                'priority' => 6,
            ],
            [
                'title' => 'Tin Tức',
                'description' => '',
                'code' => HomeSectionEnum::from('NEWS')->value,
                'priority' => 7,
            ],
            [
                'title' => 'Đối tác',
                'description' => '',
                'code' => HomeSectionEnum::from('PARTNER')->value,
                'priority' => 8,
            ],
        ];
        \App\Models\HomeSection::insert($data);
    }
}
