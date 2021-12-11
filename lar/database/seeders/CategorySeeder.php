<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'id' => 1,
                'name' => 'Trang Chủ',
                'url' => '/',
                'parent_id' => 0,
                'priority' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Dự Án',
                'url' => '/du-an',
                'parent_id' => 0,
                'priority' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Thi Công',
                'url' => '/#thi-cong',
                'parent_id' => 0,
                'priority' => 3,
            ],
            [
                'id' => 4,
                'name' => 'Qui Trình',
                'url' => '/#qui-trinh',
                'parent_id' => 0,
                'priority' => 4,
            ],
            [
                'id' => 5,
                'name' => 'Tin tức',
                'url' => '/tin-tuc',
                'parent_id' => 0,
                'priority' => 5,
            ],
            [
                'id' => 6,
                'name' => 'Liên Hệ',
                'url' => '/lien-he',
                'parent_id' => 0,
                'priority' => 6,
            ],

            [
                'id' => 7,
                'name' => 'Căn Hộ',
                'url' => 'can-ho',
                'parent_id' => 2,
                'priority' => 1,
            ],
            [
                'id' => 8,
                'name' => 'Nhà Phố',
                'url' => 'nha-pho',
                'parent_id' => 2,
                'priority' => 2,
            ],
            [
                'id' => 9,
                'name' => 'Biệt Thự',
                'url' => 'biet-thu',
                'parent_id' => 2,
                'priority' => 3,
            ],
            [
                'id' => 10,
                'name' => 'Văn Phòng',
                'url' => 'van-phong',
                'parent_id' => 2,
                'priority' => 4,
            ],
            [
                'id' => 11,
                'name' => 'Thương Mại',
                'url' => 'thuong-mai',
                'parent_id' => 2,
                'priority' => 5,
            ],
        ];
        Category::insert($data);
    }
}
