<?php

namespace Database\Seeders;

use App\Enums\CompanyProfileEnum;
use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
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
                'code' => CompanyProfileEnum::from('COMPANY_NAME')->value,
                'name' => 'Tên Công ty',
                'value' => 'ABC',
            ],
            [
                'code' => CompanyProfileEnum::from('PHONE1')->value,
                'name' => 'Phone',
                'value' => '0123 456 789',
            ],
            [
                'code' => CompanyProfileEnum::from('PHONE2')->value,
                'name' => 'Phone',
                'value' => '0311 456 789',
            ],
            [
                'code' => CompanyProfileEnum::from('ADDRESS')->value,
                'name' => 'Địa Chỉ',
                'value' => 'DN',
            ],
            [
                'code' => CompanyProfileEnum::from('EMAIL')->value,
                'name' => 'Email',
                'value' => 'abc@gmail.com',
            ],
            [
                'code' => CompanyProfileEnum::from('WEBSITE')->value,
                'name' => 'Website',
                'value' => 'abc.com',
            ],
            [
                'code' => CompanyProfileEnum::from('ABOUT')->value,
                'name' => 'Về Chúng Tôi',
                'value' => '',
            ],
            [
                'code' => CompanyProfileEnum::from('PAGE')->value,
                'name' => 'FANPAGE',
                'value' => 'facebook',
            ],
            [
                'code' => CompanyProfileEnum::from('MAP')->value,
                'name' => 'MAP',
                'value' => 'map',
            ],
        ];

        CompanyProfile::insert($data);
    }
}
